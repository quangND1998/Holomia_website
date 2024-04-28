<div id="content"
    class="w-[90%] lg:absolute lg:w-[80%] left-[10%] lg:bottom-[0px] mx-auto rounded-[20px] shadow-xl bg-[#ffffff] lg:my-[60px]">
    <div class="show_pc h-full mx-12  lg:grid grid-cols-1  lg:grid-cols-9 gap-4  justify-center items-center my-[30px]">
        @foreach ($section->contents as $content)
            <div class="mx-2">
                <p class="text-[#A60303] uppercase text-[30px] font-bold">{{ __($content->title) }}</p>
                <p class="text-[#101828] text-[30px] font-semibold w-full ">{{ __($content->sub_title) }}</p>
            </div>
            @foreach ($content->images as $image)
                <div class="h-[80px] flex justify-center items-center mx-2">
                    <img class="w-auto max-h-[80px]  mx-1" src="{{ $image->image }}" alt="">
                </div>
            @endforeach
        @endforeach
    </div>
    <div class=" h-full mx-12  justify-center items-center my-[30px]">
        @foreach ($section->contents as $content)
            <div class="mx-2 flex items-center justify-center">
                <p class="text-[#A60303] uppercase text-[30px] font-bold">{{ __($content->title) }}</p>
                <p class="text-[#101828] text-[30px] font-semibold  mx-3">{{ __($content->sub_title) }}</p>
            </div>
            <div class="slider_partner py-3">
                @foreach ($content->images as $image)
                    <div class="h-[80px] !flex justify-center items-center mx-2">
                        <img class="w-auto max-h-[80px]  mx-1" src="{{ $image->image }}" alt="">
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
<style>
    .slick-dots {
        display: none !important;
    }
</style>
