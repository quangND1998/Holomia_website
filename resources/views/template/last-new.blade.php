<div class="lastest-news">
    <!-- <hr class="line1 " > -->
    <div class="container">

        <h1 data-aos="fade-right" class="title  ">{{__($section->title)}}</h1>
        <div class="col-12">
            <div class="view-all-blog">
                <div class=" link-view-blog">
                    <a class="page/immersive.html" href="/immersive">{{__('view_all_blog')}}</a>
                </div>
            </div>

        </div>
        <div class="row col-12  list-news">
            @foreach ($last_new as $new )
            <div class="item-news" data-aos="zoom-in">
                <img src="{{$new->image}}" class="img-fluid img-news" alt="">
                <div class="content-news">
                    <span class="time">{{ \Carbon\Carbon::parse($new->created_at)->format('d/m/Y')}}</span>
                    <div class="title-news">
                         <a href="{{route('new.detail',__($new->slug))}}" target="_blank">
                                <h5 class="title-lastest-news text-font">{{__($new->title)}}</h5>
                            </a>
                        <span>{!!Str::words(strip_tags(__($new->content)), 10, '...')!!}</span>
                    </div>
                     <div class="read-more-laster">
                    <a class="link-read-more" hhref="{{route('new.detail',__($new->slug))}}" target="_blank">{{__('read_more')}}</a>
                </div>

                </div>
               
            </div>
            @endforeach

        </div>




    </div>
</div>
</div>