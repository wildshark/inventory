<?php

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

    default:
        require('frame/404.php');
}
?>