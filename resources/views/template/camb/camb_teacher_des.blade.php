<div id="content">
    <div class="py-[80px]">
        <div class="w-full">

            <div class="w-[90%] lg:w-[80%] mx-auto">
                <div class="w-full flex flex-wrap justify-center  text-center mb-[40px]">
                    <p class="text-[#101828] uppercase text-[30px] font-semibold w-full text-center my-3">
                        {{ __($section->title) }}</p>
                    <p class="text-[#101828] uppercase text-[18px] font-semibold w-full text-center">
                        {{ __($section->sub_title) }}</p>
                    <p class="text-[#667085] text-[16px] w-full text-left lg:text-center"> {!! __($section->description) !!} </p>
                </div>
                @foreach ($section->contents as $content)
                    @if ($loop->index % 2 != 0)
                    <div class="w-full  lg:h-[680px]">
                        <div class="w-full lg:w-1/3 mx-auto rounded-[20px] border border-[#101F73] bg-[#FFFFFF] px-[40px] py-[32px] relative">
                            <img class="w-[19px]  left-3 top-3" src="/images/dau_left.png" alt="">
                            <div class="">
                                <p class="text-[#667085] text-[14px]">{!! __($content->sub_title) !!}</p>
                            </div>

                            <img class="w-[19px] absolute right-3 bottom-3" src="/images/dau_right.png" alt="">
                        </div>
                        <div class="lg:flex w-full justify-center items-center my-[64px] ">
                            <div class="w-full lg:w-1/2 flex justify-center items-center">
                                @if (count($content->images) > 0)
                                    <img class="lg:h-[600px] lg:absolute  rounded-[20px]" src="{{ $content->images[0]->image }}"
                                        alt="">
                                @endif
                            </div>
                            <div class="w-full lg:w-1/2 mr-3">
                                <p class="text-[#101F73] text-[18px] font-semibold">{{ __('teacher') }}</p>
                                <p class="text-[#101828] text-[24px] my-1 font-semibold">{{ __('fullname_teacher') }}</p>
                                <p class="text-[#667085] text-[16px]">{!! __($content->description) !!}</p>
                            </div>
                            

                        </div>
                                                
                    </div>
                    @else
                    <div class="w-full lg:h-[680px]">
                        <div class="w-full lg:w-1/3 mx-auto rounded-[20px] border border-[#101F73] bg-[#FFFFFF] px-[40px] py-[32px] relative">
                            <img class="w-[19px] absolute left-3 top-3" src="/images/dau_left.png" alt="">
                            <div class="">
                                <p class="text-[#667085] text-[14px]">{!! __($content->sub_title) !!}</p>
                            </div>

                            <img class="w-[19px] absolute right-3 bottom-3" src="/images/dau_right.png" alt="">
                        </div>
                        <div class="flex-wrap flex lg:flex-nowrap w-full justify-center items-center my-[64px] ">

                            <div class="w-full lg:w-1/2 lg:mr-3 order-2 lg:order-1">
                                <p class="text-[#101F73] text-[18px] font-semibold">{{ __('teacher') }}</p>
                                <p class="text-[#101828] text-[24px] my-1 font-semibold">{{ __('fullname_teacher') }}</p>
                                <p class="text-[#667085] text-[16px]">{!! __($content->description) !!}</p>
                            </div>
                            <div class="w-full lg:w-1/2 flex justify-center items-center order-1 lg:order-2">
                                @if (count($content->images) > 0)
                                    <img class="lg:h-[600px]  lg:absolute  rounded-[20px]" src="{{ $content->images[0]->image }}"
                                        alt="">
                                @endif
                            </div>

                        </div>
                                                
                    </div>
                    @endif
                @endforeach
            </div>


        </div>

    </div>
</div>
