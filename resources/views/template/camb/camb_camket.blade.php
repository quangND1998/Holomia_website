<div id="content">
    <div class="py-[40px] lg:py-[80px]">
        <div class="w-full">
            <div class="w-[90%] lg:w-[80%] mx-auto">
                <div class="lg:flex w-full justify-center items-center my-[20px] lg:my-[64px] ">
                    <div class="w-full lg:w-1/2 mr-[20px]">
                        <p class="text-[#101F73] uppercase text-[30px] font-semibold w-full text-left my-3">
                            {{ __($section->title) }}</p>
                        <p class="text-[#101828] uppercase text-[18px] font-semibold w-full text-left">
                            {{ __($section->sub_title) }}</p>
                        <p class="text-[#667085] text-[16px] w-full text-left"> {!! __($section->description) !!} </p>

                        <a href=""
                                class="text-white  my-[20px] lg:my-[100px] w-[260px] flex justify-center items-center end-2.5 bottom-2.5 bg-[#0F197A] font-medium rounded-lg text-sm px-8 py-4 ">{{
                                                __('khamphakhoahoc') }}
                                    <img loading="lazy" class="mx-2 fill-white" src="images/Vector.svg" alt="">
                            </a>
                    </div>
                    @foreach ($section->contents as $content)
                        <div class="w-full lg:w-1/2 flex justify-center items-center">
                            @if (count($content->images) > 0)
                                <img loading="lazy" class="h-[400px] w-[600px] object-cover rounded-[20px]"
                                    src="{{ $content->images[0]->image }}" alt="">
                            @endif
                        </div>
                    @endforeach
                </div>

            </div>


        </div>

    </div>
</div>
