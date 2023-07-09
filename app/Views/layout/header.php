<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?=$page_title?> | <?=lang('AppLang.page_title')?></title>
    <base href="<?=base_url()?>"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Toastr -->
    <link rel="stylesheet" href="vendor/toastr/css/toastr.min.css">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        #response_danger{display: none}
        #response_info{display: none}
        #response_warning{display: none}
        #response_success{display: none}
    </style>>

</head>

<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="#" class="brand-logo">
            <img class="logo-abbr" src="images/logo.png" alt="">
            <img class="logo-compact" src="images/logo-text.png" alt="">
            <img class="brand-title" src="images/logo-text.png" alt="">
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                            <div class="dropdown-menu p-0 m-0">
                                <form>
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                </form>
                            </div>
                        </div>
                    </div>

                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown ">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <span><?=session()->get('lang')=='vi'?'vi':'en'?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="<?=base_url()?>dashboard/lang/vi" class="dropdown-item">
                                  <span class="ml-2">Vietnamese</span>
                                </a>
                                <a href="<?=base_url()?>dashboard/lang/en" class="dropdown-item">
                                    <span class="ml-2">English</span>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <i class="mdi mdi-account"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="<?=base_url()?>dashboard/user/info" class="dropdown-item">
                                    <i class="icon-user"></i>
                                    <span class="ml-2"><?=session()->get('user_id')?> </span>
                                </a>
                                <a href="<?=base_url()?>dashboard/logout" class="dropdown-item">
                                    <i class="icon-key"></i>
                                    <span class="ml-2">Logout </span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->