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
    <link rel="stylesheet" href="css/stylesheet.css">
    {{-- <link rel="stylesheet" href="css/reponsive.css"> --}}
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header>
        <div class="nav_header border-b-[1px] border-[#D0D5DD] ">
            <div class="menu-pc">
                <div
                    class="top_header bg-[#0F197A] h-[48px] text-white py-2 flex flex-wrap justify-end text-center content-center">
                    <div class="flex mx-4">
                        <i class="uil uil-clock text-white mx-2 text-[14px]"></i>
                        <p>08:00 - 21:00</p>
                    </div>
                    <div class="border-r-2 border-[#D0D5DD]"></div>
                    <div class="flex mx-4">
                        <i class="uil uil-envelope-alt text-white mx-2 text-[14px]"></i>
                        <a href=""> Email </a>
                    </div>
                    <div class="border-r-2 border-[#D0D5DD]"></div>
                    <div class="flex mx-4">
                        <i class="uil uil-phone-alt text-white mx-2 text-[14px]"></i>
                        <p>0336 555 876 / 0359 719 595</p>
                    </div>
                    <div class="border-r-2 border-[#D0D5DD]"></div>
                    <ul class="list-language flex mx-4">
                        <li class="menu__item to-left menu-language">
                            <a href="/language/en" class="menu__link menu_news"><img src="images/uk.png"
                                    class="img-fluid logo_language w-6 h-6 mx-2" alt="" />
                            </a>
                        </li>
                        <li class="menu__item to-left menu-language">
                            <a href="/language/vn" class="menu__link menu_news"><img src="images/vn.png"
                                    class="img-fluid logo_language w-6 h-6 mx-2" alt="" />
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="nav_sticky"
                    class="menu-content  overlay flex content-center text-center justify-between w-[90%] mx-auto">
                    <div class="logo-menu-pc">
                        <a href="/index"><img src="images/logo.png"
                                class="logo-holo logo-pc img-fluid w-[240px] xs:w-[120px]" alt="" /></a>
                    </div>
                    <nav class="bg-white border-gray-200 flex content-center text-center">
                        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                            <button data-collapse-toggle="navbar-dropdown" type="button"
                                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                aria-controls="navbar-dropdown" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 17 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                                </svg>
                            </button>
                            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                                <ul
                                    class="flex font-roboto flex-col font-semibold p-4 md:p-0 mt-4 text-[#21272A] border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                                    <li>
                                        <a href="#"
                                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0"
                                            aria-current="page">{{ __('Home') }}</a>
                                    </li>
                                    <li>
                                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                                            class="flex items-center justify-between font-semibold py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">
                                            {{ __('introduce') }}
                                            <svg class="w-2.5 h-2.5 ms-2.5 mx-2" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                            </svg>
                                        </button>
                                        <!-- Dropdown menu -->
                                        <div id="dropdownNavbar"
                                            class="z-10 hidden font-bold bg-[#D9DFE8] divide-y divide-gray-100 rounded-lg shadow w-54 justify-start text-left">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                                aria-labelledby="dropdownLargeButton">
                                                <li>
                                                    <a href="about_cammbridge"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-60">{{ __('about') }}
                                                        {{ __('Cambridge IEC') }}</a>
                                                </li>
                                                <li>
                                                    <a href="teacher_cammbridge"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">{{ __('teacher') }}
                                                        {{ __('Cambridge IEC') }}</a>
                                                </li>
                                                <li>
                                                    <a href="student"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">{{ __('excellent_student') }}</a>
                                                </li>
                                                <li>
                                                    <a href="activity"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">{{ __('experiential_activities') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <button id="dropdownNavbarLink2" data-dropdown-toggle="dropdownNavbar2"
                                            class="flex items-center justify-between font-semibold py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">
                                            {{ __('course') }}
                                            <svg class="w-2.5 h-2.5 ms-2.5 mx-2" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                            </svg>
                                        </button>
                                        <!-- Dropdown menu -->
                                        <div id="dropdownNavbar2"
                                            class="z-10 hidden font-bold bg-[#D9DFE8] divide-y divide-gray-100 rounded-lg shadow w-54 justify-start text-left">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                                aria-labelledby="dropdownLargeButton">
                                                <li>
                                                    <a href="course"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-60">{{ __('about') }}
                                                        {{ __('Cambridge IEC') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="news"
                                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white">{{ __('News') }}</a>
                                    </li>
                                    <li>
                                        <a href="contact"
                                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">{{ __('Contact') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="search content-center">
                        <form class="max-w-md mx-auto">
                            <div class="relative flex">
                                <div
                                    class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none ml-4">
                                    <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="search" id="default-search"
                                    class="pl-10 block w-[260px] p-3  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 "
                                    placeholder="Tra cứu thông tin khóa học" required />
                                <button type="submit"
                                    class="text-white ml-4 end-2.5 bottom-2.5 bg-[#AD0101] font-medium rounded-lg text-sm px-8 py-2 ">{{ __('search') }}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')
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
    <script type="text/javascript" src="/js/edit_slick.js"></script>
</body>

</html>
