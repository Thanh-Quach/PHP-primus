function timeStamptoDate(time, output){
    if (output == 'day') {
    	var date = new Date(time*1000).toLocaleDateString('en-US',{day: 'numeric'})
    }else if (output == 'month') {
    	var date = new Date(time*1000).toLocaleDateString('en-US',{month: 'long'})
    }else if (output == 'year') {
    	var date = new Date(time*1000).toLocaleDateString('en-US',{year: 'numeric'})
    }else{
    	var date = new Date(time*1000).toLocaleDateString('en-US',{year: 'numeric', month: 'long', day: 'numeric'})
    }
    return date;
}
function hourCalculation(input){
        var str1 = input.substring(input.indexOf("-") + 1, input.lastIndexOf("")).trim().replace(/[^0-9]/g, "").replace(' ','');
        var str2 = input.substring(0, input.lastIndexOf("-")).trim().replace(/[^0-9]/g, "").replace(' ','');
        if (str1.length > 1 && str2.length > 1 && str2.substring(0, 2) < str1.substring(0, 1) && str1.length < 4 && str2.length < 4) {
            var hour = [str1.substring(0, 1)-str2.substring(0, 1)-1 + (str2.substring(1)-str1.substring(1))/60];

        }else if(str2.substring(0, 2) < str1.substring(0, 1) && str1.length < 4 && str2.length < 4){
            var hour = [str1.substring(0, 1)-str2.substring(0, 1) + (str1.substring(1)-str2.substring(2))/60];

        }else if(str1.length < 4 || str2.length < 4){
            var hour = [Number(str1.substring(0, 1))+12-str2.substring(0, 2) + (str1.substring(1)-str2.substring(2))/60];

        }else if (str1.length >= 4 && str2.length >= 4){
            var hour = [str1.substring(0, 2)-str2.substring(0, 2) + (str1.substring(2)-str2.substring(2))/60];
        }else{
            var hour = 0;
        }
        return hour;
}