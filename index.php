<?php
session_start();
include('control/global.php');
if(!isset($_REQUEST['submit'])){
    if(!isset($_REQUEST['page'])){
        if(!isset($_REQUEST['main'])){
            include('frame/login.php');
            session_destroy();
            exit(0);
        }else{
            include('control/navigation.php');
        }
    }else{
        include('control/page.php');
    }
}else{
    include('control/model.php');
    header('location: ?'.http_build_query($url));
}
?>