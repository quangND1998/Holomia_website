@extends('landingpage.layout')
@section('content')

    {{-- <div class="banner">
        <div class="your-class">
            @foreach ($categories as $category)
            <div class="item_slide">
                <img src="{{$category->image}}" class="image_slide" alt="">
                <div class="text_slide">
                    <div class="center_text">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="title_slide">{{$category->name}}</h1>
                                    <a href="/holo360" class="watch_video">Xem dự án </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
          </div>
        
    </div> --}}

    <div class="text-dark pt-5">

        <div class="container mt-5 ">
            <h1 class="text-dark text-center title_list">{{__('project_holo360')}}</h1>
            <div class="content_list">
                {{__('description_holo360')}}
            </div>
            <div class="row mt-5 pt-5">
                <div class="tab ">
                    <a  href="/holo360" class="tablinks {{ Request::get('category') ==null ? 'active' : '' }}" >All</a>
                    @foreach ($categories as $category)
                    {{-- <button class="tablinks" onclick="openCity(event, '{{$category->slug}}')">{{$category->name}}</button> --}}
                        <a href="/holo360?category={{$category->slug}}" class="tablinks {{ Request::get('category') === $category->slug ? 'active' : '' }} ">{{$category->name}}</a>
                    @endforeach


                </div>
                <hr class="line">
                <div id="page_all" class="tabcontent active w-100">
                    <div class="page_item my-5 " >
                        <div class="row">
                            @foreach ($projects as $project )
                            <div class="col-xs-12 col-sm-6  col-md-6 col-lg-4 my-2">
                                <div class="item-slide">
                                    @if ($project->type=='Link')
                                    <div class="product text-center">
                                      
                                        <a href="{{$project->link}}"
                                            target="_blank">
                                            <div class="img_product">
                                                <img src="{{$project->image}}" alt="">
                                            </div>
                                            <h5 class="text-dark pt-2 title_product">{{$project->title}}</h5>
                                        </a>
                                     
                                    </div>
                                    @else
                                    <iframe width="560" height="315" src="{{$project->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                          
                        </div>
                        {{-- <div class=""> --}}
                            {{ $projects->links() }}
                        {{-- </div>  --}}
                    </div>
                </div>

                @foreach ($categories as $category)
                <div id="{{$category->slug}}" class="tabcontent w-100">
                    <div class="page_item my-5">
                        <div class="text_content">
                            <p>{!! $category->content !!}</p>
                        </div>
                        <div class="row" >
                            @foreach ($category->holo_projects as $holo_project )
                            <div class="col-xs-12 col-sm-6  col-md-6 col-lg-4 my-2">
                                <div class="item-slide">
                                    <div class="product text-center">
                                        @if ($holo_project->type=='Link')
                                        <a href="{{$holo_project->link}}"
                                            target="_blank">
                                            <div class="img_product">
                                                <img src="{{$holo_project->image}}" alt="">
                                            </div>
                                            <h5 class="text-dark pt-2 title_product">{{$holo_project->title}}</h5>
                                        </a>
                                        @else
                                        @endif
                                      
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
           
        </div>
    </div>

    <style>
        .product iframe{
            /* width: 100% !important;
            overflow: auto !important; */
        }
        .pagination{
            justify-content: center;
            margin-top:1rem;
        }
        .tablinks{
            color:black !important;
        }
        .page_item .row{
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
            justify-content: center;
        }
        .content_list{
            width: 50%;
            margin: auto;
            text-align: center;
        }
        .nav-link {
            color: black !important;
        }

        .banner_holo360 {
            height: 70vh;
        }
        .img_banner {
            height: 100%;
        }
        .img_banner img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
        .item-slide {
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            padding: 0.7rem;
            border-radius: 8px;
            height: 285px;
        }
        .product {
            overflow: hidden;
        }
        .product h5{
            font-size: 18px;
        }
        .title_product:hover{
            color:#e39a0e !important;
        }
        .img_product {
            position: relative;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }
        .product img {
            position: relative;
        }
        .item-slide img {
            width: 100%;
            transition: 0.5s;
            height: 200px;
            object-fit: cover;
        }
        .item-slide img:hover {
            transform: scale(1.1);
        }
        .text_content {
            width: 60%;
            text-align: center;
            margin: auto;
        }

        .tab {
            width: 100%;
            text-align: end;
            margin-bottom: 1.5rem;
        }

        .tab button:hover {
        }
        .tab button.active {
            color: rgb(214, 153, 20);
            border: none;
        }

        .tablinks {
            font-size: 18px;
            border: 0;
            background: #fff;
            border-radius: 5px;
            margin: 0rem 0.6rem;

        }

        .tablinks.active {
            color: rgb(214, 153, 20) !important;
            border: 0 !important;

        }

        .active {
            color: rgb(214, 153, 20);
        }

        button:focus {
            outline: 0;
            outline: 0;
        }

        .tabcontent {
            display: none;
            padding: 6px 12px;
            border-top: none;
        }

        .tabcontent.active {
            display: block;
        }

        .title_item:hover {
            color: rgb(223, 128, 19);
        }

        hr.line {
            border-top: 1px solid rgba(153, 150, 150, 0.236);
            width: 100%;
            margin-top: 1.5rem;
            text-align: end;
        }
        /* banner */
        .your-class{
            height: 65vh;
        }
        .item_slide{
            position: relative;
        }
        .your-class .slick-track{
            height: 100%;
        }
        .your-class img{
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
        .text_slide{
            position: absolute;
            top:30%;
            left:15%;
        }
        .text_slide h1 {
            margin: 15px 0;
            text-transform: uppercase;
            /* font-family: 'SFU_H'; */
            font-size: 64px;
        }

        .watch_video {
            background: #F01716;
            color: white;
            padding: 12px 47px;
            text-transform: uppercase;
            border-radius: 4px;
            margin-top: 30px;
            font-size: 15px;
        }
        .title_list{
            text-transform: uppercase;
            margin-bottom:1rem;
        }

        .text_content p {
            color: black;
        }


        @media only screen and (max-width: 640px) {
            .item-slide{
                margin:0rem 0.6rem;
            }
            .text_content {
                width: 90%;
            }
            .tabcontent{
                padding:0;
            }
            .col-lg-4, .col-md-4, .col-sm-6{
                padding:0;
            }
            .text_slide{
                top:40%;
                left:5%;
            }
            .text_slide h1 {
                font-size: 46px;
            }
        }

        @media only screen and (max-width: 480px) {
            .text_content {
                width: 100%;
            }
            .text_slide{
                top:40%;
                left:5%;
            }
            .text_slide h1 {
                font-size: 46px;
            }
        }

        @media only screen and (max-width: 320px) {
            .text_content {
                width: 100%;
            }
            .text_slide{
                top:40%;
                left:5%;
            }
            .text_slide h1 {
                font-size: 46px;
            }
            .tabcontent {
                padding: 0;
            }
            .col-md-4 {
                padding-right: 0;
                padding-left: 0;
            }
        }
        @media only screen and (min-width: 1200px){
            .text_content{
                width: 60% ;
            }
        }
        @media only screen and (min-width: 768px) {
            .text_content {
                width: 70%;
            }
        }
        .slick-prev, .slick-next{
            display: block !important;
        }
        .slick-arrow {
	z-index: 1;
	width: 40px;
	height: 40px;
    position: absolute;
    top:50%;
    font-size: 30px;
        }
        .fa-chevron-circle-left{
            left:2%;
        }
        .fa-chevron-circle-right{
            right:2%;
        }
    </style>
    <script>

        $(document).ready(function(){
            $('.your-class').slick({
                slidesToShow: 1,
               slidesToScroll: 1,
               autoplay:true,
               arrows: true,
               prevArrow: '<i class="fas fa-chevron-circle-left" style="color: #bdc3cb"></i>',
               nextArrow: '<i class="fas fa-chevron-circle-right" style="color: #bdc3cb"></i>'
            });
            });

        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }



        //  $('a[data-slide]').click(function(e) {
        //    e.preventDefault();
        //    var slideno = $(this).data('slide');
        //    $('.slider-nav').slick('slickGoTo', slideno - 1);
        //  });
    </script>
@endsection
