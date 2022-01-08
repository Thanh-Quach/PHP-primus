const auth = './api/authentication.php';
const main = './index.php';
const api = './';

//onload functions

// trigger functions
function addLocation() {
    var url = api + 'api/admin/createNewLocation.php';
    var data = {"name": document.getElementById('LocationInput').value };
    apiPost(url, data);
    location.reload();
}

function removeLocation() {
    var url = api + 'api/admin/removeLocation.php';
    var data = {
        "uid": document.getElementById('remove-uid').value,
        "name": document.getElementById('remove-location-name').value,
        };
    apiPost(url, data);
    location.reload();
}

function addOperator(){
    var url = api + 'api/admin/addOperator.php';
    var data = {
        "username": document.getElementById('new-operator').value,
        "password": document.getElementById('new-operator-pw').value,
        "location": document.getElementById('edit-location-uid').value+'_'+document.getElementById('edit-location-name').innerHTML.toLowerCase(),

    }
    apiPost(url, data);
    document.getElementById('new-operator').value = '';
    document.getElementById('new-operator-pw').value = '';
    operatorList();
}

function removeOperator(uid){
    var url = api + 'api/admin/removeOperator.php';
    var data = {
        "uid": uid,
    }
    apiPost(url, data);
    operatorList();
}

function registerStudent() {
    var url = api + 'api/user/registerStudent.php';
    var sList = [];
    var i = 0;
    $('#users-register-form .form-check-input[type="checkbox"]').each(function () {
        $('#other-sub').val($('#other-sub-value').val());
        if (this.checked) {
            sList[i] = $(this).val();
            i++;
        }
    });
    var basic = {
        'database_access': JSON.parse(localStorage.getItem('location')),

        'reg_date': dateToTime($('#reg-date').val())/1000,
        'ethnicity': $('#ethnicity').val(),
        'gender': $('#gender').val(),
        'firstname':$('#firstname').val(),
        'lastname':$('#lastname').val(),
        'school':$('#school').val(),
        'grade':$('#grade').val(),
        'address':$('#address').val(),
        'student_email':$('#email').val(),
        'student_phone':$('#phone').val(),
        'subjects': JSON.stringify(sList),
        'hear_from':$('#hear-from').val(),

        'other_contact_name_1': $('#rel-1-fullname').val(),
        'other_contact_relation_1': $('#rel-1').val(),
        'other_contact_cell_1': $('#rel-1-phone').val(),
        'other_contact_phone_1': $('#rel-1-email').val(),

        'active_status': 'a',

    }
    if ($('#rel-2').length) {
        rel2 = {
            'other_contact_name_2': $('#rel-2-fullname').val(),
            'other_contact_relation_2': $('#rel-2').val(),
            'other_contact_cell_2': $('#rel-2-phone').val(),
            'other_contact_phone_2': $('#rel-2-email').val(),
        };
    }else{
        rel2 = null;
    }
    if ($('#rel-3').length) {
        rel3 = {
            'other_contact_name_3': $('#rel-3-fullname').val(),
            'other_contact_relation_3': $('#rel-3').val(),
            'other_contact_cell_3': $('#rel-3-phone').val(),
            'other_contact_phone_3': $('#rel-3-email').val(),
        };
    }else{
        rel3 = null;
    }

    var data = {...basic, ...rel2, ...rel3};
    var res = apiPost(url, data);
    clearInput();
    $('#users-register').toggleClass('d-none');
    getStudentInfo(res[1]);

}

