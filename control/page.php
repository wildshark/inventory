<?php

switch($_REQUEST['page']){

    case'auth-signin';
        require('frame/login.php');
    break;

    case'signup';
        require('frame/signup.php');
    break;

    case'auth-password-reset';
        require('frame/rest.php');
    break;

    default:
        require('frame/404.php');

}

?>