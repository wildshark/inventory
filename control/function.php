<?php

function profile(){

    $profile['endpoint'] = 'user::fetch';
    $profile['id'] = $_SESSION['cid'];
    $profile = conn($profile);
    if(isset($profile['response']['status'])){
        $d = array(
            'business'=>'',
            'fname'=>'',
            'mname'=>'',
            'address'=>'',
            'email'=>'',
            'mobile'=>'',
            'country'=>'',
            'state'=>'',
            'website'=>'',
            'postal'=>'',
            'username'=>'',
            'passwor'=>''
        );
    }else{
        $profile = $profile['response'];
        $d = array(
            'business'=>$profile['company_name'],
            'fname'=>$profile['fname'],
            'mname'=>$profile['mname'],
            'lname'=>$profile['lname'],
            'address'=>$profile['address'],
            'email'=>$profile['email'],
            'mobile'=>$profile['mobile'],
            'country'=>$profile['country'],
            'state'=>$profile['state'],
            'website'=>$profile['website'],
            'postal'=>$profile['postal_code'],
            'username'=>$profile['username'],
            'passwor'=>$profile['password']
        );
    }

    return $d;
} 

function category_combo(){

    $data = array(
        'endpoint'=>'category::fetch',
        'id'=>$_SESSION['cid']
    );
    $combo='';
    $response = conn($data);
    $datasheet = $response['response']['data'];
    if(!isset($response['response']['data'])){
        $combo ='';
    }else{
        foreach($datasheet as $r){
            $id = $r['category_id'];
            $name = $r['category_name'];
            $combo.="<option value='{$id}'>{$name}</option>";
        }
    }
    return $combo;
}


function product_combo(){

    $data = array(
        'endpoint'=>'item::fetch',
        'id'=>$_SESSION['cid']
    );
    $combo='';
    $response = conn($data);
    $datasheet = $response['response']['data'];
    if(!isset($response['response']['data'])){
        $combo ='';
    }else{
        foreach($datasheet as $r){
            $id = $r['item_id'];
            $name = $r['item'];
            $combo.="<option value='{$id}'>{$name}</option>";
        }
    }
    return $combo;
}

function summary($bal){

    if((isset($bal['status']))||($bal == false)){
        $purchase = 0;
        $issued = 0;
        $return = 0;
        $balance = 0;
    }else{
        $purchase = $bal['purchase'];
        $issued = $bal['issued'];
        $return = $bal['returs'];
        $balance = (($purchase + $return) - $issued);
    }

    return'
    <div class="col">
        <div class="alert-success alert mb-0">
            <div class="d-flex align-items-center">
                <div class="avatar rounded no-thumbnail bg-warning text-light"><i class="fa fa-dollar fa-lg"></i></div>
                <div class="flex-fill ms-3 text-truncate">
                    <div class="h6 mb-0">Purchase</div>
                    <span class="small">'.$purchase.'</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="alert-danger alert mb-0">
            <div class="d-flex align-items-center">
                <div class="avatar rounded no-thumbnail bg-success text-light"><i class="fa fa-credit-card fa-lg"></i></div>
                <div class="flex-fill ms-3 text-truncate">
                    <div class="h6 mb-0">Issued</div>
                    <span class="small">'.$issued.'</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="alert-warning alert mb-0">
            <div class="d-flex align-items-center">
                <div class="avatar rounded no-thumbnail bg-danger text-light"><i class="fa fa-smile-o fa-lg"></i></div>
                <div class="flex-fill ms-3 text-truncate">
                    <div class="h6 mb-0">Returns</div>
                    <span class="small">'.$return.'</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="alert-info alert mb-0">
            <div class="d-flex align-items-center">
                <div class="avatar rounded no-thumbnail bg-info text-light"><i class="fa fa-shopping-bag" aria-hidden="true"></i></div>
                <div class="flex-fill ms-3 text-truncate">
                    <div class="h6 mb-0">Balance</div>
                    <span class="small">'.$balance.'</span>
                </div>
            </div>
        </div>
    </div>';
}

function current_transaction_datasheet($data){

    
    $sheet='';
   
    if(isset($data['status'])){
        $sheet ='';
    }else{
        foreach($data as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }
            
            $id = $r['item_id'];
            $item = $r['item'];
            $ref = $r['ref'];
            $category = $r['category_name'];
            $qty = number_format($r['qty'],1);
            $amt = number_format($r['amt'],2);

            if($r['status_id'] == 1){
                $css = "badge bg-warning";
                $text = 'Purchase';
            }elseif($r['status_id'] == 2){
                $css = "badge bg-success";
                $text = 'Issued';
            }elseif($r['status_id'] == 3){
                $css = "badge bg-danger";
                $text = 'Return';
            }

            $sheet.=" 
            <tr>
                <td><strong>{$n}</strong></td>
                <td>{$ref}</td>
                <td>{$item}</td>                
                <td>{$category}</td>
                <td>{$qty}</td>
                <td>{$amt}</td>
                <td><span class='{$css}'>{$text}</span></td>
            </tr>";
        }
    }
    return $sheet;
}

