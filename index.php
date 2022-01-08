<?php
    include 'src/preset/header.php';

    switch(@$_GET['login'])
        {
        case 'admin' :
        include 'src/role/admin.php';
        break;

        case 'user' :
        include 'src/role/user.php';
        break;

        default:
        include 'src/login/login.php';
        break;
        }
    include 'src/preset/footer.php';
?>