<div id="content" class="">
    <div class="py-[80px] min-h-[800px]">
        <div class="w-full h-full list_reason">
            <div class="w-[90%] title_center mx-auto flex flex-wrap justify-center mb-[40px]">
                <p class="text-[#101F73] uppercase text-[18px] font-semibold w-full text-center">
                    {{ __($section->title) }}</p>
                <p class="text-[#101828] uppercase text-[30px] font-semibold w-full text-center">
                    {{ __($section->sub_title) }}</p>
                <p class="text-[#667085] text-[16px] w-full text-center"> {!! __($section->description) !!} </p>
            </div>
            <div class="slider_reason w-[80%] mx-auto">

                @foreach ($section->contents as $content)
                    <div
                        class="bg-[#FCF5F6] min-h-[520px] border border-[#BF344D] transition ease-in-out  rounded-[10px] mx-2 hover:-translate-y-1 hover:scale-110  duration-300 p-[32px]">
                        <div class="rounded-[20px] bg-[#FFFFFF] px-[32px] py-[20px] relative">
                            <img loading="lazy" class="w-[19px] absolute left-0 top-0" src="/images/dau_left.png" alt="">
                            <div class="">
                                <p class="text-[#667085] text-[14px]">{!! __($content->description) !!}</p>
                            </div>

                            <img loading="lazy" class="w-[19px] absolute right-0 bottom-0" src="/images/dau_right.png" alt="">
                        </div>

                        <div class="flex  mt-[32px]">
                            @if (count($content->images) > 0)
                            <div class="w-[120px] mr-3">

                                    <img loading="lazy" class="w-[48px] h-[48px] object-cover   rounded-[24px]"
                                        src="{{ $content->images[0]->image }}" alt="">
                            </div>
                            @endif
                            <div>
                                <p class="text-[#101828] text-[16px] font-semibold">{{ __($content->title) }}</p>
                                <div class="mt">
                                    <p class="text-[#667085] italic text-[14px]">{!! __($content->sub_title) !!}</p>

                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>


        </div>
        <div class="w-full flex justify-center items-center mt-[100px]">
            <a type="submit" href="#form_advise"
                class="text-white  flex justify-center items-center  bg-[#A60303] font-medium rounded-lg text-sm px-[28px] py-[16px] w-[240px] ">{{ __('kiemtratrinhdo') }}
            </a>
        </div>

    </div>
</div>