function category_datasheet(){

    $data = array(
        'endpoint'=>'category::fetch',
        'id'=>$_SESSION['cid']
    );
    $sheet='';
    $response = conn($data);
    
    if(!isset($response['response']['data'])){
        $sheet ='';
    }else{
        $datasheet = $response['response']['data'];
        foreach($datasheet as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }
            if($r['status_id'] == 1){
                $status = 'Published';
                $css ='badge bg-success';
            }else{
                $status = 'Hidden';
                $css ='badge bg-danger';
            }
            $id = $r['category_id'];
            $name = $r['category_name'];

            $sheet.=" 
            <tr>
                <td><strong>{$n}</strong></td>
                <td>{$name}</td>
                <td><span class='{$css}'>{$status}</span></td>
                <td>
                    <div class='btn-group' role='group' aria-label='Basic outlined example'>
                        <a href='categories-edit.html' class='btn btn-outline-secondary'><i class='icofont-edit text-success'></i></a>
                        <a href='?submit=category-delete&id={$id}' class='btn btn-outline-secondary deleterow'><i class='icofont-ui-delete text-danger'></i></button>
                    </div>
                </td>
            </tr>";
        }
    }
    return$sheet;
}

function product_datasheet(){

    $data = array(
        'endpoint'=>'item::fetch',
        'id'=>$_SESSION['cid']
    );
    $sheet='';
    $response = conn($data);

    if(!isset($response['response']['data'])){
        $sheet ='';
    }else{ 
        foreach($response['response']['data'] as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }
            if($r['status_id'] == 1){
                $status = 'Published';
                $css ='badge bg-success';
            }else{
                $status = 'Hidden';
                $css ='badge bg-danger';
            }
            $id = $r['item_id'];
            $item = $r['item'];
            $category = $r['category_name'];

            $sheet.=" 
            <tr>
                <td><strong>{$n}</strong></td>
                <td>{$item}</td>
                <td>{$category}</td>
                <td><span class='{$css}'>{$status}</span></td>
                <td>
                    <div class='btn-group' role='group' aria-label='Basic outlined example'>
                        <a href='categories-edit.html' class='btn btn-outline-secondary'><i class='icofont-edit text-success'></i></a>
                        <a href='?submit=product-delete&id={$id}' class='btn btn-outline-secondary deleterow'><i class='icofont-ui-delete text-danger'></i></button>
                    </div>
                </td>
            </tr>";
        }
    }
    return$sheet;
}

function purchase_datasheet(){

    $data = array(
        'endpoint'=>'stock::fetch::purchase',
        'id'=>$_SESSION['cid']
    );
    $sheet='';
    $response = conn($data);
    if(!isset($response['response']['data'])){
        $sheet ='';
    }else{
        foreach($response['response']['data'] as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }
            
            $id = $r['inventory_id'];
            $date = date('d-m-y',strtotime($r['inv_date'])); 
            $item = $r['item'];
            $category = $r['category_name'];
            $ref = $r['ref'];
            $price = number_format($r['price'],2);
            $qty = number_format($r['qty_in'],2);
            $amt = number_format($r['amt'],2);

            $sheet.=" 
            <tr>
                <td><strong>{$n}</strong></td>
                <td>{$date}</td>
                <td>{$ref}</td>
                <td>{$item}</td>
                <td>{$category}</td>
                <td>{$price}</td>
                <td>{$qty}</td>
                <td>{$amt}</td>
                <td>
                    <div class='btn-group' role='group' aria-label='Basic outlined example'>
                        <a href='categories-edit.html' class='btn btn-outline-secondary'><i class='icofont-edit text-success'></i></a>
                        <a href='?submit=inventory-delete&id={$id}' class='btn btn-outline-secondary deleterow'><i class='icofont-ui-delete text-danger'></i></button>
                    </div>
                </td>
            </tr>";
        }
    }
    return$sheet;
}

function issued_datasheet(){

    $data = array(
        'endpoint'=>'stock::fetch::issued',
        'id'=>$_SESSION['cid']
    );
    $sheet='';
    $response = conn($data);
   
    if(!isset($response['response']['data'])){
        $sheet ='';
    }else{
        foreach($response['response']['data'] as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }
            
            $id = $r['inventory_id'];
            $date = date('d-m-y',strtotime($r['inv_date'])); 
            $item = $r['item'];
            $category = $r['category_name'];
            $ref = $r['ref'];
            $price = number_format($r['price'],2);
            $qty = number_format($r['qty_out'],2);
            $amt = number_format($r['amt'],2);

            $sheet.=" 
            <tr>
                <td><strong>{$n}</strong></td>
                <td>{$date}</td>
                <td>{$ref}</td>
                <td>{$item}</td>
                <td>{$category}</td>
                <td>{$price}</td>
                <td>{$qty}</td>
                <td>{$amt}</td>
                <td>
                    <div class='btn-group' role='group' aria-label='Basic outlined example'>
                        <a href='categories-edit.html' class='btn btn-outline-secondary'><i class='icofont-edit text-success'></i></a>
                        <a href='?submit=inventory-delete&id={$id}' class='btn btn-outline-secondary deleterow'><i class='icofont-ui-delete text-danger'></i></button>
                    </div>
                </td>
            </tr>";
        }
    }
    return $sheet;
}

