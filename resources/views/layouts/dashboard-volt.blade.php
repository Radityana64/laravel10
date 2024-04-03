<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>GIS 2024</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta name="author" content="Themesberg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
    <link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="og:title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta property="og:description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="og:image"
        content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="twitter:title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta property="twitter:description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="twitter:image"
        content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('storage/volt/src/assets/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('storage/volt/src/assets/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('storage/volt/src/assets/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('storage/volt/src/assets/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('storage/volt/src/assets/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Sweet Alert -->
    <link type="text/css" href="{{ asset('storage/volt/html&css/vendor/sweetalert2/dist/sweetalert2.min.css') }}"
        rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="{{ asset('storage/volt/html&css/vendor/notyf/notyf.min.css') }}" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('storage/volt/html&css/css/volt.css') }}" rel="stylesheet">

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
@yield('css')
</head>

<body style ="grid-template-rows: auto 1fr auto; min-height: 100vh; margin: 0; display: grid;">

    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand me-lg-5" href="../../index.html">
            <img class="navbar-brand-dark" src="{{ asset('storage/volt/html&css/assets/img/brand/light.svg') }}"
                alt="Volt logo" /> <img class="navbar-brand-light"
                src="{{ asset('volt/html&css/assets/img/brand/dark.svg') }}" alt="Volt logo" />
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <div
                class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
                <div class="d-flex align-items-center">
                    <div class="avatar-lg me-4">
                        <img src="{{ asset('storage/volt/src/assets/img/team/profile-picture-1.jpg') }}"
                            class="card-img-top rounded-circle border-white" alt="Bonnie Green">
                    </div>
                    <div class="d-block">
                        <h2 class="h5 mb-3">Hi, Jane</h2>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Sign Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="collapse-close d-md-none">
                    <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                        aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!--SIDEBAR NAV-->
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item">
                    <a href="" class="nav-link d-flex align-items-center">
                        <span class="sidebar-icon">
                            <img src="{{ asset('storage/volt/html&css/assets/img/brand/hmti.png') }}" height="20"
                                width="20" alt="Volt Logo">
                        </span>
                        <span class="mt-1 ms-1 sidebar-text">Geografis Information System</span>
                    </a>
                </li>

                <!--SIDEBAR MENU-->
                <li class="nav-item {{ Request::is('home') ?'active' : '' }}">
                    <a href="{{ route('home') }}" class="nav-link">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 3l8 8v2a1 1 0 01-1 1h-3v-3a1 1 0 00-1-1h-4a1 1 0 00-1 1v3H3a1 1 0 01-1-1v-2l8-8zm4 9v5h-3v-4a1 1 0 00-1-1H8a1 1 0 00-1 1v4H4v-5L10 4l4 4z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-tasks">
                        <span>
                            <span class="sidebar-icon">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.354 1.646a.5.5 0 01.292 0l6 2a.5.5 0 01.354.475V11a1 1 0 01-.29.7l-5 4a1 1 0 01-.95.143l-.115-.057a1 1 0 01-.595-.596l-.056-.114a1 1 0 01.144-.95l4-5a1 1 0 01.7-.29h.472V3.818l-5-1.667V13a1 1 0 01-.293.7l-6 4a1 1 0 01-1.32-1.32l4-6a1 1 0 01.953-.28l.117.058a1 1 0 01.595.595l.057.117a1 1 0 01-.057.952l-4 6a1 1 0 01-.85.447h-.167a.5.5 0 01-.476-.354L.5 12.146A.5.5 0 011 11.646v-9a.5.5 0 01.5-.5h5a.5.5 0 01.5.5v2.146L7.354 1.646zM8 2.793l-5 1.667v7.088l5-3.333 5 3.333V4.46l-5-1.667V2.793z" clip-rule="evenodd"></path>
                                </svg>
                            </span> 
                            <span class="sidebar-text">Task List</span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        </span>
                    </span>
                    <div class="multi-level collapse pl-4" role="list" id="submenu-tasks" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('map-tugas1') }}">
                                    <span class="sidebar-icon">
                                        <svg class="icon icon-xs" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="currentColor" aria-hidden="true">
                                        <circle cx="10" cy="10" r="8"></circle>
                                        </svg>
                                    </span>
                                    <span class="sidebar-text">Tugas 1</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link collapsed d-flex" data-bs-toggle="collapse" data-bs-target="#submenu-tugas2">
                                    <span class="sidebar-icon">
                                        <svg class="icon icon-xs" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="currentColor" aria-hidden="true">
                                        <circle cx="10" cy="10" r="8"></circle>
                                        </svg>
                                    </span>
                                    <span class="sidebar-text">Tugas 2</span>
                                </span>
                                <!-- <span class="link-arrow">
                                    <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                </span> -->
                                <div class="multi-level collapse" role="list" id="submenu-tugas2" aria-expanded="false">
                                    <ul class="flex-column nav">
                                        <li class="nav-item {{ Request::is('centre-point.index') }}">
                                            <a class="nav-link" href="{{ route('centre-point.index') }}">
                                                <span class="sidebar-text">Titik</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('spot.index') }}">
                                                <span class="sidebar-text">Tempat</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('spots') }}">
                                                <span class="sidebar-text">Tampilan</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>


                
                <!-- <li class="nav-item">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#submenu-components">
                        <span>
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.354 1.646a.5.5 0 01.292 0l6 2a.5.5 0 01.354.475V11a1 1 0 01-.29.7l-5 4a1 1 0 01-.95.143l-.115-.057a1 1 0 01-.595-.596l-.056-.114a1 1 0 01.144-.95l4-5a1 1 0 01.7-.29h.472V3.818l-5-1.667V13a1 1 0 01-.293.7l-6 4a1 1 0 01-1.32-1.32l4-6a1 1 0 01.953-.28l.117.058a1 1 0 01.595.595l.057.117a1 1 0 01-.057.952l-4 6a1 1 0 01-.85.447h-.167a.5.5 0 01-.476-.354L.5 12.146A.5.5 0 011 11.646v-9a.5.5 0 01.5-.5h5a.5.5 0 01.5.5v2.146L7.354 1.646zM8 2.793l-5 1.667v7.088l5-3.333 5 3.333V4.46l-5-1.667V2.793z" clip-rule="evenodd"></path>
                            </svg>
                        </span> 
                            <span class="sidebar-text">Task List</span>
                        </span>
                            <span class="link-arrow">
                             <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            </span>
                    </span>
                    <div class="multi-level collapse pl-4" role="list"
                    id="submenu-components" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item {{ Request::is('map-tugas1') }}">
                            <a class="nav-link" href="{{ route('map-tugas1') }}">
                            <span class="sidebar-icon">
                            <svg class="icon icon-xs" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="currentColor" aria-hidden="true">
                                <circle cx="10" cy="10" r="8"></circle>
                            </svg>
                            </span>
                            <span class="sidebar-text">Tugas 1</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                                data-bs-toggle="collapse" data-bs-target="#submenu-components">
                                <span class="sidebar-icon">
                                <svg class="icon icon-xs" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="currentColor" aria-hidden="true">
                                    <circle cx="10" cy="10" r="8"></circle>
                                </svg>
                            </span>
                            <span class="sidebar-text">Tugas 2</span>
                            </a>
                            <span class="link-arrow">
                             <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            </span>

                            <span>
                                <div class="multi-level collapse pl-4" role="list"
                                id="submenu-components" aria-expanded="false">
                                <ul class="flex-column nav">
                                <li class="nav-item {{ Request::is('centre-point.create') }}">
                                <a class="nav-link" href="{{ route('centre-point.index') }}">
                            </span> 
                                <span class="sidebar-text">Titik</span>
                            </span>
                        
                            <li class="nav-item {{ Request::is('spot.create') }}">
                                <a class="nav-link" href="{{ route('spot.index') }}">
                                <span class="sidebar-text">Tempat</span>
                                </a>
                            </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('belum-buat') }}">
                            <span class="sidebar-text">Tugas 3</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('belum-buat') }}">
                            <span class="sidebar-text">Tugas 4</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('belum-buat') }}">
                            <span class="sidebar-text">Tugas 5</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('belum-buat') }}">
                            <span class="sidebar-text">Tugas 6</span>
                            </a>
                        </li> -->
                        <!-- </ul>
                    </div>
                    </li> --> 

                <li class="nav-item ">
                    <a href="{{ route('belum-buat') }}" class="nav-link">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0l6.5 6.5a1 1 0 01-1.414 1.414l-6.5-6.5a1 1 0 010-1.414zM11 7a1 1 0 11-2 0 1 1 0 012 0zm-4 6a1 1 0 100-2 1 1 0 000 2zm3 3a1 1 0 110-2 1 1 0 010 2zm4-6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Settings</span>
                    </a>
                </li>

                <!--SIDEBAR MENU-->

                <li role="separator" class="dropdown-divider mt-4 mb-4 border-gray-700"></li>
            </ul>
            <!--HEADER NAV-->
            
        </div>
    </nav>

    <main class="content">

        <!--HEADER NAV-->
        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between w-20" id="navbarSupportedContent">
                    <div class="d-flex align-items-center">
                        <!-- Search form -->
                        <!-- <form class="navbar-search form-inline" id="navbar-search-main">
                            <div class="input-group input-group-merge search-bar">
                                <span class="input-group-text" id="topbar-addon">
                                    <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <input type="text" class="form-control" id="topbarInputIconLeft"
                                    placeholder="Search" aria-label="Search" aria-describedby="topbar-addon">
                            </div>
                        </form> -->
                        <!-- / Search form -->
                    </div>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center">
                        
                        <li class="nav-item dropdown ms-lg-3">
                            <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="media d-flex align-items-center">
                                    <img class="avatar rounded-circle" alt="Image placeholder"
                                        src="{{ asset('storage\volt\html&css\assets\img\team\foto profil.jpg') }}">
                                    <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                        <span class="mb-0 font-small fw-bold text-gray-900">I Nengah Radityana</span>
                                    </div>
                                </div>
                            </a>
                            
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <br>
        <!--HEADER NAV-->

        <!--DROPDOWN MENU-->
        {{-- <div class="py-4">
            <div class="dropdown">
                <button class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    New Task
                </button>
                <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                            </path>
                        </svg>
                        Add User
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
                            </path>
                        </svg>
                        Add Widget
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                            </path>
                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                        </svg>
                        Upload Files
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Preview Security
                    </a>
                    <div role="separator" class="dropdown-divider my-1"></div>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <svg class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Upgrade to Pro
                    </a>
                </div>
            </div>
        </div> --}}
        <!--DROPDOWN MENU-->

        <!--DISPLAY CONTENT-->
        <div class="row">
           
            @yield('content')
        </div>
        <!--DISPLAY CONTENT-->

        
        <footer class="bg-white rounded shadow p-5 mb-4 mt-4" >
            <div class="row">
                <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
                    <p class="mb-0 text-center text-lg-start">2105551095 -<span class="current-year"></span> <a
                            class="text-primary fw-normal" href="https:/gis.manpits.xyz"
                            target="_blank">Sistem Informasi Geografis</a></p>
                </div>

                <div class="col-12 col-md-8 col-xl-6  text-lg-start">
                    <!-- List -->
                    <ul class="list-inline list-group-flush list-group-borderless text-md-end mb-0">
                        <!-- <li class="list-inline-item px-0 px-sm-1" style="margin-right: -5px;">
                            <a href="">2105551095</a>
                        </li> -->
                        
                        <li class="list-inline-item px-0 px-sm-1 "style="margin-right: -5px;">
                            <a href="https://www.linkedin.com/in/i-nengah-radityana-2bb871262/" target="_blank" >
                                <img class="avatar rounded-circle" alt="Image placeholder" src="{{ asset('storage/volt/html&css/assets/img/icons/linkedin.png') }}">
                            </a>   
                        </li>
                    </ul>
                </div>

            
            </div>
        </footer>
    </main>

    <!-- Core -->
    <script src="{{ asset('storage/volt/html&css/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('storage/volt/html&css/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Vendor JS -->
    <script src="{{ asset('storage/volt/html&css/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>

    <!-- Slider -->
    <script src="{{ asset('storage/volt/html&css/vendor/nouislider/dist/nouislider.min.js') }}"></script>

    <!-- Smooth scroll -->
    <script src="{{ asset('storage/volt/html&css/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>

    <!-- Charts -->
    

    <!-- Datepicker -->
    <script src="{{ asset('storage/volt/html&css/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

    <!-- Sweet Alerts 2 -->
    <script src="{{ asset('storage/volt/html&css/vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

    <!-- Vanilla JS Datepicker -->
    <script src="{{ asset('storage/volt/html&css/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

    <!-- Notyf -->
    <script src="{{ asset('storage/volt/html&css/vendor/notyf/notyf.min.js') }}"></script>

    <!-- Simplebar -->
    <script src="{{ asset('storage/volt/html&css/vendor/simplebar/dist/simplebar.min.js') }}"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    @stack('javascript')
    <!-- Volt JS -->
    {{-- <script src="{{ asset('volt/hmtl&css/assets/js/volt.js') }}"></script> --}}


</body>

</html>
