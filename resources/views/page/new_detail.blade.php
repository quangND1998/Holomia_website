@extends('landingpage.layout')
@section('content')
<div class="page_item_news">
    <div class="container">
        <div class="row news_item">
            <div class="news_item_left">
                <h1>{{__($tintuc->title)}}</h1>
                <span>{!!__($tintuc->content)!!}</span>
                <div class="blog_post_news">
                    <div class="blog_share">
                        <span>{{__('share')}} </span>
                        <ul class="item_blog_icon">
                            <li>
                                <a href=""><i class="fab fa-facebook-f blog_icon"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-instagram-square blog_icon"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-youtube blog_icon"></i></a>

                            </li>
                            <li>
                                <a href=""><i class="fab fa-twitter blog_icon"></i></a>
                            </li>

                        </ul>
                    </div>
                    <div class="blog_nav">
                        <div class="blog_previous ">
                            <a href="" class="prev">
                                <i class="fas fa-long-arrow-alt-left"></i>
                                <span class="title_prev">{{__('previous_post')}}</span>
                            </a>
                        </div>
                        <div class="blog_next">
                            <a href="" class="next">
                                <span class="title_prev">{{__('next_post')}}</span>
                                <i class="fas fa-long-arrow-alt-right"></i>

                            </a>
                        </div>
                    </div>
                </div>


            </div>
            <div class="news_item_right">
                <div class="list_item_right">
                    <h4>{{__('categories')}}</h4>
                    <ul style="padding-left:0">
                        <li class="link_news">
                            <a href="">All</a>
                            <span class="number_news">({{$number_all}})</span>
                        </li>
                        @foreach ($theloais as $theloai )
                        <li class="link_news">
                            <a href="">{{$theloai->name}}</a>
                            <span class="number_news">({{$theloai->news_count}})</span>
                        </li>
                        @endforeach

                    </ul>

                </div>
                <h2 class="title_related_news">{{__('related_news')}}</h2>
                <ul class="related_news">
                    @foreach($tintuc_lienquan as $tintuc )
                      <li class="col_related_news">
                                <div class="row ">
                                   <div class="img-left">
                                        <img src="{{$tintuc->image}}" class="img-fluid img_news " alt="">
                                   </div>
                                   <div class="text-event">
                                    <h5><a href="{{route('new.detail',__($tintuc->slug))}}">{{__($tintuc->title)}}</a></h5>
                                    <div class="der_news">{!!Str::words(strip_tags(__($tintuc->content)), 5, '...')!!} </div></div>
                                    <div class="calendar">
                                        <div class="left-news">
                                            <img src="/img/lich.svg" alt="">
                                          {{ \Carbon\Carbon::parse($tintuc->created_at)->format('d/m/Y')}}
                                        </div>
                                        <a href="{{route('new.detail',__($tintuc->slug))}}" >{{__('see_more')}}<img src="/img/right.svg" alt=""></a>
                                    </div>
                                   </div>
                                </div>
                            </li>

                    @endforeach


                </ul>
            </div>
        </div>

    </div>
</div>

@endsection