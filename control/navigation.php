<?php

if(!isset($_SESSION['token'])){
    echo'no session'; 
}else{
    if($_SESSION['token'] !== $_COOKIE['token']){
        echo 'no token';
    }else{ 
        setcookie('page',$_REQUEST['main']);
        if($_SESSION['sid'] == false){
            $profile =  profile();
            require('frame/profile.php');
            exit(0);
        }else{
            switch($_REQUEST['main']){

                case'dashboard';
                    $data = array(
                        'endpoint'=>'stock::fetch::current',
                        'id'=>$_SESSION['cid']
                    );
                    $response = conn($data);
                    if(isset($response['response']['status'])){
                        $data = false;
                        $bal = false;
                    }else{
                        $data = $response['response']['current'];
                        $bal = $response['response']['summary'];
                    }
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

                case'admin-profile';
                    $profile =  profile();
                    require('frame/profile.php');
                break;
            
                default:
                    require('frame/404.php');
            }
        }
    }
}
?>