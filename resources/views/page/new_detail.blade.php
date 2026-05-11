@extends('landingpage.layout')
@section('content')
<div class="page_item_news">
    <div class="container">
        <div class="row news_item">
            <div class="news_item_left">
                @php
                    $newsImage = null;
                    if (!empty($tintuc->image)) {
                        $newsImage = \Illuminate\Support\Str::startsWith($tintuc->image, ['http://', 'https://', '/'])
                            ? $tintuc->image
                            : asset($tintuc->image);
                    }
                @endphp
                <h1>{{__($tintuc->title)}}</h1>
                @if ($newsImage)
                    <div class="news_detail_image">
                        <img src="{{ $newsImage }}" class="img-fluid" alt="{{ __($tintuc->title) }}">
                    </div>
                @endif
                @php
                    $rawNewsContent = __($tintuc->content);
                    $normalizedNewsContent = preg_replace_callback(
                        '/src=(["\'])(.*?)\1/i',
                        function ($matches) {
                            $quote = $matches[1];
                            $src = trim($matches[2]);

                            if (\Illuminate\Support\Str::contains($src, 'uploads/editor/')) {
                                $src = preg_replace('/^(\.\.\/)+/', '', $src);
                                $src = preg_replace('/^\/+/', '', $src);
                                $src = '/' . $src;
                            }

                            return 'src=' . $quote . $src . $quote;
                        },
                        $rawNewsContent
                    );
                @endphp
                <div class="news_detail_content">{!! $normalizedNewsContent !!}</div>
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
                            @if (!empty($previousNews))
                                <a href="{{ route('new.detail', $previousNews->detailSlug()) }}" class="prev">
                                    <i class="fas fa-long-arrow-alt-left"></i>
                                    <span class="title_prev">{{ __('previous_post') }}</span>
                                </a>
                            @else
                                <span class="prev disabled">
                                    <i class="fas fa-long-arrow-alt-left"></i>
                                    <span class="title_prev">{{ __('previous_post') }}</span>
                                </span>
                            @endif
                        </div>
                        <div class="blog_next">
                            @if (!empty($nextNews))
                                <a href="{{ route('new.detail', $nextNews->detailSlug()) }}" class="next">
                                    <span class="title_prev">{{ __('next_post') }}</span>
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </a>
                            @else
                                <span class="next disabled">
                                    <span class="title_prev">{{ __('next_post') }}</span>
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </span>
                            @endif
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
                                @php
                                    $relatedImage = !empty($tintuc->image) && !\Illuminate\Support\Str::startsWith($tintuc->image, ['http://', 'https://', '/'])
                                        ? asset($tintuc->image)
                                        : $tintuc->image;
                                @endphp
                                <img src="{{ $relatedImage }}" class="img-fluid img_news " alt="">
                            </div>
                            <div class="text-event">
                                <h5><a href="{{ route('new.detail', $tintuc->detailSlug()) }}">{{__($tintuc->title)}}</a></h5>
                                <div class="der_news">{!!Str::words(strip_tags(__($tintuc->content)), 5, '...')!!}
                                </div>
                                <div class="calendar">
                                    <div class="left-news">
                                        <img src="/img/lich.svg" alt="">
                                        {{ \Carbon\Carbon::parse($tintuc->created_at)->format('d/m/Y')}}
                                    </div>
                                    <a href="{{ route('new.detail', $tintuc->detailSlug()) }}">{{__('see_more')}}<img
                                            src="/img/right.svg" alt=""></a>
                                </div>
                            </div>

                    </li>

                    @endforeach


                </ul>
            </div>
        </div>

    </div>
</div>
<style>
    .news_detail_image {
        margin: 1rem 0 1.5rem;
        border-radius: 8px;
        overflow: hidden;
    }

    .news_detail_image img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .news_item_left .news_detail_image img {
        width: 100% !important;
    }

    .news_item_left .news_detail_content img {
        max-width: 100%;
        width: auto !important;
        height: auto !important;
    }

    .news_item_left a {
        color: #2196f3 !important;
    }

    .blog_previous .disabled,
    .blog_next .disabled {
        color: #999;
        cursor: not-allowed;
        opacity: 0.7;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
</style>

@endsection