function saveStudentInfo(uuid){
    var url = api + 'api/user/updateStudent.php';
    var sList = [];
    var i = 0;
    $('#users-register-form .form-check-input[type="checkbox"]').each(function () {
        $('#other-sub').val($('#other-sub-value').val());
        if (this.checked) {
            sList[i] = $(this).val();
            i++;
        }
    });
    var basic = {
        'uuid': uuid,
        'reg_date': dateToTime($('#reg-date').val())/1000,
        'database_access': JSON.parse(localStorage.getItem('location')),

        'ethnicity': $('#ethnicity').val(),
        'gender': $('#gender').val(),
        'firstname':$('#firstname').val(),
        'lastname':$('#lastname').val(),
        'school':$('#school').val(),
        'grade':$('#grade').val(),
        'address':$('#address').val(),
        'student_email':$('#email').val(),
        'student_phone':$('#phone').val(),
        'subjects': JSON.stringify(sList),
        'hear_from':$('#hear-from').val(),

        'other_contact_name_1': $('#rel-1-fullname').val(),
        'other_contact_relation_1': $('#rel-1').val(),
        'other_contact_cell_1': $('#rel-1-phone').val(),
        'other_contact_phone_1': $('#rel-1-email').val(),

        'active_status': 'a',

    }
    if ($('#rel-2').length) {
        rel2 = {
            'other_contact_name_2': $('#rel-2-fullname').val(),
            'other_contact_relation_2': $('#rel-2').val(),
            'other_contact_cell_2': $('#rel-2-phone').val(),
            'other_contact_phone_2': $('#rel-2-email').val(),
        };
    }else{
        rel2 = null;
    }
    if ($('#rel-3').length) {
        rel3 = {
            'other_contact_name_3': $('#rel-3-fullname').val(),
            'other_contact_relation_3': $('#rel-3').val(),
            'other_contact_cell_3': $('#rel-3-phone').val(),
            'other_contact_phone_3': $('#rel-3-email').val(),
        };
    }else{
        rel3 = null;
    }

    var data = {...basic, ...rel2, ...rel3};
    var res = apiPost(url, data);

    clearInput();
    $('#users-register').toggleClass('d-none');
    getStudentInfo(res[1]);
}

