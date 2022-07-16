<!doctype html>
<html lang="en">
  <head>
    <title>Holomia</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
     <base href="{{ asset('') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reponsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,400;1,900&family=Montserrat:wght@200&family=Poppins:ital,wght@0,400;0,600;1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,400;1,900&family=Montserrat:wght@200&family=Oxanium&family=Poppins:ital,wght@0,400;0,600;1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Metrophobic&family=Oxanium:wght@200&family=Podkova&family=Poppins&display=swap" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Metrophobic&family=Open+Sans:ital,wght@1,300&family=Oxanium:wght@200&family=Podkova&family=Poppins&family=Roboto:wght@100&display=swap" rel="stylesheet"> -->
    
    <!-- Bootstrap CSS -->
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"
  />
      <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
    <style>
        .bg-dark{
            background-color: #06152D !important;
            
        }
        .nav-link {
            color:#fff !important;
        }
    </style>
  <body>
    <header>
        <div id="header">
            <div class="container">
                <div class="nav_header">
                    <div class="menu-pc">
                        <div id="nav_sticky" class="menu-content overlay">
                            <div class="logo-menu-pc">
                                <a href="/index"><img src="assets/img/logoxanhh.png" class="logo-holo logo-pc img-fluid" alt=""></a>
                            </div>
                            <nav class="menu-demo">
                                <ul class="list-menu">
                                      @foreach ($pages as $page)
                                       @if ($page->title =="home")
                                    <li class="menu__item">
                                       
                                        <a href="/index" class="menu__link  {{ Request::segment(1) === 'index' ? 'active' : '' }}">{{__($page->title)}}</a>
                                    </li>
                                    @elseif($page->title =="project")
                                        <li class="menu__item to-left dropdown">
            
                                            <a href=""  class="menu__link ">{{__($page->title)}} </a>
                                            <div class="dropdown-content">
                                                <a href="https://missionxvr.com/index" class="drop_link" target="_blank">Mission X</a>
                                                
                                            </div>
                                        </li>
                                    @else
                                      <li class="menu__item to-left">
        
                                        <a href="/{{$page->title}}"  class="menu__link {{ Request::segment(1) === $page->title ? 'active' : '' }} ">{{__($page->title)}}</a>
        
                                    </li>
                                  
                                    @endif
                                  
                                    
                                     @endforeach
                                         <li class="language">
                                        <a href="/language/en" class="menu__link menu_news"><img src="/img/en.png" class="img-fluid" alt=""></a>
                                        <a href="/language/vn" class="menu__link menu_news"><img src="/img/vn.png" class="img-fluid" alt=""></a>
                                    </li>
                                </ul>
                                
                                
                            </nav>
                        </div>
                    </div>
                
                    <div class="menu-mobile mean-container">
                        
                        <div class="mean-bar">
                            <div class=" logo-mobile">
                                <div class="logo-menu">
                                    <a href="index.html"><img src="assets/img/logoxanhh.png" class="logo-holo img-fluid" alt=""></a>
                                </div>
                                <!-- <div class="open-menu">
                                    <i class="fas fa-bars"></i>
                                </div> -->
                                <div class="logo-close"  aria-expanded="false" data-toggle="collapse" data-target="#menusilde">
                                    <span  class="meanmenu-reveal meanclose" >X</span>
                                    <i class="fas fa-bars open-menu"></i>
                                </div>
                                
                            </div>
                            <nav class="mean-nav collapse"  id="menusilde"><nav class="mean-nav">
                                <ul>
                                    @foreach ($pages as $page)
                                    @if ($page->title =="home")
                                    <li>
                                        <a href="/{{__($page->title)}}">{{__($page->title)}}</a>
                                    </li>
                                    @elseif($page->title =="project")
                                    <li class="dropdown-mobile">
                                        <!-- <a target="_blank" href="https://missionxvr.com/index">Project</a> -->
                                        <a class="">Project </a>
                                        <div class="dropdown-content-mobile">
                                            <a href="https://missionxvr.com/index" class="drop_link" target="_blank">Mission X</a>
                                            
                                        </div>
                                    </li>
                                    @else
                                    <li>
                                        <a href="/{{__($page->title)}}">{{__($page->title)}}</a>
                                    </li>
                                 
                                    @endif
                                    @endforeach
                                    <li class="language">
                                        <a href="/language/en" class="link-language"><img src="img/en.png" class="img-fluid" alt=""></a>
                                        <a href="/language/vn" class="link-language"><img src="img/vn.png" class="img-fluid" alt=""></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>

    </header>

    @yield('content')
    @include('landingpage.footer')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="/js/main.js"></script>
   
</body>
</html>