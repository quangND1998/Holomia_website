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
                            <a href="{{ $item->link }}" class="item_preview" id="{{ $item->id }}" target="_blank">
                                <img src="{{$item->thumb}}" class=" img_fluid" alt="">
                                <div class="d-flex content_holo360">
                                    <h4 class="text-black title_holo360">{{$item->name}} </h4>
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
