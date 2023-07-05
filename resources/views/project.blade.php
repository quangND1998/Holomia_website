@extends('landingpage.layout')
@section('title', $project->name)
@section('image', asset($project->image))
@section('content')
<div id="video_page">
        <div class="text-block">
            <div class="text-container">
                <h1 class="title text-white">{{$project ? $project->name: ''}}</h1>

            </div>
        </div>
       <img src="{{$project ? $project->image: ''}}" alt="">
    </div>

    <!-- section3 -->
    <div class="section3">
        <div class="container">
            <div class="row text_center">
                <h1 class="title " id="title-overview">{{$project ? $project->name: ''}} </h1>

            </div>
            @if($items)
            <div class="row" id="results">
                @foreach ($items as $item )
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 item-link">
                        {{--  data-aos="fade-down" --}}
                        <div class="overview">
                            <a href="{{$item->link}}">
                                <div class="image_overview">
                                    <img src="{{$item->thumb}}" class=" img_fluid imgage_holo360 " alt="">
                                </div>
                                
                                <div class="d-flex content_holo360">
                                   
                                    <h4 class="text-black title_holo360">{{$item->name}} </h4>
                                    <p class="count_eye"><i class="far fa-eye mr-2"></i>234k</p>
                                </div>
                               
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="d-flex Page navigation example">
                {!! $items->links() !!}
            </div>
               @endif
        </div>
    </div>

    <script>

        </script>
@endsection
<style>
    .text_center{
        justify-content: center;
    }
    .overview{
        overflow: hidden;
    }
    .image_overview{
        position: relative;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
    }
    .overview img{
        position: relative;
        width: 100%;
            transition: 0.5s;
            height: 200px;
            object-fit: cover;
    }
    .overview img:hover {
            transform: scale(1.1);
        }
</style>
@section('javascript')
