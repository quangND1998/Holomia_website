<div id="content"  >
    <div class="my-[120px]">
        <div class="w-full">
            <div class="w-full flex flex-wrap   justify-center my-[60px]">
                <p class="text-[#101F73] uppercase text-[18px] font-semibold w-full text-center">{{ __($section->title) }}</p>
                <p class="text-[#101828] uppercase text-[40px] font-semibold w-full text-center">{{ __($section->sub_title) }}</p>
                <p class="text-[#667085] text-[16px] w-full text-center"> {!! __($section->description) !!} </p>
            </div>
            <div class="slider_course w-[80%] mx-auto">

                {{-- @foreach ($section->contents as  $content)
                <div class=" border rounded-[10px] mx-5 hover:-translate-y-1 hover:scale-110  h-[400px]">
                    @if(count($content->images) >0)
                    <img class="w-full h-[200px] object-cover" src="{{$content->images[0]->image}}" alt="">
                    @endif
                    <div class="m-4">
                        <div class="my-2">
                            <p class="text-[#0F197A] text-[16px]">{{ __($content->title) }}</p>
                            <p class="text-[#101828] text-[24px]">{!! __($content->sub_title) !!}</p>
                            <p class="text-[#667085] text-[16px]">{!! __($content->description) !!}</p>
                        </div>
                        <a class="text-[#0F62FE] mt-10" href="">{{ __('more') }}
                            <i class="uil uil-arrow-right text-[#0F62FE] mx-2 text-[14px]"></i> </a>
                    </div>

                </div>
                @endforeach --}}
                <div class=" border rounded-[10px] mx-5 hover:-translate-y-1 hover:scale-110 relative">
                    <img class="w-full h-[368px] object-cover " src="images/teacher.jpg" alt="">
                    <div class="absolute w-full bottom-0 items-center text-center p-4 bg-gradient-to-b from-[#00000000] to-[#000000]">
                        <p class="text-[#FFFFFF] uppercase text-[24px]">Trung học</p>
                        <p class="text-[#FFFFFF] text-[16px]">Khóa học A2 nâng cao</p>
                    </div>

                </div>
                <div class=" border rounded-[10px] mx-5 hover:-translate-y-1 hover:scale-110 relative">
                    <img class="w-full h-[368px] object-cover " src="images/teacher.jpg" alt="">
                    <div class="absolute w-full bottom-0 items-center text-center p-4 bg-gradient-to-b from-[#00000000] to-[#000000]">
                        <p class="text-[#FFFFFF] uppercase text-[24px]">Trung học</p>
                        <p class="text-[#FFFFFF] text-[16px]">Khóa học A2 nâng cao</p>
                    </div>

                </div>
                <div class=" border rounded-[10px] mx-5 hover:-translate-y-1 hover:scale-110 relative">
                    <img class="w-full h-[368px] object-cover " src="images/teacher.jpg" alt="">
                    <div class="absolute w-full bottom-0 items-center text-center p-4 bg-gradient-to-b from-[#00000000] to-[#000000]">
                        <p class="text-[#FFFFFF] uppercase text-[24px]">Trung học</p>
                        <p class="text-[#FFFFFF] text-[16px]">Khóa học A2 nâng cao</p>
                    </div>

                </div>
                <div class=" border rounded-[10px] mx-5 hover:-translate-y-1 hover:scale-110 relative">
                    <img class="w-full h-[368px] object-cover " src="images/teacher.jpg" alt="">
                    <div class="absolute w-full bottom-0 items-center text-center p-4 bg-gradient-to-b from-[#00000000] to-[#000000]">
                        <p class="text-[#FFFFFF] uppercase text-[24px]">Trung học</p>
                        <p class="text-[#FFFFFF] text-[16px]">Khóa học A2 nâng cao</p>
                    </div>

                </div>
                <div class=" border rounded-[10px] mx-5 hover:-translate-y-1 hover:scale-110 relative">
                    <img class="w-full h-[368px] object-cover " src="images/teacher.jpg" alt="">
                    <div class="absolute w-full bottom-0 items-center text-center p-4 bg-gradient-to-b from-[#00000000] to-[#000000]">
                        <p class="text-[#FFFFFF] uppercase text-[24px]">Trung học</p>
                        <p class="text-[#FFFFFF] text-[16px]">Khóa học A2 nâng cao</p>
                    </div>

                </div>
                <div class=" border rounded-[10px] mx-5 hover:-translate-y-1 hover:scale-110 relative">
                    <img class="w-full h-[368px] object-cover " src="images/teacher.jpg" alt="">
                    <div class="absolute w-full bottom-0 items-center text-center p-4 bg-gradient-to-b from-[#00000000] to-[#000000]">
                        <p class="text-[#FFFFFF] uppercase text-[24px]">Trung học</p>
                        <p class="text-[#FFFFFF] text-[16px]">Khóa học A2 nâng cao</p>
                    </div>

                </div>
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
