<div id="course"  >
    <div class="my-[120px]">
        <div class="w-full">
            <div class="w-full flex flex-wrap   justify-center my-[60px]">
                <p class="text-[#101F73] uppercase text-[18px] font-semibold w-full text-center">{{ __($section->title) }}</p>
                <p class="text-[#101828] uppercase text-[40px] font-semibold w-full text-center">{{ __($section->sub_title) }}</p>
                <p class="text-[#667085] text-[16px] w-full text-center"> {!! __($section->description) !!} </p>
            </div>
            <div class="slider_course w-[80%] mx-auto">

                @foreach ($courses as  $course)
                <div class="transition ease-in-out border rounded-[10px] mx-5 hover:-translate-y-1 hover:scale-110  duration-300 h-[400px]">
                    @if($course->image != null)
                    <img class="w-full h-[200px] object-cover" src="{{$course->image}}" alt="">
                    @endif
                    <div class="m-4">
                        <div class="my-2 ">
                            <p class="text-[#0F197A] text-[16px]">{{ __($course->title) }}</p>
                            <p class="text-[#101828] text-[24px] truncate  line-clamp-3">{!! __($course->sub_title) !!}</p>
                            <p class="text-[#667085] text-[16px] truncate  line-clamp-3">{!! __($course->info) !!}</p>
                        </div>
                        <a class="text-[#0F62FE] mt-10" href="">{{ __('more') }}
                            <i class="uil uil-arrow-right text-[#0F62FE] mx-2 text-[14px]"></i> </a>
                    </div>

                </div>
                @endforeach
                {{-- <div class="transition ease-in-out border rounded-[10px] mx-5 hover:-translate-y-1 hover:scale-110  duration-300 h-[400px]">
                    <img class="w-full h-[200px] object-cover" src="images/picture.png" alt="">
                    <div class="m-4">
                        <div class="my-2">
                            <p class="text-[#0F197A] text-[16px]">Trung học</p>
                            <p class="text-[#101828] text-[24px]">Khóa học A2 nâng cao</p>
                            <p class="text-[#667085] text-[16px]">Tham gia khóa học tiếng anh A2 nâng cao của
                                Cambridge IEC, học viên sẽ được...</p>
                        </div>
                        <a class="text-[#0F62FE] mt-10" href="">Tìm hiểu thêm
                            <i class="uil uil-arrow-right text-[#0F62FE] mx-2 text-[14px]"></i> </a>
                    </div>

                </div>
                <div class="transition ease-in-out border rounded-[10px] mx-5 hover:-translate-y-1 hover:scale-110  duration-300 h-[400px]">
                    <img class="w-full h-[200px] object-cover" src="images/picture.png" alt="">
                    <div class="m-4">
                        <div class="my-2">
                            <p class="text-[#0F197A] text-[16px]">Trung học</p>
                            <p class="text-[#101828] text-[24px]">Khóa học A2 nâng cao</p>
                            <p class="text-[#667085] text-[16px]">Tham gia khóa học tiếng anh A2 nâng cao của
                                Cambridge IEC, học viên sẽ được...</p>
                        </div>
                        <a class="text-[#0F62FE] mt-10" href="">Tìm hiểu thêm
                            <i class="uil uil-arrow-right text-[#0F62FE] mx-2 text-[14px]"></i> </a>
                    </div>

                </div>
                <div class="transition ease-in-out border rounded-[10px] mx-5 hover:-translate-y-1 hover:scale-110  duration-300 h-[400px]">
                    <img class="w-full h-[200px] object-cover" src="images/picture.png" alt="">
                    <div class="m-4">
                        <div class="my-2">
                            <p class="text-[#0F197A] text-[16px]">Trung học</p>
                            <p class="text-[#101828] text-[24px]">Khóa học A2 nâng cao</p>
                            <p class="text-[#667085] text-[16px]">Tham gia khóa học tiếng anh A2 nâng cao của
                                Cambridge IEC, học viên sẽ được...</p>
                        </div>
                        <a class="text-[#0F62FE] mt-10" href="">Tìm hiểu thêm
                            <i class="uil uil-arrow-right text-[#0F62FE] mx-2 text-[14px]"></i> </a>
                    </div>

                </div>
                <div class="transition ease-in-out border rounded-[10px] mx-5 hover:-translate-y-1 hover:scale-110  duration-300 h-[400px]">
                    <img class="w-full h-[200px] object-cover" src="images/picture.png" alt="">
                    <div class="m-4">
                        <div class="my-2">
                            <p class="text-[#0F197A] text-[16px]">Trung học</p>
                            <p class="text-[#101828] text-[24px]">Khóa học A2 nâng cao</p>
                            <p class="text-[#667085] text-[16px]">Tham gia khóa học tiếng anh A2 nâng cao của
                                Cambridge IEC, học viên sẽ được...</p>
                        </div>
                        <a class="text-[#0F62FE] mt-10" href="">Tìm hiểu thêm
                            <i class="uil uil-arrow-right text-[#0F62FE] mx-2 text-[14px]"></i> </a>
                    </div>

                </div>
                <div class="transition ease-in-out border rounded-[10px] mx-5 hover:-translate-y-1 hover:scale-110  duration-300 h-[400px]">
                    <img class="w-full h-[200px] object-cover" src="images/picture.png" alt="">
                    <div class="m-4">
                        <div class="my-2">
                            <p class="text-[#0F197A] text-[16px]">Trung học</p>
                            <p class="text-[#101828] text-[24px]">Khóa học A2 nâng cao</p>
                            <p class="text-[#667085] text-[16px]">Tham gia khóa học tiếng anh A2 nâng cao của
                                Cambridge IEC, học viên sẽ được...</p>
                        </div>
                        <a class="text-[#0F62FE] mt-10" href="">Tìm hiểu thêm
                            <i class="uil uil-arrow-right text-[#0F62FE] mx-2 text-[14px]"></i> </a>
                    </div>

                </div>  --}}
            </div>


        </div>
        <div class="w-full flex justify-center items-center mt-[100px]">
            <button type="submit"
                class="text-white  flex justify-center items-center  bg-[#A60303] font-medium rounded-lg text-sm px-[28px] py-[16px] w-[240px] ">{{
                                __('xemthemkhoahoc') }}
            </button>
        </div>

    </div>
</div>
