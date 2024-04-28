<div class="px-6 mt-6 lg:w-[90%] lg:mt-[200px] mb-[60px] mx-auto lg:flex">
    @foreach ($section->contents as  $content)
        @if($loop->index == 0)
        <div class="lg:w-1/2 lg:mr-10 ">
            @if(count($content->images) >0)
            <img class="w-full rounded-[10px] lg:h-[600px] object-cover" src="{{$content->images[0]->image}}" alt="">
            @endif
        </div>
        @endif
    @endforeach

        <div class="my-4 lg:w-1/2 lg:my-0">
            @foreach ($section->contents as  $content)
            @if($loop->index == 0)
                <p class="text-[#0F197A] uppercase font-semibold text-[18px]">{{ __($content->title) }}</p>
                <p class="text-[#101828] uppercase font-semibold text-[30px] my-2">{{ __($content->sub_title) }}</p>
                <p class="content">
                    {!! __($content->description) !!}
                </p>

                <a href="about/about_cammbridge">
                    <button
                        class="text-[#A60303] flex justify-center items-center my-3 end-2.5 bottom-2.5 border-[2px] border-[#A60303] font-semibold rounded-lg text-sm px-8 py-3.5 ">
                        {{ __('more') }}
                        <img class="mx-3 fill-[#A60303]" src="images/Vector_red.svg" alt="">
                    </button>
                </a>
            @endif
            @endforeach

            <div class="w-full  flex flex-wrap">
                @foreach ($section->contents as  $content)
                @if($loop->index > 0)
                <div class="lg:w-1/2 mt-10">
                    <div class="flex items-center my-2">
                        @if(count($content->images) >0)
                        <img class="w-[48px] h-[48px]" src="{{$content->images[0]->image}}" alt="">
                        @endif
                        <p class="mx-2 font-semibold text-[24px]">{{ __($content->title) }}</p>
                    </div>
                    <p class="text-[#667085] text-[16px]">{!! __($content->sub_title) !!}</p>
                </div>
                @endif
                @endforeach
            </div>


        </div>


</div>
