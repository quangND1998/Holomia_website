<div class="content1 relative ">
    @foreach ($section->contents as $content)
        @if ($loop->index == 0)
            <div class="slider_banner">
                @if (count($content->images) > 0)
                    @foreach ($content->images as $image)
                        <img class="w-full h-[780px] object-cover " src="{{ $image->image }}" alt="">
                    @endforeach

                @endif
            </div>

            <div class="lg:absolute top-[10%] w-full ">
                <div class="banner_center lg:ml-[10%] lg:w-[80%] md:ml-[10%] md:w-[80%]  flex lg:flex-row  ">
                    <div class="lg:w-1/2 sm:w-full lg:mr-20 order-2 lg:order-1 px-3 ">
                        <h1 class="text_title mt-10 font-semibold sm:text-[44px] md:text-[44px] lg:text-[44px]   xl:text-[50px]   font-roboto">
                            {{ __($content->title) }} <br> <span class="text-[#AD0101]">{!! __($content->sub_title) !!}</span>
                        </h1>
                        <p class="my-2">
                            {!! __($content->description) !!}
                        </p>

                        <div class="flex mt-10">
                            <a type="submit" href="#form_advise"
                                class="text-white  flex justify-center items-center end-2.5 bottom-2.5 bg-[#0F197A] font-medium rounded-lg text-sm px-8 py-3 ">{{ __('dangkytuvan') }}
                                <img class="mx-2 fill-white" src="images/Vector.svg" alt="">
                            </a>
                            <a type="submit" href="#form_advise"
                                class="text-[#0F197A] ml-4 end-2.5 bottom-2.5 border border-[#0F197A] font-medium rounded-lg text-sm px-8 py-3 ">{{ __('kiemtratrinhdo') }}
                            </a>
                        </div>
                        <div class="icon md:mt-6 lg:mt-20 lg:flex">
                            <div class="flex mx-3 my-6">
                                <img class="w-[32px] h-[32px]" src="images/Speak.png" alt="">
                                <p class="mx-2 text-center content-center ">{!! __('tutingiaotiep') !!}</p>
                            </div>
                            <div class="flex mx-3 my-6">
                                <img class="w-[32px] h-[32px]" src="images/Briefcase.png" alt="">
                                <p class="mx-2 text-center content-center ">{!! __('namvungkienthuc') !!}</p>
                            </div>
                            <div class="flex mx-3 my-6">
                                <img class="w-[32px] h-[32px]" src="images/idea.png" alt="">
                                <p class="mx-2 text-center content-center ">{!! __('morongtrithuc') !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="content_camket lg:w-1/2 sm:w-full lg:relative order-1 lg:order-2 px-3 ">
                        <div
                            class="border shadow-xl border-[#A60303] rounded-[12px] bg-white  flex  items-center px-4 lg:w-[360px] ml-20">
                            <img class="w-[48px] h-[48px] my-4" src="/images/camket.png" alt="">
                            <div class="mx-4">
                                <p class="text-[#101828] text-[24px] font-semibold">{{ __('camket') }}</p>
                                <p class="text-[#667085] text-[16px]">{{ __('ketquadaura') }}</p>
                            </div>
                        </div>
                        <div
                            class="mt-40 border shadow-xl border-[#A60303] rounded-[12px] bg-white flex  items-center px-4 lg:w-[287px] ml-40">
                            <img class="w-[48px] h-[48px] my-4" src="/images/giaotrinh.png" alt="">
                            <div class="mx-4">
                                <p class="text-[#101828] text-[24px] font-semibold">{{ __('giaotrinh') }}</p>
                                <p class="text-[#667085] text-[16px]">{{ __('chuanquocte') }}</p>
                            </div>
                        </div>
                        <div
                            class=" mt-40 border shadow-xl border-[#A60303] rounded-[12px] bg-white flex  items-center px-4 w-[340px]">
                            <img class="w-[48px] h-[48px] my-4" src="/images/doingu.png" alt="">
                            <div class="mx-4">
                                <p class="text-[#101828] text-[24px] font-semibold">{{ __('doingu') }}</p>
                                <p class="text-[#667085] text-[16px]">{{ __('chuyenmon') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endif
    @endforeach
    <div class="banner_info lg:absolute lg:bottom-[-80px] lg:w-[90%] lg:mx-[5%]  bg-white lg:rounded-[20px] lg:flex drop-shadow-md">
        @foreach ($section->contents as $content)
            @if ($loop->index > 0)
                <div class="flex mx-10 my-6 items-center md:w-full lg:w-1/3  {{  $loop->last == true ?  '' : 'lg:border-r-[1px]'  }}  "">
                    @if (count($content->images) > 0)
                        <img class="w-[120px] h-[120px] object-cover rounded-full"
                            src="{{ $content->images[0]->image }}" alt="">
                    @endif
                    <div class="mx-4">
                        <p class="text-[#101828] text-[24px] font-semibold">{{ __($content->sub_title) }}</p>
                        <p class="text-[#667085] text-[16px]">{!! __($content->description) !!}</p>
                    </div>
                </div>
                <div class="line mx-auto my-auto lg:my-6 {{ $loop->last == true ? '' : 'lg:w-[1px] bg-[#D0D5DD]' }}  "></div>
            @endif
        @endforeach
    </div>

</div>