function addSchedule(uuid){
    uuid = $('#uuid').val();
    date = [];
    for (var i = 0; i < $('.date-input').length; i++) {
        date[i] = [
           $($('.date-input')[i]).val(),
           $($('.time-input')[i]).val(),
        ]
    }

    var url = api + 'api/user/addSchedule.php';
    var data = {
        'database_access': JSON.parse(localStorage.getItem('location')),
        'uuid': uuid,
        'schedule' : JSON.stringify(date),
    }
    var res = apiPost(url, data);
    getStudentInfo(res[1]);
    location.reload();

}
function autoCreatePayment(uuid){
    var url = api + 'api/user/createPayment.php';

    var rate = getDefaultPrice();
    var session_length = hourCalculation(JSON.parse(JSON.parse(sessionStorage.getItem('studentInfo'))[0].schedules)[0][1])[0];
    var other_fee = JSON.parse(JSON.parse(sessionStorage.getItem('studentInfo'))[0].subjects).length*5;
    var data = {
        'uuid': uuid,
        'number_of_months': 1,
        'other_fee': other_fee,
        'recuring_type': 'Sessions',
        'hour_per_session': session_length,
        'number_of_sessions': Number(JSON.parse(JSON.parse(sessionStorage.getItem('studentInfo'))[0].schedules).length) * 4,
        'rate_per_hour' : rate,
        'paid': '0',
        'package_type': 'A'
    }
    apiPost(url, data);
}
function createPayment(uuid){
    var url = api + 'api/user/createPayment.php';
    if ($('.deposit').length > 0) {
        var deposit = [];
        for (var i = 0; i < $('.deposit').length; i++) {
            deposit[i] = [
               $($('.deposit')[i]).val(),
               $($('.deposit_date')[i]).val(),
            ]
        }
    }else{
        var deposit = null;
    }
    var data = {
        'uuid': uuid,
        'bill_issue': dateToTime($('#bill_issue').val())/1000,
        'pay_from': dateToTime($('#pay_from').val())/1000,
        'pay_to': dateToTime($('#pay_to').val())/1000,
        'number_of_months': $('#number_of_months').val(),

        'other_fee': $('#other_fee').val(),
        'recuring_type': $('#add-billing-form #dropdownButton').html(),
        'hour_per_session': $('#hour_per_session').val(),
        'number_of_sessions': $('#number_of_sessions').val(),
        'rate_per_hour' : $('#rate_per_hour').val(),
        'rate_per_month' : $('#rate_per_month').val(),
        'percent_off' : $('#percent_off').val(),

        'package_type': $('#package_type input:checked').val(),
        'sale_rep_id':  $('#sale_rep_id').val(),
        'sale_rep_commission': $('#sale_rep_commission').val(),

        'paid': $('#paid').val(),
        'paid_date': dateToTime($('#paid_date').val())/1000,
        'deposit': JSON.stringify(deposit),
        'refund' : $('#refund').val(),
        'refund_detail' : $('#refund-detail').val(),
        'comments': $('#comments').val(),
        'total': $('#total').html(),
        'outstanding': $('#outstanding').html()

    }
    apiPost(url, data);
    location.reload();
}
function updatePayment(uuid){
    var url = api + 'api/user/updatePayment.php';
    if ($('.deposit').length > 0) {
        var deposit = [];
        for (var i = 0; i < $('.deposit').length; i++) {
            deposit[i] = [
               $($('.deposit')[i]).val(),
               $($('.deposit_date')[i]).val(),
            ]
        }
    }else{
        var deposit = null;
    }
    var data = {
        'uuid': uuid,
        'bill_issue': dateToTime($('#bill_issue').val())/1000,
        'pay_from': dateToTime($('#pay_from').val())/1000,
        'pay_to': dateToTime($('#pay_to').val())/1000,
        'number_of_months': $('#number_of_months').val(),

        'other_fee': $('#other_fee').val(),
        'recuring_type': $('#add-billing-form #dropdownButton').html(),
        'hour_per_session': $('#hour_per_session').val(),
        'number_of_sessions': $('#number_of_sessions').val(),
        'rate_per_hour' : $('#rate_per_hour').val(),
        'rate_per_month' : $('#rate_per_month').val(),
        'percent_off' : $('#percent_off').val(),

        'package_type': $('#package_type input:checked').val(),
        'sale_rep_id':  $('#sale_rep_id').val(),
        'sale_rep_commission': $('#sale_rep_commission').val(),

        'paid': $('#paid').val(),
        'paid_date': dateToTime($('#paid_date').val())/1000,
        'deposit': JSON.stringify(deposit),
        'refund' : $('#refund').val(),
        'refund_detail' : $('#refund-detail').val(),
        'comments': $('#comments').val(),
        'total': $('#total').html(),
        'outstanding': $('#outstanding').html()
    }
    apiPost(url, data);
    location.reload();
}
function PaymentDetails(uuid, action){
    var url = api + 'api/user/getPaymentDetails.php';
    var data = {
        'action': action,
        'uuid' : uuid,
    }

    var res = apiPost(url, data);
    if (res[1].length < 1 && action !== 'edit' && action !== 'create') {
        autoCreatePayment(uuid);
        location.reload();
    }else if (action !== 'edit' && action !=='action'){
        displayPaymentInfo(res[1]);
    }else{
        editPaymentInfo(res[1]);
    }
}
function getDefaultPrice(){
    var url = api + 'api/user/getDefaultPrice.php';
    var allRate = apiGet(url);
    if (JSON.parse(sessionStorage.getItem('studentInfo'))[0].grade < 7) {
        var rate = JSON.parse(allRate[0].price);
    }else if(JSON.parse(sessionStorage.getItem('studentInfo'))[0].grade < 10){
        var rate = JSON.parse(allRate[1].price);
    }else{
        var rate = JSON.parse(allRate[2].price);
    }
    return rate;
}
function getStudentInfo(uuid) {
    var url = api + 'api/user/getStudentInfo.php';
    var data = {
        'database_access': JSON.parse(localStorage.getItem('location')),
        'uuid': uuid,
    };
    sessionStorage.setItem('studentInfo', JSON.stringify(apiPost(url, data)));
    studentInfo = JSON.parse(sessionStorage.getItem('studentInfo'));
    $('#bills-info').children().remove();
    displayStudent(studentInfo);
    location.reload();
}
function deleteUser(){
    var url = api + 'api/user/deleteUser.php';
    var data = {
        'uuid': JSON.parse(sessionStorage.getItem('studentInfo'))[0].uuid,
        'database_access' : JSON.parse(localStorage.getItem('location')),
    }
    apiPost(url, data);
    sessionStorage.removeItem('studentInfo');
    location.reload();
}

