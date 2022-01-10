<!DOCTYPE html>
<!--
Template Name: Frest HTML Admin Template
Author: :Pixinvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/pixinvent_portfolio
Renew Support: https://1.envato.market/pixinvent_portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>

    @livewireStyles

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="my salafi spuse.">
    <meta name="keywords" content="salafi">
    <meta name="author" content="PIXINVENT">
    <title>My Salafi Spouse</title>
    <link rel="apple-touch-icon" href="{{ url('/site/images/3e.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/site/images/3e.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700"
        rel="stylesheet">


    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/extensions/swiper.min.css">
    <!-- END: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/vendors.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    --}}
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/app-assets/vendors/css/pickers/daterange/daterangepicker.css">

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/themes/semi-dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/forms/select/select2.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/pages/dashboard-ecommerce.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/style.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

    <!-- END: Custom CSS-->




</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <div class="header-navbar-shadow"></div>
    <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top ">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="javascript:void(0);"><i
                                        class="ficon bx bx-menu"></i></a></li>
                        </ul>
                        {{-- <ul class="nav navbar-nav bookmark-icons">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html"
                                    data-toggle="tooltip" data-placement="top" title="Email"><i
                                        class="ficon bx bx-envelope"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html"
                                    data-toggle="tooltip" data-placement="top" title="Chat"><i
                                        class="ficon bx bx-chat"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html"
                                    data-toggle="tooltip" data-placement="top" title="Todo"><i
                                        class="ficon bx bx-check-circle"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calendar.html"
                                    data-toggle="tooltip" data-placement="top" title="Calendar"><i
                                        class="ficon bx bx-calendar-alt"></i></a></li>
                        </ul> --}}
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i
                                        class="ficon bx bx-star warning"></i></a>
                                <div class="bookmark-input search-input">
                                    <div class="bookmark-input-icon"><i class="bx bx-search primary"></i></div>
                                    <input class="form-control input" type="text" placeholder="Explore Frest..."
                                        tabindex="0" data-search="template-search">
                                    <ul class="search-list"></ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        {{-- <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link"
                                id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span
                                    class="selected-language">English</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item"
                                    href="javascript:void(0);" data-language="en"><i
                                        class="flag-icon flag-icon-us mr-50"></i> English</a><a class="dropdown-item"
                                    href="javascript:void(0);" data-language="fr"><i
                                        class="flag-icon flag-icon-fr mr-50"></i> French</a><a class="dropdown-item"
                                    href="javascript:void(0);" data-language="de"><i
                                        class="flag-icon flag-icon-de mr-50"></i> German</a><a class="dropdown-item"
                                    href="javascript:void(0);" data-language="pt"><i
                                        class="flag-icon flag-icon-pt mr-50"></i> Portuguese</a></div>
                        </li> --}}
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                    class="ficon bx bx-fullscreen"></i></a></li>
                        {{-- <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i
                                    class="ficon bx bx-search"></i></a>
                            <div class="search-input">
                                <div class="search-input-icon"><i class="bx bx-search primary"></i></div>
                                <input class="input" type="text" placeholder="Explore Frest..." tabindex="-1"
                                    data-search="template-search">
                                <div class="search-input-close"><i class="bx bx-x"></i></div>
                                <ul class="search-list"></ul>
                            </div>
                        </li> --}}
                        {{-- <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label"
                                href="javascript:void(0);" data-toggle="dropdown"><i
                                    class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i><span
                                    class="badge badge-pill badge-danger badge-up">5</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header px-1 py-75 d-flex justify-content-between"><span
                                            class="notification-title">7 new Notification</span><span
                                            class="text-bold-400 cursor-pointer">Mark all as read</span></div>
                                </li>
                                <li class="scrollable-container media-list"><a class="d-flex justify-content-between"
                                        href="javascript:void(0);">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar mr-1 m-0"><img
                                                        src="{{ url('/') }}/app-assets/images/portrait/small/avatar-s-11.jpg"
                        alt="avatar" height="39" width="39">
                </div>
            </div>
            <div class="media-body">
                <h6 class="media-heading"><span class="text-bold-500">Congratulate
                        Socrates Itumay</span> for work anniversaries</h6><small class="notification-text">Mar 15
                    12:32pm</small>
            </div>
        </div>
        </a><a class="d-flex justify-content-between read-notification cursor-pointer" href="javascript:void(0);">
            <div class="media d-flex align-items-center">
                <div class="media-left pr-0">
                    <div class="avatar mr-1 m-0"><img
                            src="{{ url('/') }}/app-assets/images/portrait/small/avatar-s-16.jpg" alt="avatar"
                            height="39" width="39"></div>
                </div>
                <div class="media-body">
                    <h6 class="media-heading"><span class="text-bold-500">New Message</span>
                        received</h6><small class="notification-text">You have 18 unread
                        messages</small>
                </div>
            </div>
        </a><a class="d-flex justify-content-between cursor-pointer" href="javascript:void(0);">
            <div class="media d-flex align-items-center py-0">
                <div class="media-left pr-0"><img class="mr-1"
                        src="{{ url('/') }}/app-assets/images/icon/sketch-mac-icon.png" alt="avatar" height="39"
                        width="39"></div>
                <div class="media-body">
                    <h6 class="media-heading"><span class="text-bold-500">Updates
                            Available</span></h6><small class="notification-text">Sketch
                        50.2 is currently newly added</small>
                </div>
                <div class="media-right pl-0">
                    <div class="row border-left text-center">
                        <div class="col-12 px-50 py-75 border-bottom">
                            <h6 class="media-heading text-bold-500 mb-0">Update</h6>
                        </div>
                        <div class="col-12 px-50 py-75">
                            <h6 class="media-heading mb-0">Close</h6>
                        </div>
                    </div>
                </div>
            </div>
        </a><a class="d-flex justify-content-between cursor-pointer" href="javascript:void(0);">
            <div class="media d-flex align-items-center">
                <div class="media-left pr-0">
                    <div class="avatar bg-primary bg-lighten-5 mr-1 m-0 p-25"><span
                            class="avatar-content text-primary font-medium-2">LD</span>
                    </div>
                </div>
                <div class="media-body">
                    <h6 class="media-heading"><span class="text-bold-500">New
                            customer</span> is registered</h6><small class="notification-text">1 hrs ago</small>
                </div>
            </div>
        </a><a href="javascript:void(0);">
            <div class="media d-flex align-items-center justify-content-between">
                <div class="media-left pr-0">
                    <div class="media-body">
                        <h6 class="media-heading">New Offers</h6>
                    </div>
                </div>
                <div class="media-right">
                    <div class="custom-control custom-switch">
                        <input class="custom-control-input" type="checkbox" checked id="notificationSwtich">
                        <label class="custom-control-label" for="notificationSwtich"></label>
                    </div>
                </div>
            </div>
        </a><a class="d-flex justify-content-between cursor-pointer" href="javascript:void(0);">
            <div class="media d-flex align-items-center">
                <div class="media-left pr-0">
                    <div class="avatar bg-danger bg-lighten-5 mr-1 m-0 p-25"><span class="avatar-content"><i
                                class="bx bxs-heart text-danger"></i></span></div>
                </div>
                <div class="media-body">
                    <h6 class="media-heading"><span class="text-bold-500">Application</span>
                        has been approved</h6><small class="notification-text">6 hrs
                        ago</small>
                </div>
            </div>
        </a><a class="d-flex justify-content-between read-notification cursor-pointer" href="javascript:void(0);">
            <div class="media d-flex align-items-center">
                <div class="media-left pr-0">
                    <div class="avatar mr-1 m-0"><img
                            src="{{ url('/') }}/app-assets/images/portrait/small/avatar-s-4.jpg" alt="avatar"
                            height="39" width="39"></div>
                </div>
                <div class="media-body">
                    <h6 class="media-heading"><span class="text-bold-500">New file</span>
                        has been uploaded</h6><small class="notification-text">4 hrs
                        ago</small>
                </div>
            </div>
        </a><a class="d-flex justify-content-between cursor-pointer" href="javascript:void(0);">
            <div class="media d-flex align-items-center">
                <div class="media-left pr-0">
                    <div class="avatar bg-rgba-danger m-0 mr-1 p-25">
                        <div class="avatar-content"><i class="bx bx-detail text-danger"></i>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <h6 class="media-heading"><span class="text-bold-500">Finance
                            report</span> has been generated</h6><small class="notification-text">25 hrs ago</small>
                </div>
            </div>
        </a><a class="d-flex justify-content-between cursor-pointer" href="javascript:void(0);">
            <div class="media d-flex align-items-center border-0">
                <div class="media-left pr-0">
                    <div class="avatar mr-1 m-0"><img
                            src="{{ url('/') }}/app-assets/images/portrait/small/avatar-s-16.jpg" alt="avatar"
                            height="39" width="39"></div>
                </div>
                <div class="media-body">
                    <h6 class="media-heading"><span class="text-bold-500">New
                            customer</span> comment recieved</h6><small class="notification-text">2 days ago</small>
                </div>
            </div>
        </a></li>
        <li class="dropdown-menu-footer"><a class="dropdown-item p-50 text-primary justify-content-center"
                href="javascript:void(0)">Read all notifications</a></li>
        </ul>
        </li> --}}
        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                href="javascript:void(0);" data-toggle="dropdown">
                <div class="user-nav d-sm-flex d-none"><span class="user-name">@if(Auth::check())
                        {{ Auth::user()->name }} @endif</span><span class="user-status text-muted">Available</span>
                </div><span>
                    {{-- <img class="round" src="{{ url('/') }}/app-assets/images/portrait/small/avatar-s-11.jpg"
                        alt="avatar" height="40" width="40"> --}}
                    </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pb-0"><a class="dropdown-item"
                    href="{{ url('/superadmin/edit-profile') }}"><i class="bx bx-user mr-50"></i> Edit Profile</a>
                <div class="dropdown-divider mb-0"></div><a class="dropdown-item" href="{{ url('/logout') }}"><i
                        class="bx bx-power-off mr-50"></i> Logout</a>
            </div>
        </li>
        </ul>
        </div>
        </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ url('/') }}/superadmin/dashboard">
                        <img src="{{ url('/site/images/3e.png') }}" alt="" style="width: 179px;">
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                            class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i
                            class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary"
                            data-ticon="bx-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <br>
            <br>
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
                data-icon-style="lines">

                <li class="nav-item {{ Request::is('superadmin/dashboard') ? 'active' : '' }}"><a
                        href="{{ url('/superadmin/dashboard') }}"><i class="menu-livicon" data-icon="desktop"></i><span
                            class="menu-title text-truncate" data-i18n="Email">Dashboard</span></a>
                </li>
                <li class=" navigation-header text-truncate"><span data-i18n="Apps">Apps</span>
                </li>
                <li
                    class="nav-item {{ Request::is('superadmin/profile') || Request::is('superadmin/profile/modify') ? 'active' : ''  }}">
                    <a href="{{ url('/superadmin/profile?filter=Female') }}"><i class="menu-livicon"
                            data-icon="users"></i><span class="menu-title text-truncate"
                            data-i18n="Email">Profile</span></a>
                </li>
                <li class="nav-item {{ Request::is('superadmin/profile-update') ? 'active' : '' }}">
                <a href="{{ url('/superadmin/profile-update') }}"><i class="menu-livicon"
                        data-icon="users"></i><span class="menu-title text-truncate"
                        data-i18n="Email">Update Profile</span></a>
            </li>
                <li
                    class="nav-item {{ Request::is('superadmin/signup-request') || Request::is('superadmin/signup-request') ? 'active' : ''  }}">
                    <a href="{{ url('/superadmin/signup-request') }}"><i class="menu-livicon"
                            data-icon="cpu"></i><span class="menu-title text-truncate"
                            data-i18n="Email">Signup Request</span></a>
                </li>
                <li
                    class="nav-item {{ Request::is('superadmin//website') || Request::is('superadmin/website') ? 'active' : ''  }}">
                    <a href="{{ url('superadmin/website') }}"><i class="menu-livicon" data-icon="globe"></i><span
                            class="menu-title text-truncate" data-i18n="Email">Site</span></a>
                </li>
                <li
                    class="nav-item {{ Request::is('superadmin/config') || Request::is('superadmin/config') ? 'active' : ''  }}">
                    <a href="{{ url('/superadmin/config') }}"><i class="menu-livicon" data-icon="gear"></i><span
                            class="menu-title text-truncate" data-i18n="Email">Config</span></a>
                </li>
                <li
                class="nav-item {{ Request::is('superadmin/match') || Request::is('superadmin/match') ? 'active' : ''  }}">
                <a href="{{ url('/superadmin/match') }}"><i class="menu-livicon" data-icon="heart"></i><span
                        class="menu-title text-truncate" data-i18n="Email">Match</span></a>
            </li>
            <li
                class="nav-item {{ Request::is('superadmin/subscribe') || Request::is('superadmin/subscribe') ? 'active' : ''  }}">
                <a href="{{ url('/superadmin/subscribe') }}"><i class="menu-livicon" data-icon="morph-orientation-smartphone"></i><span
                        class="menu-title text-truncate" data-i18n="Email">Subscribe</span></a>
            </li>
            <li
            class="nav-item {{ Request::is('superadmin/payment-collection') || Request::is('superadmin/payment-collection') ? 'active' : ''  }}">
            <a href="{{ url('/superadmin/payment-collection') }}"><i class="menu-livicon" data-icon="calculator"></i><span
                    class="menu-title text-truncate" data-i18n="Email">Payment Collection</span></a>
        </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                {{ $slot }}
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Customizer-->
    <div class="customizer d-none d-md-block"><a class="customizer-toggle" href="javascript:void(0);"><i
                class="bx bx-cog bx bx-spin white"></i></a>
        <div class="customizer-content p-2">
            <h4 class="text-uppercase mb-0">Theme Customizer</h4>
            <small>Customize & Preview in Real Time</small>
            <a href="javascript:void(0)" class="customizer-close">
                <i class="bx bx-x"></i>
            </a>
            <hr>
            <!-- Theme options starts -->
            <h5 class="mt-1">Theme Layout</h5>
            <div class="theme-layouts">
                <div class="d-flex justify-content-start">
                    <div class="mx-50">
                        <fieldset>
                            <div class="radio">
                                <input type="radio" name="layoutOptions" value="false" id="radio-light"
                                    class="layout-name" data-layout="" checked>
                                <label for="radio-light">Light</label>
                            </div>
                        </fieldset>
                    </div>
                    <div class="mx-50">
                        <fieldset>
                            <div class="radio">
                                <input type="radio" name="layoutOptions" value="false" id="radio-dark"
                                    class="layout-name" data-layout="dark-layout">
                                <label for="radio-dark">Dark</label>
                            </div>
                        </fieldset>
                    </div>
                    <div class="mx-50">
                        <fieldset>
                            <div class="radio">
                                <input type="radio" name="layoutOptions" value="false" id="radio-semi-dark"
                                    class="layout-name" data-layout="semi-dark-layout">
                                <label for="radio-semi-dark">Semi Dark</label>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <!-- Theme options starts -->
            <hr>

            <!-- Menu Colors Starts -->
            <div id="customizer-theme-colors">
                <h5>Menu Colors</h5>
                <ul class="list-inline unstyled-list">
                    <li class="color-box bg-primary selected" data-color="theme-primary"></li>
                    <li class="color-box bg-success" data-color="theme-success"></li>
                    <li class="color-box bg-danger" data-color="theme-danger"></li>
                    <li class="color-box bg-info" data-color="theme-info"></li>
                    <li class="color-box bg-warning" data-color="theme-warning"></li>
                    <li class="color-box bg-dark" data-color="theme-dark"></li>
                </ul>
                <hr>
            </div>
            <!-- Menu Colors Ends -->
            <!-- Menu Icon Animation Starts -->
            <div id="menu-icon-animation">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="icon-animation-title">
                        <h5 class="pt-25">Icon Animation</h5>
                    </div>
                    <div class="icon-animation-switch">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked id="icon-animation-switch">
                            <label class="custom-control-label" for="icon-animation-switch"></label>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <!-- Menu Icon Animation Ends -->
            <!-- Collapse sidebar switch starts -->
            <div class="collapse-sidebar d-flex justify-content-between align-items-center">
                <div class="collapse-option-title">
                    <h5 class="pt-25">Collapse Menu</h5>
                </div>
                <div class="collapse-option-switch">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="collapse-sidebar-switch">
                        <label class="custom-control-label" for="collapse-sidebar-switch"></label>
                    </div>
                </div>
            </div>
            <!-- Collapse sidebar switch Ends -->
            <hr>

            <!-- Navbar colors starts -->
            <div id="customizer-navbar-colors">
                <h5>Navbar Colors</h5>
                <ul class="list-inline unstyled-list">
                    <li class="color-box bg-white border selected" data-navbar-default=""></li>
                    <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
                    <li class="color-box bg-success" data-navbar-color="bg-success"></li>
                    <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
                    <li class="color-box bg-info" data-navbar-color="bg-info"></li>
                    <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
                    <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
                </ul>
                <small><strong>Note :</strong> This option with work only on sticky navbar when you scroll page.</small>
                <hr>
            </div>
            <!-- Navbar colors starts -->
            <!-- Navbar Type Starts -->
            <h5>Navbar Type</h5>
            <div class="navbar-type d-flex justify-content-start">
                <div class="hidden-ele mx-50">
                    <fieldset>
                        <div class="radio">
                            <input type="radio" name="navbarType" value="false" id="navbar-hidden">
                            <label for="navbar-hidden">Hidden</label>
                        </div>
                    </fieldset>
                </div>
                <div class="mx-50">
                    <fieldset>
                        <div class="radio">
                            <input type="radio" name="navbarType" value="false" id="navbar-static">
                            <label for="navbar-static">Static</label>
                        </div>
                    </fieldset>
                </div>
                <div class="mx-50">
                    <fieldset>
                        <div class="radio">
                            <input type="radio" name="navbarType" value="false" id="navbar-sticky" checked>
                            <label for="navbar-sticky">Fixed</label>
                        </div>
                    </fieldset>
                </div>
            </div>
            <hr>
            <!-- Navbar Type Starts -->

            <!-- Footer Type Starts -->
            <h5>Footer Type</h5>
            <div class="footer-type d-flex justify-content-start">
                <div class="mx-50">
                    <fieldset>
                        <div class="radio">
                            <input type="radio" name="footerType" value="false" id="footer-hidden">
                            <label for="footer-hidden">Hidden</label>
                        </div>
                    </fieldset>
                </div>
                <div class="mx-50">
                    <fieldset>
                        <div class="radio">
                            <input type="radio" name="footerType" value="false" id="footer-static" checked>
                            <label for="footer-static">Static</label>
                        </div>
                    </fieldset>
                </div>
                <div class="mx-50">
                    <fieldset>
                        <div class="radio">
                            <input type="radio" name="footerType" value="false" id="footer-sticky">
                            <label for="footer-sticky" class="">Sticky</label>
                        </div>
                    </fieldset>
                </div>
            </div>
            <!-- Footer Type Ends -->
            <hr>

            <!-- Card Shadow Starts-->
            <div class="card-shadow d-flex justify-content-between align-items-center py-25">
                <div class="hide-scroll-title">
                    <h5 class="pt-25">Card Shadow</h5>
                </div>
                <div class="card-shadow-switch">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" checked id="card-shadow-switch">
                        <label class="custom-control-label" for="card-shadow-switch"></label>
                    </div>
                </div>
            </div>
            <!-- Card Shadow Ends-->
            <hr>

            <!-- Hide Scroll To Top Starts-->
            <div class="hide-scroll-to-top d-flex justify-content-between align-items-center py-25">
                <div class="hide-scroll-title">
                    <h5 class="pt-25">Hide Scroll To Top</h5>
                </div>
                <div class="hide-scroll-top-switch">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="hide-scroll-top-switch">
                        <label class="custom-control-label" for="hide-scroll-top-switch"></label>
                    </div>
                </div>
            </div>
            <!-- Hide Scroll To Top Ends-->
        </div>

    </div>
    <!-- End: Customizer-->

    <!-- Buynow Button-->

    <!-- demo chat-->
    {{-- <div class="widget-chat-demo">
        <!-- widget chat demo footer button start -->
        <button class="btn btn-primary chat-demo-button glow px-1"><i class="livicon-evo"
                data-options="name: comments.svg; style: lines; size: 24px; strokeColor: #fff; autoPlay: true; repeat: loop;"></i></button>
        <!-- widget chat demo footer button ends -->
        <!-- widget chat demo start -->
        <div class="widget-chat widget-chat-demo d-none">
            <div class="card mb-0">
                <div class="card-header border-bottom p-0">
                    <div class="media m-75">
                        <a href="JavaScript:void(0);">
                            <div class="avatar mr-75">
                                <img src="{{ url('/') }}/app-assets/images/portrait/small/avatar-s-2.jpg" alt="avtar
    images"
    width="32" height="32">
    <span class="avatar-status-online"></span>
    </div>
    </a>
    <div class="media-body">
        <h6 class="media-heading mb-0 pt-25"><a href="javaScript:void(0);">Kiara Cruiser</a></h6>
        <span class="text-muted font-small-3">Active</span>
    </div>
    </div>
    <div class="heading-elements">
        <i class="bx bx-x widget-chat-close float-right my-auto cursor-pointer"></i>
    </div>
    </div>
    <div class="card-body widget-chat-container widget-chat-demo-scroll">
        <div class="chat-content">
            <div class="badge badge-pill badge-light-secondary my-1">today</div>
            <div class="chat">
                <div class="chat-body">
                    <div class="chat-message">
                        <p>How can we help? 😄</p>
                        <span class="chat-time">7:45 AM</span>
                    </div>
                </div>
            </div>
            <div class="chat chat-left">
                <div class="chat-body">
                    <div class="chat-message">
                        <p>Hey John, I am looking for the best admin template.</p>
                        <p>Could you please help me to find it out? 🤔</p>
                        <span class="chat-time">7:50 AM</span>
                    </div>
                </div>
            </div>
            <div class="chat">
                <div class="chat-body">
                    <div class="chat-message">
                        <p>Stack admin is the responsive bootstrap 4 admin template.</p>
                        <span class="chat-time">8:01 AM</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer border-top p-1">
        <form class="d-flex" onsubmit="widgetChatMessageDemo();" action="javascript:void(0);">
            <input type="text" class="form-control chat-message-demo mr-75" placeholder="Type here...">
            <button type="submit" class="btn btn-primary glow px-1"><i class="bx bx-paper-plane"></i></button>
        </form>
    </div>
    </div>
    </div>
    <!-- widget chat demo ends -->

    </div> --}}
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-left d-inline-block">2021 &copy; CONFINITO</span><span
                class="float-right d-sm-inline-block d-none">Develop By<i
                    class="bx bxs-heart pink mx-50 font-small-3"></i>by<a class="text-uppercase"
                    href="https://confinito.com" target="_blank">CONFINITO</a></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i
                    class="bx bx-up-arrow-alt"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ url('/') }}/app-assets/vendors/js/vendors.min.js"></script>
    <script src="{{ url('/') }}/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js"></script>
    <script src="{{ url('/') }}/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js"></script>
    <script src="{{ url('/') }}/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <script src="{{ url('/') }}/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->

    <script src="{{ url('/') }}/app-assets/vendors/js/extensions/swiper.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ url('/') }}/app-assets/js/scripts/configs/vertical-menu-light.min.js"></script>
    <script src="{{ url('/') }}/app-assets/js/core/app-menu.min.js"></script>
    <script src="{{ url('/') }}/app-assets/js/core/app.min.js"></script>
    <script src="{{ url('/') }}/app-assets/js/scripts/components.min.js"></script>
    <script src="{{ url('/') }}/app-assets/js/scripts/footer.min.js"></script>
    <script src="{{ url('/') }}/app-assets/js/scripts/customizer.min.js"></script>
    <script src="{{ url('/') }}/app-assets/js/scripts/forms/select/form-select2.min.js"></script>
    {{-- <script src="{{ url('/') }}/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="{{ url('/') }}/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="{{ url('/') }}/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="{{ url('/') }}/app-assets/vendors/js/pickers/pickadate/legacy.js"></script> --}}
    <script src="{{ url('/') }}/app-assets/vendors/js/extensions/moment.min.js"></script>
    <script src="{{ url('/') }}/app-assets/vendors/js/pickers/daterange/daterangepicker.js"></script>
    {{-- <script src="{{ url('/') }}/app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script> --}}
    @if(Request::is('dashboard'))
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/charts/apexcharts.css">
    <script src="{{ url('/') }}/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="{{ url('/') }}/app-assets/js/scripts/pages/dashboard-ecommerce.min.js"></script>
    @endif
    @livewireScripts
    <script>
        // this is not firing too
        window.livewire.on('added', response => {
            $('[href="#add"]').tab('show');
        })

    </script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->

    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
