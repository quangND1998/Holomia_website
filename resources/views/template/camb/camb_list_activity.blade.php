<div id="content" class="">
    <div class="py-[30px] lg:py-[80px]">
        <div class="mx-3">
            <div class="w-full lg:w-[80%] mx-auto flex flex-wrap justify-center mb-[40px]">
                <p class="text-[#101828] uppercase text-[30px] font-semibold w-full text-center my-3">
                    {{ __($section->title) }}</p>
                <p class="text-[#101828] uppercase text-[18px] font-semibold w-full text-center">
                    {{ __($section->sub_title) }}</p>
                <p class="text-[#667085] text-[16px] w-full text-center"> {!! __($section->description) !!} </p>
            </div>
            <div class="w-full lg:w-[80%] mx-auto">

                @foreach ($activity as $content)
                    <a href="about/activity/{{ __($content->slug) }}">
                        <div class="w-full flex shadow-xl rounded-[20px] my-6 items-center">
                                @if ($content->image != null)
                                    <img class="h-full w-[130px] lg:h-[320px] lg:w-[520px] object-cover rounded-l-[20px]"
                                        src="{{ $content->image }}" alt="">
                                @endif
                            <div class="w-2/3 flex flex-col justify-center m-6 text-left content_clamp">
                                <p class="text-[#101828] text-[24px] my-3 text-left font-semibold !line-clamp-1 lg:line-clamp-2">{{ __($content->title) }}</p>
                                <p class="text-[#667085] text-[16px] line-clamp-3 lg:line-clamp-4 ">{!! __($content->content_slug) !!}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>


        </div>
        <div class="w-full">
            {{ $activity->links('landingpage.page') }}
        </div>

    </div>
</div>
