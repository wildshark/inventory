<?php

function category_combo(){

    $data = array(
        'endpoint'=>'category::fetch',
        'id'=>$_SESSION['cid']
    );
    $combo='';
    $response = conn($data);
    if(isset($response['response']['status'])){
        $combo ='';
    }else{
        foreach($response['response'] as $r){
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
    if(isset($response['response']['status'])){
        $combo ='';
    }else{
        foreach($response['response'] as $r){
            $id = $r['item_id'];
            $name = $r['item'];
            $combo.="<option value='{$id}'>{$name}</option>";
        }
    }
    return $combo;
}

function category_datasheet(){

    $data = array(
        'endpoint'=>'category::fetch',
        'id'=>$_SESSION['cid']
    );
    $sheet='';
    $response = conn($data);
    if(isset($response['response']['status'])){
        $sheet ='';
    }else{
        foreach($response['response'] as $r){
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
    if(isset($response['response']['status'])){
        $sheet ='';
    }else{
        foreach($response['response'] as $r){
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
    if(isset($response['response']['status'])){
        $sheet ='';
    }else{
        foreach($response['response'] as $r){
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
    if(isset($response['response']['status'])){
        $sheet ='';
    }else{
        foreach($response['response'] as $r){
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
    if(isset($response['response']['status'])){
        $sheet ='';
    }else{
        foreach($response['response'] as $r){
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
    if(isset($response['response']['status'])){
        $sheet ='';
    }else{
        foreach($response['response'] as $r){
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
                        <a href='?main=details&id={$id}' class='btn btn-outline-secondary'><i class='icofont-eye text-success'></i></a>
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
    if(isset($response['response']['status'])){
        $sheet ='';
    }else{
        foreach($response['response'] as $r){
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
    echo http_build_query($request);
    //exit();
    $options = array(
        'http'=> array(
        'method'=> "POST",
        'header'=>
            "Accept-language: en\r\n".
            "Content-type: application/x-www-form-urlencoded\r\n",
            'content'=>http_build_query($request)
            )
        );
              
    $context = stream_context_create($options);
              
    $fp = fopen('http://localhost/inventory/api/','rb',false,$context);
    $response = stream_get_contents($fp);
    return json_decode($response,true);
    
}
    
?>