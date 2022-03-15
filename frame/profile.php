<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<!-- Mirrored from pixelwibes.com/template/ebazar/html/dist/admin-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Mar 2022 12:10:01 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>::eBazar::  Admin Profile </title>   
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css">
</head>
<body>
    <div id="ebazar-layout" class="theme-blue">
        
        <!-- sidebar -->
        <div class="sidebar px-4 py-4 py-md-4 me-0">
            <div class="d-flex flex-column h-100">
                <a href="index-2.html" class="mb-0 brand-icon">
                    <span class="logo-icon">
                        <i class="bi bi-bag-check-fill fs-4"></i>
                    </span>
                    <span class="logo-text">eBazar</span>
                </a>
                <!-- Menu: main ul -->
                <ul class="menu-list flex-grow-1 mt-3">
                   <?=menu()?>
                </ul>
                <!-- Menu: menu collepce btn -->
                <button type="button" class="btn btn-link sidebar-mini-btn text-light">
                    <span class="ms-2"><i class="icofont-bubble-right"></i></span>
                </button>
            </div>
        </div>  

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">

            <!-- Body: Header -->
            <div class="header">
                <nav class="navbar py-4">
                    <div class="container-xxl">
        
                        <!-- header rightbar icon -->
                        <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                            <div class="d-flex">
                                <a class="nav-link text-primary collapsed" href="help.html" title="Get Help">
                                    <i class="icofont-info-square fs-5"></i>
                                </a>
                            </div>
                            <div class="dropdown zindex-popover">
                                <a class="nav-link dropdown-toggle pulse" href="#" role="button" data-bs-toggle="dropdown">
                                    <img src="assets/images/flag/GB.png" alt="">
                                </a>
                                <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-md-end p-0 m-0 mt-3">
                                    <div class="card border-0">
                                        <ul class="list-unstyled py-2 px-3">
                                            <?=language()?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="dropdown notifications">
                                <a class="nav-link dropdown-toggle pulse" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="icofont-alarm fs-5"></i>
                                    <span class="pulse-ring"></span>
                                </a>
                            </div>
                            <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                                <div class="u-info me-2">
                                    <?=userbar()?>
                                </div>
                                <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                                    <img class="avatar lg rounded-circle img-thumbnail" src="assets/images/profile_av.svg" alt="profile">
                                </a>
                                <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                                    <div class="card border-0 w280">
                                        <div class="card-body pb-0">
                                            <div class="d-flex py-1">
                                                <img class="avatar rounded-circle" src="assets/images/profile_av.svg" alt="profile">
                                                <div class="flex-fill ms-3">
                                                    <p class="mb-0"><span class="font-weight-bold">John	Quinn</span></p>
                                                    <small class="">Johnquinn@gmail.com</small>
                                                </div>
                                            </div>
                                            
                                            <div><hr class="dropdown-divider border-dark"></div>
                                        </div>
                                        <div class="list-group m-2 ">
                                            <?=user_menu()?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <!-- menu toggler -->
                        <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
                            <span class="fa fa-bars"></span>
                        </button>
        
                        <!-- main menu Search-->
                        <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                            <div class="input-group flex-nowrap input-group-lg">
                                <input type="search" class="form-control" placeholder="Search" aria-label="search" aria-describedby="addon-wrapping">
                                <button type="button" class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></button>
                                
                            </div>
                        </div>
        
                    </div>
                </nav>
            </div>

            <!-- Body: Body -->
            <div class="body d-flex py-3">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Admin Profile</h3>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row g-3">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Profile Settings</h6>
                                </div>
                                <div class="card-body">
                                    <form method='post' action='index.php' class="row g-4">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="form-label">First Name</label>
                                                <input class="form-control"  type="text" name='fname' value='<?=$profile['fname']?>'>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="form-label">Mid. Name</label>
                                                <input class="form-control" type="text" name='mname' value='<?=$profile['mname']?>'>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="form-label">Surname</label>
                                                <input class="form-control" type="text" name='lname' value='<?=$profile['lname']?>'>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Company Name <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" name='business' value='<?=$profile['business']?>'>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                                <input class="form-control"  type="text" name='mobile' value='<?=$profile['mobile']?>'>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Address</label>
                                                <textarea class="form-control" name='address'  aria-label="With textarea"><?=$profile['address']?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text">@</span>
                                                <input type="text" name='email' value='<?=$profile['email']?>' class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label class="form-label">Website Url</label>
                                            <div class="input-group">
                                                <span class="input-group-text">http://</span>
                                                <input type="text" class="form-control" name='website' value='<?=$profile['website']?>'>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Country</label>
                                                <input class="form-control"  type="text" name='country' value='<?=$profile['country']?>'>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">City</label>
                                                <input class="form-control"  type="text" name='state' value='<?=$profile['state']?>'>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Postal Code</label>
                                                <input class="form-control"  type="text" name='postal-code' value='<?=$profile['postal']?>'>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <button type="submit" name='submit' value='profile-update' class="btn btn-primary text-uppercase px-5">SAVE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card auth-detailblock">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Authentication Details</h6>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#authchange"><i class="icofont-edit"></i></button>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label col-6 col-sm-5">User Name :</label>
                                            <span><strong><?=$profile['username']?>'</strong></span>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label col-6 col-sm-5">Login Password :</label>
                                            <span><strong>Abc*******</strong></span>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label col-6 col-sm-5">Last Login:</label>
                                            <span><strong>128.456.89 (Apple) safari</strong></span>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label col-6 col-sm-5">Last Password change:</label>
                                            <span><strong>3 Month Ago</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Password-->
            <div class="modal fade" id="authchange" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title  fw-bold" id="expeditLabel"> Edit Authentication</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method='post' action='index.php'>
                        <div class="modal-body">
                            <div class="deadline-form">
                                <div class="row g-3 mb-3">
                                    <div class="col-sm-6">
                                        <label for="taxtno111" class="form-label">Password</label>
                                        <input type="password" class="form-control" name='password' value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>  
    </div>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="js/template.js"></script>
 </body>

<!-- Mirrored from pixelwibes.com/template/ebazar/html/dist/admin-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Mar 2022 12:10:01 GMT -->
</html> 