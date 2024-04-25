<div id="content" class="">
    <div class="py-[80px]">
        <div class="w-full ">
            <div class="w-[80%] mx-auto flex flex-wrap justify-center mb-[40px]">
                <p class="text-[#101828] uppercase text-[40px] font-semibold w-full text-center my-3">
                    {{ __($section->title) }}</p>
                <p class="text-[#101828] uppercase text-[18px] font-semibold w-full text-center">
                    {{ __($section->sub_title) }}</p>
                <p class="text-[#667085] text-[16px] w-full text-center"> {!! __($section->description) !!} </p>
            </div>
            <div class=" w-[80%] mx-auto">

                @foreach ($activity as $content)
                    <a href="new/{{ __($content->slug) }}">
                        <div class="w-full flex shadow-xl rounded-[20px] my-6">
                            {{-- <div class="w-1/3"> --}}
                                @if ($content->image != null)
                                    <img class="h-[320px] w-[520px] object-cover rounded-l-[20px]"
                                        src="{{ $content->image }}" alt="">
                                @endif
                            {{-- </div> --}}

                            <div class="w-2/3 flex flex-col justify-center m-6 text-left">
                                <p class="text-[#101828] text-[24px] my-3 text-left font-semibold">{{ __($content->title) }}</p>
                                <p class="text-[#667085] text-[16px] line-clamp-4">{!! __($content->content_slug) !!}</p>
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
