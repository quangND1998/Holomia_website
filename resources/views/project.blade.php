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
                    <div class="col-4 item-link">
                        <div class="overview" data-aos="fade-down">
                            <a href="{{$item->link}}">
                                <img src="{{$item->thumb}}" class=" img_fluid" alt="">
                                <p class="count_eye"><i class="far fa-eye mr-2"></i>234k</p>
                                <h4 class="text-black title_holo360">{{$item->name}} </h4>
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
</style>
@section('javascript')
