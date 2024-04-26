@extends('landingpage.layout')
@section('content')
    <div class="page_item_news my-[30px] w-[80%] mx-auto ">
        <div class="flex">
            <div class="w-2/3">
                <div class=" w-full">
                    <p class="text-[#101F73] text-[16px] font-semibold ">{{ __($course->category->slug) }}
                    </p>
                    <p class="text-[#101828] text-[24px] font-semibold my-2">{{ __($course->title) }}</p>


                    <ul class="w-full flex my-8">
                        <li onclick="openTab(event, 'tab_info')"
                            class="tablinks w-[160px] py-2 text-center font-semibold text-[16px] active">
                            {{ __('thongtintchung') }}
                        </li>
                        <li onclick="openTab(event, 'tab_roadmap')"
                            class="tablinks w-[160px] py-2 text-center font-semibold text-[16px] ">
                            {{ __('learning_roadmap') }}
                        </li>
                        <li onclick="openTab(event, 'tab_opening')"
                            class="tablinks w-[160px] py-2 text-center font-semibold text-[16px] ">
                            {{ __('opening_schedule') }}
                        </li>
                    </ul>
                    <!-- Tab content -->
                    <div id="tab_info" class="tabcontent mb-8 pr-[60px]" style="display:block">
                        <p>{!! __($course->info) !!}</p>
                    </div>

                    <div id="tab_roadmap" class="tabcontent my-6">
                        <p>{!! __($course->roadmap) !!}</p>
                    </div>

                    <div id="tab_opening" class="tabcontent my-6">
                        <p>{!! __($course->open_schedule) !!}</p>
                    </div>

                </div>
                <h2 class="text-[#101828] text-[32px] mt-[60px] mb-6">{{ __('course_other') }}</h2>
            </div>
            <div class="w-1/3">
                <div class="shadow-md rounded-[12px] px-[44px] py-[30px]">
                    <p class="text-[#101828] text-[24px] font-semibold my-2">{{ __($course->title) }}</p>
                    <div class="flex">
                        <p class="text-[#667085] text-[16px] capitalize">{{ __('thoiluong') }}: </p>
                        <p class="text-[#667085] text-[16px] mx-1">{{ __($course->time) }} {{ __('month') }}</p>
                    </div>
                    <div class="flex">
                        <p class="text-[#667085] text-[16px]">{{ __('hocviendahoc') }}: </p>
                        <p class="text-[#667085] text-[16px] mx-1">{{ __($course->number_student) }} {{ __('hocvien') }}
                        </p>
                    </div>
                    <div class="mt-5 flex justify-between border-b-[1px] border-[#667085]">
                        <p class="text-[#101828] text-[16px] my-2 font-semibold">{{ __('hocphi') }}</p>
                        <p class="text-[#A60303] text-[16px] my-2 font-semibold">{{ number_format($course->price) }}
                            VNĐ</p>
                    </div>
                    <div class="w-full mt-10 flex justify-center items-center">
                        <button type="submit"
                            class="text-white  flex justify-center items-center end-2.5 bottom-2.5 bg-[#0F197A] font-medium rounded-lg text-sm px-8 py-3 ">{{ __('dangkykhoahoc') }}
                            <img class="mx-2 fill-white" src="images/Vector.svg" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider_auto w-full mx-auto h-[450px]">

            @foreach ($course_lienquan as $course)
            <div
            class="mx-3 slick-slide transition ease-in-out border rounded-[10px]  hover:-translate-y-1 hover:scale-110  duration-300 min-h-[430px]">
            <a href="list_course/{{ __($course->slug) }}">
                @if ($course->image != null)
                    <img class="w-full h-[200px] rounded-t-[10px] object-cover" src="{{ $course->image }}"
                        alt="">
                @endif
                <div class="m-4">
                    <div class="my-2 ">
                        <p class="text-[#101F73] text-[16px] font-semibold ">{{ __($course->category->slug) }}
                        </p>
                        <p class="text-[#101828] text-[24px] font-semibold my-2">{{ __($course->title) }}</p>
                        <p class="text-[#667085] text-[16px]  line-clamp-2">{!! __($course->sub_title) !!}</p>
                    </div>
                    <div class="flex items-center">
                        <i class="uil uil-clock text-black"></i>
                        <p class="mx-2">{{ __($course->time) }} {{ __('month') }}</p>
                    </div>
                    <div class="flex items-center">
                        <i class="uil uil-users-alt text-black"></i>
                        <p class="mx-2">{{ $course->number_student }} {{ __('hocviendahoc') }}</p>
                    </div>
                    <div class="flex items-center">
                        <i class="uil uil-money-bill text-black"></i>
                        <p class="mx-2">{{ $course->price }} VNĐ</p>
                    </div>
                </div>
            </a>
        </div>
            @endforeach
        </div>

    </div>
@endsection
<style>
    .tabcontent {
        display: none;
    }

    .active {
        color: #101828;
        border-bottom: 3px solid #A60303;
    }
</style>
<script>
    function openTab(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
