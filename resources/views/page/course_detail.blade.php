@extends('landingpage.layout')
@section('content')
    <div class="page_item_news my-[30px] w-[80%] mx-auto">
        <div class=" w-full">
            <p class="text-[#101F73] text-[16px] font-semibold ">{{ __($course->category->slug) }}
            </p>
            <p class="text-[#101828] text-[24px] font-semibold my-2">{{ __($course->title) }}</p>


            <ul class="w-full flex">
                <li class="w-[160px] py-2 text-center font-semibold text-[16px] {{ Request::get('tab') == null ||  Request::get('tab') == 'info' ? 'text-[#101828] border-b-[3px] border-b-[#A60303] ' : 'text-[#667085]' }}">
                    <a href="{{ Request::path() }}?tab=info">{{ __('thongtintchung') }}</a>
                </li>
                <li class="w-[160px] py-2 text-center font-semibold text-[16px] {{ Request::get('tab') == 'roadmap' ? 'text-[#101828] border-b-[3px] border-b-[#A60303]' : 'text-[#667085]' }}">
                    <a href="{{ Request::path() }}?tab=roadmap">{{ __('learning_roadmap') }}</a>
                </li>
                <li class="w-[160px] py-2 text-center font-semibold text-[16px] {{ Request::get('tab') == 'opening' ? 'text-[#101828] border-b-[3px] border-b-[#A60303]' : 'text-[#667085]' }}">
                    <a href="{{Request::path()}}?tab=opening">{{ __('opening_schedule') }}</a>
                </li>
            </ul>

        </div>
        <h2 class="text-[#101828] text-[32px] mt-[60px] mb-6">{{ __('activity_other') }}</h2>
        <div class="w-full flex">

        </div>
    </div>
@endsection