function deleteForm(uuid){
    var url = api + 'api/user/deletePayment.php';
    var data = {
        'uuid': uuid,
    }
    apiPost(url, data);
    location.reload();
}
function addSaleRep() {
    var url = 'api/user/addSaleRep.php';
    var data = {
        'name': $('#salerepInput').val(),
        'database_access': JSON.parse(localStorage.getItem('location')),
    }
    res = apiPost(url, data);
    $('.sale-rep-list').append(
      "<li id='"+res[1]+"' class='list-group-item d-flex my-5 justify-content-around border-0 rounded-0 bg-transparent p-0'>"+
        "<div class='col'><h1>"+res[2]+"</h1></div>"+
        "<div class='col-2 d-flex m-0 d-flex'>"+
          "<a href='#' class='text-danger' onclick='deleteSaleRep("+JSON.stringify(res[2])+")'>Delete</a>"+
        "</div>"+
      "</li>"
    )
}
function deleteSaleRep(uid) {
    var url = 'api/user/deleteSaleRep.php';
    var data = {
        'uid': uid,
    }
    apiPost(url, data);
    $('#'+uid).remove();
}
function getSaleRep(uuid){
    url = api + 'api/user/getSaleRep.php';
    data = {
        'uid': uuid,
    }
    return apiPost(url, data);
}


//GET
function apiGet(url) {
    var res = $.ajax({
      type: "GET",
      url: url,
      async:false,
      headers: {
            'Authorization': 'Bearer '+ localStorage.getItem('token'),
            'Content-Type': 'application/json',
        },
    });
    res.done(function(data) {
    }).fail((xhr, status) => console.log(status));
    return JSON.parse(res.responseText);
}


//POST
function apiPost(url, val) {
    var res = $.ajax({
      type: "POST",
      url: url,
      data: val,
      async:false,
      headers: {
            'Authorization': 'Bearer '+ localStorage.getItem('token'),
      },
   });
    res.done(function(status) {
    }).fail((xhr, status) => console.log(status));
    return JSON.parse(res.responseText);
}


function locationList(){
    var url = api+'api/admin/locationList.php'
    var data = apiGet(url);
    for(i=0; i<data.length; i++){
        $('#locaiton-list').append(
            "<li class='list-group-item row d-flex mx-4 my-2 justify-content-between border-0 rounded-0 bg-transparent'>"+
                "<div class='col'><h1>"+data[i].location_name+"</h1></div>"+
                "<div class='col-3 d-flex m-0 justify-content-between d-flex'>"+
                    "<a href='?login=user' class='' onclick='joinLocation("+JSON.stringify(data[i].database_access)+")'>Manage</a>"+
                    "<a href='#' class='' onclick='editLocationPrompt("+JSON.stringify(data[i])+")'>Edit</a>"+
                    "<a href='#' class='text-danger' onclick='showRemovePrompt("+JSON.stringify(data[i])+")'>Delete</a>"+
                "</div>"+
            "</li>"
        );
    }
};

function operatorList(){
    $('#accessible-operator').empty();
    var url = api+'api/admin/operatorList.php';
    var val = {
        "uid": document.getElementById('edit-location-uid').value+'_'+document.getElementById('edit-location-name').innerHTML.toLowerCase(),
    }
    var data = apiPost(url, val);
    for(i=0; i<data.length; i++){
        $('#accessible-operator').append(
            "<li class='list-group-item row d-flex my-2 justify-content-between border-0 rounded-0 bg-transparent'>"+
                "<div class='col'><h1>"+data[i].username+"</h1></div>"+
                "<div class='col-3 d-flex m-0 justify-content-between d-flex'>"+
                    "<a href='#' class='text-danger' onclick='removeOperator("+JSON.stringify(data[i].uid)+")'>Delete</a>"+
                "</div>"+
            "</li>"
        );
    }
};

function studentsList() {
    url = api + 'api/user/studentsList.php';
    data = {
        'database_access': JSON.parse(localStorage.getItem('location')),
    }
    var list = apiPost(url,data);
    for(i=0; i<list.length; i++){
        $('.student-list').append(
            "<li class='w-100'>"+
            "<a href='#' class='mx-auto list-group-item filter-list-items secondary-font py-3 m-0 d-flex justify-content-between' onclick='getStudentInfo("+JSON.stringify(list[i].uuid)+")'>"+
            "<h3 class='studentname col-6'>"+list[i].firstname+" "+list[i].lastname+"</h3>"+
            "<h3 class='col-3'>Grade "+list[i].grade+"</h3>"+
            "<h3 class='studentphone col'>"+list[i].student_phone+"</h3>"+
            "</a></li>"
        );
    }
}

function getSaleRepList() {
    url = api + 'api/user/saleRepList.php';
    data = {
        'database_access': JSON.parse(localStorage.getItem('location')),
    }
    return apiPost(url,data);
}
