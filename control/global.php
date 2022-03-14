<?php

function menu(){

    return' 
        <li><a class="m-link active" href="?main=dashboard"><i class="icofont-home fs-5"></i> <span>Dashboard</span></a></li>
        <li><a class="m-link" href="?main=categories"><i class="icofont-chart-flow fs-5"></i> <span>Categories</span></a></li>
        <li><a class="m-link" href="?main=product"><i class="icofont-truck-loaded fs-5"></i> <span>Product</span></a></li>
        <li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-inventory" href="#">
            <i class="icofont-chart-histogram fs-5"></i> <span>Inventory</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
            <!-- Menu: Sub menu ul -->
            <ul class="sub-menu collapse" id="menu-inventory">
                <li><a class="ms-link" href="inventory-info.html">Stock List</a></li>
                <li><a class="ms-link" href="purchase.html">Purchase</a></li>
                <li><a class="ms-link" href="supplier.html">Supplier</a></li>
                <li><a class="ms-link" href="returns.html">Returns</a></li>
                <li><a class="ms-link" href="department.html">Department</a></li>
            </ul>
        </li>';
}

function language(){

    return'
    <li>
        <a href="?main=dashboard&lang=en" class=""><img src="assets/images/flag/GB.png" alt=""> English</a>
    </li>
    <li>
        <a href="?main=dashboard&lang=fr" class=""><img src="assets/images/flag/FR.png" alt=""> French</a>
    </li>';
}

function user_menu(){

    return'
        <a href="?main=admin-profile" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user fs-5 me-3"></i>Profile Page</a>
        <a href="?user=auth-signin" class="list-group-item list-group-item-action border-0 "><i class="icofont-logout fs-5 me-3"></i>Signout</a>
    ';
}

function conn($request){
    //echo http_build_query($data);
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
    
