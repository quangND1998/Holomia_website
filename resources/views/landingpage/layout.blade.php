<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <base href="{{ asset('') }}">
    <link rel="icon" href="/img/favicon.png">
    <title>
        @if (View::hasSection('title'))
            @yield('title')
        @else
            Holomia
        @endif
    </title>
    <meta property="og:image" content="@if (View::hasSection('image')) @yield('image') @else img/thumb1.jpg @endif" />
    {{-- <meta property="og:image" content="@if (View::hasSection('image')) @yield('image') @else img/thumb1.jpg @endif"  /> --}}
    <meta name="copyright" content="Holomia">
    <meta name="generator" content="holomia.com">
    <meta name="author" content="holomia.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reponsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta property="og:image" content="img/thumb1.jpg">

    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,400;1,900&family=Montserrat:wght@200&family=Poppins:ital,wght@0,400;0,600;1,300&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,400;1,900&family=Montserrat:wght@200&family=Oxanium&family=Poppins:ital,wght@0,400;0,600;1,300&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Metrophobic&family=Oxanium:wght@200&family=Podkova&family=Poppins&display=swap"
        rel="stylesheet">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css">
</head>
<style>
    .bg-dark {
        background-color: #06152D !important;

    }

    .nav-link {
        color: #fff !important;
    }
</style>

