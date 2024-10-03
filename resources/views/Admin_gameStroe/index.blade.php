<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <title>Game Store</title>
    <meta charset="utf-8">
    <meta name="author" content="alali">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/font/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/icon/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/images/logo/fav.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('admin/images/logo/fav.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/custom.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="body">
    <div id="wrapper">
        <div id="page" class="">
            <div class="layout-wrap">

                <!-- <div id="preload" class="preload-container">
    <div class="preloading">
        <span></span>
    </div>
</div> -->

                <div class="section-menu-left">
                    <div class="box-logo">
                        <a href="indexAdmin" id="site-logo-inner">
                            <img class="" id="logo_header" alt=""
                                src="{{ asset('admin/images/logo/logo.png') }}" data-light="images/logo/logo.png"
                                data-dark="images/logo/logo.png">
                        </a>
                        <div class="button-show-hide">
                            <i class="icon-menu-left"></i>
                        </div>
                    </div>
                    <div class="center">
                        <div class="center-item">
                            <div class="center-heading">Main Home</div>
                            <ul class="menu-list">
                                <li class="menu-item">
                                    <a href="indexAdmin" class="">
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">Dashboard</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="center-item">
                            <ul class="menu-list">
                                <li class="menu-item has-children">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-controller" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1z" />
                                                <path
                                                    d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729q.211.136.373.297c.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466s.34 1.78.364 2.606c.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527s-2.496.723-3.224 1.527c-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.3 2.3 0 0 1 .433-.335l-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a14 14 0 0 0-.748 2.295 12.4 12.4 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.4 12.4 0 0 0-.339-2.406 14 14 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27s-2.063.091-2.913.27" />
                                            </svg>
                                        </div>
                                        <div class="ml-6 text">Games</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="add-game.html" class="">
                                                <div class="text">Add Game</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="games.html" class="">
                                                <div class="text">Games</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item has-children">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><i class="icon-layers"></i></div>
                                        <div class="ml-6 text">Category</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="/addCategory" class="">
                                                <div class="text">New Category</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="categories" class="">
                                                <div class="text">Categories</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-item has-children">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-piggy-bank-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069q0-.218-.02-.431c.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a1 1 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.74.74 0 0 0-.375.562c-.024.243.082.48.32.654a2 2 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595m7.173 3.876a.6.6 0 0 1-.098.21l-.044-.025c-.146-.09-.157-.175-.152-.223a.24.24 0 0 1 .117-.173c.049-.027.08-.021.113.012a.2.2 0 0 1 .064.199m-8.999-.65a.5.5 0 1 1-.276-.96A7.6 7.6 0 0 1 7.964 3.5c.763 0 1.497.11 2.18.315a.5.5 0 1 1-.287.958A6.6 6.6 0 0 0 7.964 4.5c-.64 0-1.255.09-1.826.254ZM5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0" />
                                            </svg>
                                        </div>
                                        <div class="text ml-6">Transfer</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="transfer" class="">
                                                <div class="text">Money Transfer</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a href="addSlide" class="">
                                        <div class="icon"><i class="icon-image"></i></div>
                                        <div class="text ml-6">Slider</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="/allUser" class="">
                                        <div class="icon"><i class="icon-user"></i></div>
                                        <div class="text ml-6">User</div>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="settings" class="">
                                        <div class="icon"><i class="icon-settings"></i></div>
                                        <div class="text ml-6">Settings</div>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="indexAdmin" class="">
                                        <div class="icon"><i class="icon-database"></i></div>
                                        <div class="text ml-6">Dashboard</div>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="/" class="">
                                        <div class="icon"><i class="icon-log-out"></i></div>
                                        <div class="text ml-6">Logout</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="section-content-right">

                    <div class="header-dashboard">
                        <div class="wrap">
                            <div class="header-left">
                                <a href="index-2.html">
                                    <img class="" id="logo_header_mobile" alt=""
                                        src="images/logo/fav.png" data-light="images/logo/fav.png"
                                        data-dark="images/logo/fav.png" data-width="154px" data-height="52px"
                                        data-retina="images/logo/fav.png">
                                </a>
                                <div class="button-show-hide">
                                    <i class="icon-menu-left"></i>
                                </div>


                                <form class="form-search flex-grow">
                                    <fieldset class="name">
                                        <input type="text" placeholder="Search here..." class="show-search"
                                            name="name" tabindex="2" value="" aria-required="true"
                                            required="">
                                    </fieldset>
                                    <div class="button-submit">
                                        <button class="" type="submit"><i class="icon-search"></i></button>
                                    </div>
                                </form>

                            </div>
                            <div class="header-grid">






                                <div class="popup-wrap user type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-user wg-user">
                                                <span class="image">
                                                    <img src="{{ asset('admin/images/avatar/user-1.png') }}"
                                                        alt="">
                                                </span>
                                                <span class="flex flex-column">
                                                    <span class="body-title-2 mb-2">{{ $admin->name }}</span>
                                                    <span class="text-tiny">Admin</span>
                                                </span>
                                            </span>
                                        </button>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="main-content">
                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="tf-section-2 mb-30 w-100">
                                    <div class="flex gap20 flex-wrap-mobile">
                                        <div class="w-half">
                                            <div class="wg-chart-default mb-20 w-100">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center gap14">
                                                        <div class="image ic-bg">
                                                            <i class="icon-shopping-bag"></i>
                                                        </div>
                                                        <div>
                                                            <div class="body-text mb-2">Total Transferred Mony</div>
                                                            <h4>{{ $governorCount }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wg-chart-default mb-20 ">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center gap14">
                                                        <div class="image ic-bg">
                                                            <i class="icon-dollar-sign"></i>
                                                        </div>
                                                        <div>
                                                            <div class="body-text mb-2">Total Earn money</div>
                                                            <h4>{{ $amount }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-half">
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-section mb-30">
                                    <div class="wg-box">
                                        <div class="flex items-center justify-between">
                                            <h5>Transfer orders</h5>
                                            <div class="dropdown default">
                                                <a class="btn btn-secondary dropdown-toggle" href="#">
                                                    <span class="view-all">View all</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="wg-table table-all-user">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:70px">Transfer NO</th>
                                                            <th class="text-center">Name</th>
                                                            <th class="text-center">Phone</th>
                                                            <th class="text-center">amount</th>
                                                            <th class="text-center">address</th>
                                                            <th class="text-center">transfer Company</th>
                                                            <th class="text-center">Transfer on</th>
                                                            <th class="text-center">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($governor as $item)
                                                            <tr>
                                                                <th style="width:70px">{{ $item->id }}</th>
                                                                <th class="text-center">
                                                                    {{ $item->wallet->user->name }}
                                                                </th>
                                                                <th class="text-center">
                                                                    {{ $item->wallet->user->phone }}
                                                                </th>
                                                                <th class="text-center">{{ $item->amount }}</th>
                                                                <th class="text-center">{{ $item->address }}</th>
                                                                <th class="text-center">{{ $item->transferCompany }}
                                                                </th>
                                                                <th class="text-center">{{ $item->updated_at }}</th>
                                                                </th>
                                                                <td class="text-center">
                                                                    <a
                                                                        href="{{ route('transferDetails', ['id' => $item->id]) }}">
                                                                        <div class="list-icon-function view-icon">
                                                                            <div class="item eye">
                                                                                <i class="icon-eye"></i>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wg-box mt-5">
                                        <div class="table-responsive">
                                            <div class="flex items-center justify-between">
                                                <h5>Users</h5>
                                                <div class="dropdown default">
                                                    <a class="btn btn-secondary dropdown-toggle" href="/allUser">
                                                        <span class="view-all">View all</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>User</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th class="text-center">Total Transfered mony</th>
                                                        <th> Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($regularUsers as $item)
                                                        <tr>
                                                            <td> {{ $item->id - 1 }}</td>
                                                            <td class="pname">
                                                                <div class="image">
                                                                    <img src="admin/images/120x120.png" alt=""
                                                                        class="image">
                                                                </div>
                                                                <div class="name" style="color: black">
                                                                    {{ $item->name }}
                                                                </div>
                                                            </td>
                                                            <td>{{ $item->phone }}</td>
                                                            <td>{{ $item->email }}</td>
                                                            <td class="text-center"><a href="#"
                                                                    target="_blank">0</a></td>
                                                            <td class="text-center">
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="25" height="25"
                                                                        style="color: red;" fill="currentColor"
                                                                        class="bi bi-ban" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0" />
                                                                    </svg>
                                                                </a>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="25" height="25"
                                                                        style="color: green;" fill="currentColor"
                                                                        class="bi bi-activity ml-6"
                                                                        viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd"
                                                                            d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2" />
                                                                    </svg>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-page">
                            <div class="body-text">ALALI & Nibras</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('admin/js/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>

</body>

</html>
