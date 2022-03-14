<?php

function module($conn,$request){

    $cmd = explode("::",$request['endpoint']);
    $endpoint = $cmd[0];
    $action = $cmd[1];

    switch($endpoint){ 

        case'user';
            if($action === 'login'){
                $q[] = $request['username'];
                $q[] = $request['password'];
                $response = company::login($conn,$q);
            }elseif($action === 'create'){
                $search[] = $request['email'];
                $check = company::verification($conn,$search);
                if($check !== false){
                    $response = array(
                        'status'=>5104,
                        'msg'=>'email already exist'
                    );
                }else{
                    $q[] =  $request['business'];
                    $q[] =  $request['fname'];
                    $q[] =  $request['lname'];
                    $q[] =  $request['email'];
                    $q[] =  $request['username'];
                    $q[] =  $request['password'];
                    $response = company::add($conn,$q);
                }
            }elseif($action === 'fetch'){
                $q[] =  $request['id'];
                $response = company::fetch($conn,$q);
            }elseif($action === 'update'){
                $q[] =  $request['address'];
                $q[] =  $request['mobile'];
                $q[] =  $request['country'];
                $q[] =  $request['state'];
                $q[] =  $request['id'];
                $response = company::update($conn,$q);
            }            
        break;

        case'category';
            if($action === 'add'){
                $search[] = $request['company_id'];
                $search[] = $request['category'];
                $check = category::check($conn,$search);
                if($check !== false){
                    $response = array(
                        'status'=>5105,
                        'msg'=>'record already exist'
                    );
                }else{
                    $q[] =  $request['company_id'];
                    $q[] =  $request['category'];
                    $response = category::add($conn,$q);
                }                
            }elseif($action === 'update'){
                $q[] =  $request['category'];
                $q[] =  $request['id'];
                $response = category::update($conn,$q);
            }elseif($action === 'fetch'){
                $q[] =  $request['id'];
                $response = category::fetch($conn,$q);
            }elseif($action === 'view'){
                $q[] =  $request['id'];
                $response = category::view($conn,$q);
            }elseif($action === 'delete'){
                $q[] =  $request['id'];
                $response = category::delete($conn,$q);
            }
        break;

        case'item';
            if($action === 'add'){
                $search[] = $request['id'];
                $search[] = $request['category'];
                $search[] = $request['item'];
                $check = item::check($conn,$search);
                if($check !== false){
                    $response = array(
                        'status'=>5105,
                        'msg'=>'record already exist'
                    );
                }else{
                    $q[] = $request['id'];
                    $q[] = $request['category'];
                    $q[] = $request['item']; 
                    $q[] = $request['description'];
                    $q[] = $request['image'];
                    $response = item::add($conn,$q);
                }
            }elseif($action === 'update'){
                $q[] = $request['category'];
                $q[] = $request['item'];
                $q[] = $request['description'];
                $q[] = $request['image'];
                $q[] = $request['id'];
                $response = item::update($conn,$q);
            }elseif($action === 'fetch'){
                $q[] = $request['id'];
                $response = item::fetch($conn,$q);
            }elseif($action === 'view'){
                $q[] = $request['id'];
                $response = item::view($conn,$q);
            }elseif($action === 'delete'){
                $q[] = $request['id'];
                $response = item::delete($conn,$q);
            }
        break;

        case'stock';
            if($action === 'add'){
                $search[] = $request['id'];
                $search[] = $request['item'];
                $search[] = $request['date'];
                $search[] = $request['ref'];
                $check = inventory::check($conn,$search);
                if($check !== false){
                    $response = array(
                        'status'=>5105,
                        'msg'=>'record already exist'
                    );
                }else{
                    $q[] =  $request['id'];
                    $q[] =  $request['item'];
                    $q[] =  $request['date'];
                    $q[] =  $request['ref'];
                    $q[] =  $request['details'];
                    $q[] =  $request['price'];
                    $q[] =  $request['qty'];
                    $response = inventory::add($conn,$q);
                }
            }elseif($action === 'issued'){
                $q[] =  $request['id'];
                $q[] =  $request['item'];
                $q[] =  $request['date'];
                $q[] =  $request['ref'];
                $q[] =  $request['details'];
                $q[] =  $request['price'];
                $q[] =  $request['qty'];
                $response = inventory::issued($conn,$q);
            }elseif($action === 'fetch'){
                $q[] =  $request['id'];
                $response = inventory::fetch($conn,$q);
            }elseif($action === 'view'){
                $q[] =  $request['id'];
                $response = inventory::view($conn,$q);
            }elseif($action === 'delete'){
                $q[] =  $request['id'];
                $response = inventory::delete($conn,$q);
            }
        break;

        default;
            $response = array(
                "status"=>5110,
                "msg"=>"invaild command"
            );  
    }

    return $response;

}
?>