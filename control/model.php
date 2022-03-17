<?php

switch($_REQUEST['submit']){

    case'signup';
        $_REQUEST['endpoint'] ='user::login';
        $response = conn($_REQUEST);
        if(isset($response['status'])){
            $url['user'] = 'user-access-zero';
        }else{
            
            $url['user'] = 'dashboard';
        }
    break;

    case'login';
        $_REQUEST['endpoint'] ='user::login';
        $response = conn($_REQUEST);
        $response = $response['response'];
        if(isset($response['status'])){
            $url['user'] = 'user-access-zero';
        }else{
            $md5 = md5($response['company_id']);
            setcookie('usertoken',$md5);
            setcookie('cid',$response['company_id']);
            setcookie('business',$response['company_name']);
            setcookie('user',$response['username']);
            $_SESSION['cid'] = $response['company_id'];
            $_SESSION['usertoken'] = $md5;

            if(!isset($response['status_id'])){
                $_SESSION['sid'] = false;
            }else{
                $_SESSION['sid'] = true;
            }
            $url['main'] = 'dashboard';
        }
    break;

    case'category-add';
        $category['endpoint'] = 'category::add';
        $category['id'] = $_SESSION['cid'];
        $category['category'] = $_REQUEST['name'];
        $response = conn($category);
        if($response['response']['status'] !== 2000){
            $url['main'] ='categories';
            $url['status'] =false;
        }else{
            $url['main'] ='categories';
            $url['status'] =true;
        }
    break;

    case'category-delete';
        $category['endpoint'] = 'category::delete';
        $category['id'] = $_REQUEST['id'];
        $response = conn($category);
        if($response['response']['status'] !== 2000){
            $url['main'] ='categories';
            $url['status'] =false;
        }else{
            $url['main'] ='categories';
            $url['status'] =true;
        }
    break;

    case'product-add';
        $product['endpoint'] = 'item::add';
        $product['id'] = $_SESSION['cid'];
        $product['category'] = $_REQUEST['category'];
        $product['item'] = $_REQUEST['name'];
        $product['description'] = $_REQUEST['detail'];
        $product['image'] ='Null';

        $response = conn($product);
        if($response['response']['status'] !== 2000){
            $url['main'] ='product';
            $url['status'] =false;
        }else{
            $url['main'] ='product';
            $url['status'] =true;
        }
    break;

    case'product-delete';
        $category['endpoint'] = 'item::delete';
        $category['id'] = $_REQUEST['id'];
        $response = conn($category);
        if($response['response']['status'] !== 2000){
            $url['main'] ='product';
            $url['status'] =false;
        }else{
            $url['main'] ='product';
            $url['status'] =true;
        }
    break;

    case'purchase-add';
        $purchase['endpoint'] ='stock::purchase';
        $purchase['date'] = $_REQUEST['date'];
        $purchase['ref'] = $_REQUEST['invoice'];
        $purchase['item'] = $_REQUEST['product'];
        $purchase['price'] = $_REQUEST['price'];
        $purchase['qty'] = $_REQUEST['qty'];
        $purchase['details'] ='Null';
        $purchase['id'] = $_SESSION['cid'];
        $response = conn($purchase);
        if($response['response']['status'] !== 2000){
            $url['main'] ='purchase';
            $url['status'] =false;
        }else{
            $url['main'] ='purchase';
            $url['status'] =true;
        }
    break;

    case'issued-add';
        $issued['endpoint'] ='stock::issued';
        $issued['date'] = $_REQUEST['date'];
        $issued['ref'] = $_REQUEST['invoice'];
        $issued['item'] = $_REQUEST['product'];
        $issued['price'] = $_REQUEST['price'];
        $issued['qty'] = $_REQUEST['qty'];
        $issued['details'] ='Null';
        $issued['id'] = $_SESSION['cid'];
        $response = conn($issued);
        if($response['response']['status'] !== 2000){
            $url['main'] ='issued';
            $url['status'] =false;
        }else{
            $url['main'] ='issued';
            $url['status'] =true;
        }
    break;

    case'returns-add';
        $returns['endpoint'] ='stock::returns';
        $returns['date'] = $_REQUEST['date'];
        $returns['ref'] = $_REQUEST['invoice'];
        $returns['item'] = $_REQUEST['product'];
        $returns['price'] = $_REQUEST['price'];
        $returns['qty'] = $_REQUEST['qty'];
        $returns['details'] ='Null';
        $returns['id'] = $_SESSION['cid'];
        $response = conn($returns);
        if($response['response']['status'] !== 2000){
            $url['main'] ='returns';
            $url['status'] =false;
        }else{
            $url['main'] ='returns';
            $url['status'] =true;
        }
    break;

    case'inventory-delete';
        $del['endpoint'] ='stock::delete';
        $del['id'] =$_REQUEST['id'];
        $response = conn($del);
        if($response['response']['status'] !== 2000){
            $url['main'] = $_COOKIE['page'];
            $url['status'] =false;
        }else{
            $url['main'] = $_COOKIE['page'];
            $url['status'] =true;
        }
    break;

    case'profile-update';
        $update = array(
            'endpoint'=>'user::update',
            'business'=>$_REQUEST['business'],
            'fname'=>$_REQUEST['fname'],
            'mname'=>$_REQUEST['mname'],
            'lname'=>$_REQUEST['lname'],
            'address'=>$_REQUEST['address'],
            'email'=>$_REQUEST['email'],
            'mobile'=>$_REQUEST['mobile'],
            'country'=>$_REQUEST['country'],
            'state'=>$_REQUEST['state'],
            'website'=>$_REQUEST['website'],
            'postal'=>$_REQUEST['postal-code'],
            'id'=>$_SESSION['cid']
        ); 
        $response = conn($update);
        if($response['response']['status'] !== 2000){
            $url['main'] = $_COOKIE['page'];
            $url['status'] =false;
        }else{
            $url['main'] = 'dashboard';
            $url['status'] =true;
            $_SESSION['sid'] = true;
        }
    break;

    default:
        require('frame/404.php');
}


?>