<body>
    <header>
        <div id="">
            <div class="">
                <div class="nav_header">
                    <div class="menu-pc">
                        <div class="top_header bg-[#0F197A] h-[48px] text-white my-2 flex flex-wrap justify-end ">
                            <div class="flex  mx-4 w-[200px]">
                                <i class="uil uil-clock text-white mx-2 text-[14px]"></i>
                                <p> 08:00 - 21:00 </p>
                            </div>
                            <div class="border-r-2 border-[#D0D5DD]"></div>
                            <div class="flex  mx-4 w-[200px] ">
                                <i class="uil uil-envelope-alt text-white mx-2 text-[14px]"></i>
                                <a href=""> Email </a>
                            </div>
                            <div class="border-r-2 border-[#D0D5DD]"></div>
                            <div class="flex mx-4 w-[200px] ">
                                <i class="uil uil-phone-alt text-white mx-2 text-[14px]"></i>
                                <p> 0336 555 876  /  0359 719 595 </p>
                            </div>
                            <div class="border-r-2 border-[#D0D5DD]"></div>
                            <div class="flex mx-4 w-[200px]">
                                <img class="w-6 h-6 mx-2" src="images/uk.png" alt="">
                                <img class="w-6 h-6 mx-2" src="images/vietnam.png" alt="">
                            </div>
                        </div>
                        <div id="nav_sticky" class="menu-content overlay">
                            <div class="logo-menu-pc">
                                <a href="/index"><img src="images/logo.png" class="logo-holo logo-pc img-fluid"
                                        alt=""></a>
                            </div>
                            <nav class="menu-demo">
                                <ul class="list-menu">
                                    @foreach ($pages as $page)
                                        @if ($page->title == 'home')
                                            <li class="menu__item">

                                                <a href="/index"
                                                    class="menu__link  {{ Request::segment(1) === 'index' ? 'active' : '' }}">{{ __($page->title) }}</a>
                                            </li>
                                        @elseif($page->title == 'project')
                                            <li class="menu__item to-left dropdown">

                                                <a href="" class="menu__link  ">{{ __($page->title) }} </a>
                                                <div class="dropdown-content">

                                                    <a href="https://missionxvr.com/" target="_blank"
                                                        class="drop_link">VR Laser Tag Mission X </a>
                                                    <a href="https://zone.holomia.com" target="_blank"
                                                        class="drop_link">Holomia VR Zone</a>
                                                    <a href="https://xr.holomia.com" target="_blank"
                                                        class="drop_link">Holomia XR</a>
                                                </div>

                                            </li>
                                        @elseif($page->title == 'holo360')
                                            <li class="menu__item to-left dropdown">

                                                <a href="/holo360"
                                                    class="menu__link {{ Request::segment(1) === 'holo360' ? 'active' : '' }}">{{ __($page->title) }}
                                                </a>
                                                <div class="dropdown-content">
                                                    @foreach (App\Models\CategoryHolo360::get() as $category)
                                                        <a href="/holo360?category={{ $category->slug }}"
                                                            class="drop_link link_holo360"
                                                            target="_self">{{ $category->name }}</a>
                                                    @endforeach
                                                </div>

                                            </li>
                                        @else
                                            <li class="menu__item to-left">

                                                <a href="/{{ $page->title }}"
                                                    class="menu__link {{ Request::segment(1) === $page->title ? 'active' : '' }} ">{{ __($page->title) }}</a>

                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <ul class="list-language">
                                    <li class="menu__item to-left menu-language">
                                        <a href="/language/en" class="menu__link menu_news "><img src="/img/en.png"
                                                class="img-fluid logo_language" alt=""> </a>
                                    </li>
                                    <li class="menu__item to-left menu-language">
                                        <a href="/language/vn" class="menu__link menu_news "><img src="/img/vn.png"
                                                class="img-fluid logo_language" alt=""> </a>
                                    </li>

                                </ul>


                            </nav>
                        </div>
                    </div>

                    <div class="menu-mobile mean-container">

                        <div class="mean-bar">
                            <div class=" logo-mobile">
                                <div class="logo-menu">
                                    <a href="index.html"><img src="img/logoxanhh.png" class="logo-holo img-fluid"
                                            alt=""></a>
                                </div>
                                <!-- <div class="open-menu">
                                    <i class="fas fa-bars"></i>
                                </div> -->
                                <div class="logo-close" aria-expanded="false" data-toggle="collapse"
                                    data-target="#menusilde">
                                    <span class="meanmenu-reveal meanclose">X</span>
                                    <i class="fas fa-bars open-menu"></i>
                                </div>

                            </div>
                            <nav class="mean-nav collapse" id="menusilde">
                                <nav class="mean-nav">
                                    <ul>
                                        @foreach ($pages as $page)
                                            @if ($page->title == 'home')
                                                <li>
                                                    <a href="/index">{{ __($page->title) }}</a>
                                                </li>
                                            @elseif($page->title == 'project')
                                                <li class="dropdown-mobile">
                                                    <!-- <a target="_blank" href="https://missionxvr.com/index">Project</a> -->
                                                    <a class="">Products </a>
                                                    <div class="dropdown-content-mobile">
                                                        {{-- <a href="/holo360" class="drop_link" target="_self">Holo
                                                            360</a> --}}
                                                        {{-- <a href="/projects"
                                                            class="drop_link">{{ __('missionxvr') }}</a> --}}
                                                        <a href="https://missionxvr.com/" target="_blank"
                                                            class="drop_link">VR Laser Tag Mission X </a>
                                                        <a href="https://zone.holomia.com" target="_blank"
                                                            class="drop_link">Holomia VR Zone</a>
                                                        <a href="https://xr.holomia.com" target="_blank"
                                                            class="drop_link">Holomia XR</a>
                                                    </div>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="/{{ $page->title }}">{{ __($page->title) }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                        <li class="language">
                                            <a href="/language/en" class="link-language"><img src="img/en.png"
                                                    class="img-fluid" alt=""></a>
                                            <a href="/language/vn" class="link-language"><img src="img/vn.png"
                                                    class="img-fluid" alt=""></a>
                                        </li>
                                    </ul>
                                </nav>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </header>

    {{-- @yield('content') --}}
    @include('landingpage.footer')

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    {{--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>  --}}
    <script src="/js/bootstrap-notify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    {{-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <style>
        .menuHolo_sub {
            position: absolute;
            right: -110px;
            top: 0;
            display: none;
            min-width: 160px;
            background: #001C54
        }

        .link_holo360:hover+.menuHolo_sub {
            display: block;
        }

        .menuHolo_sub:hover+.link_holo360 {
            display: block;
        }

        .menuHolo_sub:hover {
            display: block;
        }

        .sub_linkHolo {
            font-size: 14px !important;
            cursor: pointer;

        }

        .sub_linkHolo:hover {
            color: rgb(214, 153, 20);
        }


        .active {
            color: rgb(214, 153, 20);
        }
    </style>
</body>

</html>
