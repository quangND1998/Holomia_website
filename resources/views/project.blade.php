@extends('landingpage.layout')
@section('content')
<div id="video_page">
        <div class="text-block">
            <div class="text-container">
                <h1 class="title text-white">Real 360 {{$project->name}}</h1>
     
            </div>
        </div>
       <img src="{{$project->image}}" alt="">
    </div>

    <!-- section3 -->
    <div class="section3">
        <div class="container">
            <div class="row text_center">
                <h1 class="title " id="title-overview">{{$project->name}} </h1>
                
            </div>
            <div class="row">
                @foreach ($project->items as $item )
                    <div class="col-6">
                    <div class="overview" data-aos="fade-down">
                        <a href="{{$item->link}}">
                            <img src="{{$item->thumb}}" class=" img_fluid" alt="">
                            <h4 class="text-black">{{$item->name}}
                    
                            </h4>
                        </a>
                    </div>
                </div>
                @endforeach
                
             
            </div>
        </div>
    </div>


@endsection
@section('javascript')