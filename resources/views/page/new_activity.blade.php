@extends('landingpage.layout')
@section('content')
    <div class="page_item_news my-[30px] w-[80%] mx-auto">
            <div class=" flex flex-col justify-center items-center">
                <h1 class="text-[#101828] text-[32px] font-semibold my-[30px]">{{ __($tintuc->title) }}</h1>
                <p>{!! __($tintuc->content) !!}</p>
                
            </div>
            <h2 class="text-[#101828] text-[32px]">{{ __('activity_other') }}</h2>
                <ul class="related_news">
                    @foreach ($tintuc_lienquan as $tintuc)
                        <li class="col_related_news">
                            <div class="row ">
                                <div class="img-left">
                                    <img src="{{ $tintuc->image }}" class="img-fluid img_news " alt="">
                                </div>
                                <div class="text-event">
                                    <h5><a href="{{ route('new.detail', __($tintuc->slug)) }}">{{ __($tintuc->title) }}</a>
                                    </h5>
                                    <div class="der_news">{!! Str::words(strip_tags(__($tintuc->content)), 5, '...') !!}
                                    </div>
                                    <div class="calendar">
                                        <div class="left-news">
                                            <img src="/img/lich.svg" alt="">
                                            {{ \Carbon\Carbon::parse($tintuc->created_at)->format('d/m/Y') }}
                                        </div>
                                        <a href="{{ route('new.detail', __($tintuc->slug)) }}">{{ __('see_more') }}<img
                                                src="/img/right.svg" alt=""></a>
                                    </div>
                                </div>

                        </li>
                    @endforeach


                </ul>
        </div>
@endsection
