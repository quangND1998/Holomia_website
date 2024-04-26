<div id="content"
    class="absolute w-[80%] left-[10%] bottom-[0px] mx-auto rounded-[20px] shadow-xl bg-[#ffffff] my-[60px]">
    <div class=" h-full mx-12  grid grid-cols-9 gap-4  justify-center items-center my-[30px]">


        @foreach ($section->contents as $content)
            <div>
                <p class="text-[#A60303] uppercase text-[40px] font-bold">{{ __($content->title) }}</p>
                <p class="text-[#101828] text-[40px] font-semibold w-full ">{{ __($content->sub_title) }}</p>
            </div>
            @foreach ($content->images as $image)
                <div class="h-[80px] flex justify-center items-center mx-2">
                    <img class="w-auto max-h-[80px]  mx-1" src="{{ $image->image }}" alt="">
                </div>
            @endforeach
        @endforeach
    </div>
</div>
<style>
    .slick-dots {
        display: none;
    }
</style>
