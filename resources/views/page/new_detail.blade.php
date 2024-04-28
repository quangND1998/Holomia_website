@extends('landingpage.layout')
@section('content')
    <div class="page_item_news my-[30px] w-[90%] lg:w-[80%] mx-auto">
        <div class=" lg:flex w-full">
            <div class="lg:w-2/3 ">
                <div class="w-full lg:w-[80%] ">
                    <div class="w-full flex items-center">
                        <i class="uil uil-calendar-alt text-[#667085] text-[24px] mr-3"></i>
                        <p class="text-[#667085] text-[14px]">{{ $tintuc->created_at }}</p>
                    </div>
                    <h1 class="w-full text-[#101828] text-[32px] font-semibold mt-2 mb-[30px]">{{ __($tintuc->title) }}</h1>
                    <p class="w-full">{!! __($tintuc->content) !!}</p>
                </div>

            </div>
            <div class="lg:w-1/3">
                <div class="shadow-xl rounded-[10px] bg-white py-6 px-4 ">
                    <p class="text-[#101828] text-[32px] font-semibold ">{{ __('featured_news') }}</p>
                    @foreach ($news_feature as $feature)
                        <div class="w-full   py-4 h-[120px] rounded-[12px]">
                            <a class="w-full h-full flex" href="{{ route('new.detail', __($feature->slug)) }}">
                                <div class="w-1/3 lg:w-1/4">
                                    <img class="h-full w-full object-cover rounded-l-[12px]" src="{{ $feature->image }}"
                                        alt="">
                                </div>
                                <div class=" w-4/5 px-3 flex flex-wrap items-center">
                                    <p class="text-[#667085]  text-[14px] line-clamp-1">{{ $feature->created_at }}
                                    </p>
                                    <p class="text-[#101828] font-semibold text-[16px] line-clamp-1">
                                        {{ __($feature->title) }}
                                    </p>
                                </div>
                            </a>
                        </div>
                        @if (!$loop->last)
                            <div class="mx-10 my-3 border-b-[1px] border-[#D0D5DD]"></div>
                        @endif
                    @endforeach
                </div>
            </div>


        </div>
        <div class="flex justify-between items-center  mt-[60px] mb-6">
            <h2 class="text-[#101828] text-[32px]">{{ __('news_other') }}</h2>

            <a href="/news" class="text-[#101F73] font-semibold">{{ __('see_more') }}</a>
        </div>
        <div class="w-full lg:flex">
            @foreach ($tintuc_lienquan as $tintuc)
                <a class="lg:w-1/4 lg:pr-3" href="{{ route('new.detail', __($tintuc->slug)) }}">
                    <div class="border rounded-[20px] h-[380px]">
                        <img src="{{ $tintuc->image }}" class="h-[220px] w-full object-cover rounded-t-[12px]"
                            alt="">
                        <div class="p-3">
                            <h5 class="my-3 text-[#101828] text-[24px] font-semibold line-clamp-1">{{ __($tintuc->title) }}
                            </h5>
                            <div class="text-[#667085] text-[16px] line-clamp-2">{!! Str::words(strip_tags(__($tintuc->content_slug)), 20, '...') !!}
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
