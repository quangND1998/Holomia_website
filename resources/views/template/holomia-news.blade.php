<div class=" row holo-event" style="padding:0">
    <div class="container">
        <div class="row">
            <div class="title-event-join ">
                <h1 style="color:black" class="title">{{__($section->title)}}</h1>
            </div>

            <div class=" d-flex">
                <div class="row content-event-join">
                    @foreach ($news as $key => $new )

                    <div class="item-event-join {{$key >2 ? 'collapse': ''}}"  id="{{$key >2 ? 'hidden': ''}}">
                        <div class="item-img">
                            <img src="{{$new->image}}" class="img-fluid img-event" alt="">
                        </div>

                        <div class="content-item">
                            <span class="d-block time-event">{{
                                \Carbon\Carbon::parse($new->created_at)->isoFormat('MMMM, D,YYYY').' '.'-'.'
                                '.\Carbon\Carbon::parse($new->created_at)->diffForHumans()}}</span>
                            <a href="{{route('new.detail',__($new->slug))}}" 
                                class="title-event"><span
                                    class="d-block text-font ">{{__($new->title)}}</span></a>

                        </div>
                        <hr>
                        <div class="icon-event d-flex">
                            <div class="w-50">
                                <a href="{{route('new.detail',__($new->slug))}}"><i
                                        class="fas fa-eye pr-2"></i>4</a>
                                <a href="{{route('new.detail',__($new->slug))}}" class="pl-4"><i
                                        class="fas fa-comment-alt pr-2"></i>0</a>
                            </div>
                            <div class="w-50 icon-heart-event">
                                <a href="{{route('new.detail',__($new->slug))}}">8<i
                                        class="fas fa-heart pl-2"></i></a>
                            </div>
                        </div>
                    </div>


                    @endforeach

                </div>

            </div>
            <div class="event-readmore">
                <a href="#hidden" aria-expanded="false" data-toggle="collapse"
                    class="btn-event-readmore btn-readmore"> Read More</a>
            </div>

        </div>
        <!-- <div class="row">
                
            </div> -->
    </div>
</div>