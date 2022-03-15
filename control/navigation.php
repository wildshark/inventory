<?php

if(!isset($_SESSION['token'])){
    echo'no session'; 
}else{

    if($_SESSION['token'] !== $_COOKIE['token']){
        echo 'no token';
    }else{
        setcookie('page',$_REQUEST['main']);
        switch($_REQUEST['main']){

            case'dashboard';
                require('frame/dashboard.php');
            break;
        
            case'categories';
                require('frame/categories.php');
            break;
        
            case'product';
                require('frame/product.php');
            break;

            case'inventory-info';
                require('frame/stock.php');
            break;

            case'purchase';
                require('frame/purchase.php');
            break;

            case'issued';
                require('frame/issued.php');
            break;

            case'details';
                require('frame/details.php');
            break;

            case'returns';
                require('frame/returns.php');
            break;
        
            default:
                require('frame/404.php');
        }

    }
}


?>