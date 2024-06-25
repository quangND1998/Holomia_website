<div class="content w-[90%] lg:w-[70%] mx-auto my-[60px]">
    <p class="uppercase text-[#101828] font-semibold text-[30px]"> {{ __($section->title) }}</p>
    <div class="content grid grid-cols-1 grid-rows-3 lg:grid-cols-3 lg:grid-rows-2 grid-flow-row-dense gap-4 w-full mt-[30px] lg:h-[500px]">
        @foreach ($news_feature as $feature)
            @if ($loop->index == 0)
                <div  class=" lg:col-span-2 lg:row-span-2  relative ">

                    <img loading="lazy" class="h-[340px] lg:h-full w-full object-cover" src="{{ $feature->image }}" alt="">
                    <div
                        class="w-1/2 h-full  hover:opacity-[0.8] absolute top-0 bg-gradient-to-b from-[#1c1e5341] to-[#1C1E53] px-6 py-6 flex justify-end items-end">
                        <div class="py-4">
                            <p class="text-white font-semibold text-[24px] line-clamp-3">{{ __($feature->title) }}</p>
                            <p class="text-white text-[16px] my-3 line-clamp-3">{!! __($feature->content_slug) !!}</p>

                            <a href="new/{{ __($feature->slug) }}" class="flex items-center text-center">
                                <p class="text-[#FCD980] text-[16px]">{{ __('more') }}</p>
                                <i class="uil uil-angle-right text-[#FCD980] text-[16px]"></i>
                            </a>
                        </div>
                    </div>

                </div>
            @else

                <div href="new/{{ __($feature->slug) }}" class="w-full group relative">

                    <img loading="lazy" class="h-[340px] lg:h-full  w-full object-cover" src="{{ $feature->image }}" alt="">
                    <div
                        class="group-hover:block hidden  transition-opacity  w-full h-full absolute top-0 bg-gradient-to-b from-[#1c1e5341] to-[#1C1E53] px-6 py-2 flex justify-end items-end">
                        <div class="py-4">
                            <p class="text-white font-semibold text-[24px] line-clamp-1">{{ __($feature->title) }}</p>
                            <p class="text-white text-[16px] my-3 line-clamp-1">{!! __($feature->content_slug) !!}</p>

                            <a href="new/{{ __($feature->slug) }}" class="flex items-center text-center">
                                <p class="text-[#FCD980] text-[16px]">{{ __('more') }}</p>
                                <i class="uil uil-angle-right text-[#FCD980] text-[16px]"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach


    </div>
</div>
