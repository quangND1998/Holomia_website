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
        <div class="">
            <div class="row text_center">
                <h1 class="title " id="title-overview">{{$project ? $project->name: ''}} </h1>

            </div>
            @if($items)
            <div class="row" id="results">
                @foreach ($items as $item )
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 item-link">
                        <div class="overview">
                            <a href="{{ $item->link }}" class="item_preview imgage_holo360"  id="{{ $item->id }}" target="_blank">
                                <div class="image_overview">
                                    <img src="{{$item->thumb}}" class=" img_fluid imgage_holo360 " alt="">
                                </div>
                                
                                <div class="d-flex content_holo360">
                                    <h4 class="text-title title_holo360">{{$item->name}} </h4>
                                    <p class="count_eye"><i class="far fa-eye mr-2"></i><span class="text_view">{{ $item->view }}</span></p>
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
        @media   (min-width: 1600px){
            .section3{
                padding: 3rem 17rem !important;
                
            }
        }
        @media   (min-width: 1300px && max-width:1599px){
            .section3{
                padding: 2rem 10rem !important;
            }
        }
       

           
</style>
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".item_preview").click(function(){
            console.log($(this).attr('id'));
            var id = $(this).attr('id');
            $.ajaxSetup({
                 headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        }
                    });
            $.ajax({
                url: "item/save/" + id,
                type: 'post',
                data: {
                    "id": id,
                },
                error: function(err) {
                    console.log(err);
                },
                success: function(data) {
                    console.log(data);
                    $(`#${id} .text_view`).text(data);
                }
            });
        });
    });
</script>

@section('javascript')
