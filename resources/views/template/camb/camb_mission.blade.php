<div id="content"  class="bg-[#FCF5F6]">
    <div class="py-[80px]">
        <div class="w-full">
            <div class="w-full flex flex-wrap justify-center mb-[40px]">
                <p class="text-[#101828]  text-[40px] font-semibold w-full text-center">{{ __($section->title) }}</p>
                <p class="text-[#101828] uppercase text-[18px] font-semibold w-full text-center">{{ __($section->sub_title) }}</p>
                <p class="text-[#667085] text-[16px] w-full text-center"> {!! __($section->description) !!} </p>
            </div>
            <div class="slider_auto w-[80%] mx-auto">

                @foreach ($section->contents as  $content)
                <div class="slick-slide border bg-white border-[#BF344D] transition ease-in-out  rounded-[10px] mx-2   duration-300 py-[50px]">
                    <div class="flex justify-center items-center">
                        @if(count($content->images) >0)
                        <img class="w-[48px] h-[48px] object-cover mx-3" src="{{$content->images[0]->image}}" alt="">
                        @endif
                        <p class="text-[#101828] text-[24px] font-semibold">{{ __($content->title) }}</p>
                    </div>
                    
                    <div class="px-6">
                        <div class="mt-4">
                            <p class="text-[#101828] text-[16px]">{!! __($content->sub_title) !!}</p>
                            <p class="text-[#667085] text-[16px]">{!! __($content->description) !!}</p>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>


        </div>

    </div>
</div>
