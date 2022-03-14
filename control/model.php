<?php

switch($_POST['submit']){

    case'signup';
        $response = conn($_POST);
        if($response['status'] == 5101){
            $url['user'] = 'user-access-zero';
        }else{
            $url['main'] = 'dashboard';
        }
    break;

    case'login';
        $response = conn($_REQUEST);
        if($response['status'] == 5101){
            $url['user'] = 'user-access-zero';
        }else{
            $url['main'] = 'dashboard';
        }
    break;

    default:
        require('frame/404.php');
}


?>