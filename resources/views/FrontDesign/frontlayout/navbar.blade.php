<!DOCTYPE html>
<html class="no-js" lang="zxx">

<!-- Mirrored from demo.graygrids.com/themes/shopgrids/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Dec 2022 23:35:56 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <title>ShopGrids - Bootstrap 5 eCommerce HTML Template.</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/images/favicon.svg') }}" />

    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/LineIcons.3.0.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/main.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>


    <header class="header navbar-area">

        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-left">
                            <ul class="menu-top-link">


                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle">
                            <ul class="useful-links">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a href="{{route('about_us')}}">About Us</a></li>
                                <li><a href="{{route('contact_us')}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end">
                            <div class="user">
                                <i class="lni lni-user"></i>
                                @if (Auth::guard()->check())
                                Hello   {{Auth::guard()->user()->name}}

                                @endif
                            </div>
                            <ul class="user-login">
                                <li>
                                    <a href="{{route('login')}}">Sign In</a>
                                </li>
                                <li>
                                    @if (Auth::guard()->check())
                                    <a href="{{route('logout.cheak')}}">logout</a>
                                    @else
                                    <a href="{{route('create')}}">register</a>

                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">

                        <a class="navbar-brand" href="{{route('home')}}">
                            <img src="{{ url('assets/images/logo/logo.svg') }}" alt="Logo">
                        </a>

                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">

                        <div class="main-menu-search">

                            <div class="navbar-search search-style-5">
                                <div class="search-select">
                                    <div class="select-position">

                                        <select id="select1">
                                            <option selected>All</option>
                                            <option value="1">option 01</option>
                                            <option value="2">option 02</option>
                                            <option value="3">option 03</option>
                                            <option value="4">option 04</option>
                                            <option value="5">option 05</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="search-input">
                                    <input type="text" placeholder="Search">
                                </div>
                                <div class="search-btn">
                                    <button><i class="lni lni-search-alt"></i></button>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                <i class="lni lni-phone"></i>
                                <h3>Hotline:
                                    <span>(+100) 123 456 7890</span>
                                </h3>
                            </div>
                            <div class="navbar-cart">
                                <div class="wishlist">
                                    <a href="{{route('wishlist.show')}}">
                                        <i class="lni lni-heart"></i>
                                        <span class="total-items">
                                            @if (Auth::guard()->check())
                                            @isset($user)

                                            {{$user->products_wishlists->count()}}
                                            @endisset
                                            @endif
                                        </span>
                                    </a>
                                </div>
                                <div class="cart-items">
                                    <a href="" class="main-btn">
                                        <i  class="lni lni-cart"></i>
                                        {{-- <span class="total-items">{{$count}}</span> --}}
                                    </a>

                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header">

                                            <a href="{{route('showcart')}}">View Cart</a>
                                        </div>




                                        </ul>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="nav-inner">

                        <div class="mega-category-menu">
                            <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>

                            <ul class="sub-category">
                                @isset($catogry)
                                @foreach ($catogry as $catogries )

                                <li><a href="{{route('shopgride')}}">{{ $catogries->name}} <i class="lni lni-chevron-right"></i></a>
                                    <ul class="inner-sub-category">
                                        @foreach ($catogries->subcategories as $names )

                                        <li><a  href="{{route('shopgride')}}">{{ $names->name}}</a></li>
                                        @endforeach

                                    </ul>
                                </li>
                                @endforeach
                                @endisset

                                {{-- <li><a href="product-grids.html">accessories</a></li>
                                <li><a href="product-grids.html">Televisions</a></li>
                                <li><a href="product-grids.html">best selling</a></li>
                                <li><a href="product-grids.html">top 100 offer</a></li>
                                <li><a href="product-grids.html">sunglass</a></li>
                                <li><a href="product-grids.html">watch</a></li>
                                <li><a href="product-grids.html">man’s product</a></li>
                                <li><a href="product-grids.html">Home Audio & Theater</a></li>
                                <li><a href="product-grids.html">Computers & Tablets </a></li>
                                <li><a href="product-grids.html">Video Games </a></li>
                                <li><a href="product-grids.html">Home Appliances </a></li> --}}
                            </ul>
                        </div>


                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="{{route('home')}}" class="active" aria-label="Toggle navigation">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-2"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">Pages</a>
                                        <ul class="sub-menu collapse" id="submenu-1-2">
                                            <li class="nav-item"><a href="{{route('about_us')}}">About Us</a></li>
                                            {{-- <li class="nav-item"><a href="faq.html">Faq</a></li> --}}
                                            <li class="nav-item"><a href="{{route('login')}}">Login</a></li>
                                            <li class="nav-item"><a href="{{route('create')}}">Register</a></li>
                                            {{-- <li class="nav-item"><a href="mail-success.html">Mail Success</a></li>
                                            <li class="nav-item"><a href="404.html">404 Error</a></li> --}}
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-3"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">Shop</a>
                                        <ul class="sub-menu collapse" id="submenu-1-3">
                                            {{-- <li class="nav-item"><a href="product-grids.html">Shop Grid</a></li>
                                            <li class="nav-item"><a href="product-list.html">Shop List</a></li>
                                            <li class="nav-item"><a href="product-details.html">shop Single</a></li> --}}
                                            <li class="nav-item"><a href="{{route('showcart')}}">Cart</a></li>
                                            <li class="nav-item"><a href="{{route('wishlist.show')}}">Wshlist</a></li>
                                        </ul>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-4"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">Blog</a>
                                        <ul class="sub-menu collapse" id="submenu-1-4">
                                            <li class="nav-item"><a href="blog-grid-sidebar.html">Blog Grid
                                                    Sidebar</a>
                                            </li>
                                            <li class="nav-item"><a href="blog-single.html">Blog Single</a></li>
                                            <li class="nav-item"><a href="blog-single-sidebar.html">Blog Single
                                                    Sibebar</a></li>
                                        </ul>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a href="{{route('contact_us')}}" aria-label="Toggle navigation">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="nav-social">
                        <h5 class="title">Follow Us:</h5>
                        <ul>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </header>
