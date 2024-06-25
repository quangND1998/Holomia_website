@extends('landingpage.layout')
@section('content')
    <div class="contain flex justify-center items-center flex-col my-3">
        <img loading="lazy" class="max-h-[500px]" src="images/illustration.png" alt="">
        <p class="text-[#667085] text-[24px] my-4 text-center">
            {{ __('thanks_register') }} <br>
            {{ __('thanks_contact') }}
        </p>

        <a href="/" class="w-[200px] rounded-[8px] bg-[#101F73] text-center
         border-[2px] border-[#101F73] text-white px-[28px] py-[16px]">{{ __('back_home') }}</a>
    </div>
@endsection

