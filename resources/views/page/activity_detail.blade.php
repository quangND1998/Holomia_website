@extends('landingpage.layout')
@section('content')
    <div class="page_item_news my-[30px] w-[90%] lg:w-[80%] mx-auto">
        <div class=" flex flex-col justify-center items-center">
            <h1 class="text-[#101828] text-[32px] font-semibold my-[30px] text-center">{{ __($tintuc->title) }}</h1>
            <p>{!! __($tintuc->content) !!}</p>

        </div>
       
        <div class="flex justify-between items-center  mt-[60px] mb-6">
            <h2 class="text-[#101828] text-[32px] lg:mt-[60px] ">{{ __('activity_other') }}</h2>

            <a href="about/activity" class="text-[#101F73] font-semibold">{{ __('see_more') }}</a>
        </div>
        <div class="lg:flex">
            @foreach ($tintuc_lienquan as $tintuc)
                <a class="w-2/3 lg:w-1/4 pr-3" href="{{ route('activity.detail', __($tintuc->slug)) }}">
                    <div class="border rounded-[20px] h-[420px]">
                        <img src="{{ $tintuc->image }}" class="h-[220px] w-full object-cover " alt="">
                        <div class="p-3">
                            <h5 class="my-3 text-[#101828] text-[24px] font-semibold line-clamp-1">{{ __($tintuc->title) }}</h5>
                            <div class="text-[#667085] text-[16px] line-clamp-2">{!! Str::words(strip_tags(__($tintuc->content_slug)), 20, '...') !!}
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
