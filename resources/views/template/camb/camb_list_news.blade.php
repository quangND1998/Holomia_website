<div class="content w-[80%] mx-auto my-[120px]">
    <p class="uppercase text-[#101F73] font-semibold text-[18px] text-center"> {{ __($section->title) }}</p>
    <p class="uppercase text-[#101828] font-semibold text-[40px] text-center"> {{ __($section->sub_title) }}</p>
    <div class="content grid grid-cols-3 gap-4 mt-[30px]">
        @foreach ($news as $feature)
        <a href="new/{{ __($feature->slug) }}">
            <div class="border shadow-md rounded-[12px] h-[480px]">
                <img class="rounded-t-[12px] h-[340px] w-full object-cover" src="{{ $feature->image }}" alt="">
                <div class=" p-4 ">
                    <p class="text-[#101828] font-semibold text-[24px] font-roboto my-2 line-clamp-1">{{ __($feature->title) }}</p>
                    <p class="text-[#667085] text-[16px] my-3 line-clamp-2">{{ __($feature->content_slug) }}</p>
                </div>
            </div>
        </a>
        @endforeach


    </div>
    <div class="w-full">
        {{ $news->links('landingpage.page') }}
    </div>
</div>