function return_datasheet(){

    $data = array(
        'endpoint'=>'stock::fetch::returns',
        'id'=>$_SESSION['cid']
    );
    $sheet='';
    $response = conn($data);
    if(!isset($response['response']['data'])){
        $sheet ='';
    }else{
        foreach($response['response']['data'] as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }
            
            $id = $r['inventory_id'];
            $date = date('d-m-y',strtotime($r['inv_date'])); 
            $item = $r['item'];
            $category = $r['category_name'];
            $ref = $r['ref'];
            $price = number_format($r['price'],2);
            $qty = number_format($r['qty_return'],2);
            $amt = number_format($r['amt'],2);

            $sheet.=" 
            <tr>
                <td><strong>{$n}</strong></td>
                <td>{$date}</td>
                <td>{$ref}</td>
                <td>{$item}</td>
                <td>{$category}</td>
                <td>{$price}</td>
                <td>{$qty}</td>
                <td>{$amt}</td>
                <td>
                    <div class='btn-group' role='group' aria-label='Basic outlined example'>
                        <a href='categories-edit.html' class='btn btn-outline-secondary'><i class='icofont-edit text-success'></i></a>
                        <a href='?submit=inventory-delete&id={$id}' class='btn btn-outline-secondary deleterow'><i class='icofont-ui-delete text-danger'></i></button>
                    </div>
                </td>
            </tr>";
        }
    }
    return $sheet;
}

function stock_datasheet(){

    $data = array(
        'endpoint'=>'stock::fetch::summary',
        'id'=>$_SESSION['cid']
    );
    $sheet='';
    $response = conn($data);
    if(!isset($response['response']['data'])){
        $sheet ='';
    }else{
        foreach($response['response']['data'] as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }
            
            $id = $r['item_id'];
            $item = $r['item'];
            $category = $r['category_name'];
            $purchase = number_format($r['purchase'],1);
            $issued = number_format($r['issued'],1);
            $balance = number_format(($r['purchase'] - $r['issued']),1);

            $sheet.=" 
            <tr>
                <td><strong>{$n}</strong></td>
                <td>{$item}</td>
                <td>{$category}</td>                
                <td>{$purchase}</td>
                <td>{$issued}</td>
                <td>{$balance}</td>
                <td>
                    <div class='btn-group' role='group' aria-label='Basic outlined example'>
                        <a href='?main=details&id={$id}&item={$item}' class='btn btn-outline-secondary'><i class='icofont-eye text-success'></i></a>
                    </div>
                </td>
            </tr>";
        }
    }
    return $sheet;
}

function details_datasheet(){

    $data = array(
        'endpoint'=>'stock::fetch::details',
        'id'=>$_SESSION['cid'],
        'product'=>$_GET['id']
    );
    $sheet='';
    $response = conn($data);
    $datasheet = $response['response']['data'];
    if(!isset($response['response']['data'])){
        $sheet ='';
    }else{
        foreach($datasheet as $r){
            if(!isset($n)){
                $n = 1;
            }else{
                $n = $n + 1;
            }
            
            $id = $r['item_id'];
            $item = $r['item'];
            $category = $r['category_name'];
            $purchase = number_format($r['qty_in'],1);
            $issued = number_format($r['qty_out'],1);
            $balance = number_format(($r['qty_in'] - $r['qty_out']),1);

            $sheet.=" 
            <tr>
                <td><strong>{$n}</strong></td>
                <td>{$item}</td>
                <td>{$category}</td>                
                <td>{$purchase}</td>
                <td>{$issued}</td>
                <td>{$balance}</td>
                <td>
                    <div class='btn-group' role='group' aria-label='Basic outlined example'>
                        <a href='?main=details&id={$id}' class='btn btn-outline-secondary'><i class='icofont-eye text-success'></i></a>
                    </div>
                </td>
            </tr>";
        }
    }
    return $sheet;
}

function conn($request){
   // echo http_build_query($request);
 // exit(0);
   $ch = curl_init();
    
   $url ="https://api.iquipedigital.com/inventory/";
   curl_setopt($ch,CURLOPT_URL,$url);
   curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
   curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($request));
   curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
   curl_setopt($ch,CURLOPT_TIMEOUT, 20);
   $response = curl_exec($ch);
   curl_close ($ch);
   return json_decode($response,TRUE);
}
    
?>