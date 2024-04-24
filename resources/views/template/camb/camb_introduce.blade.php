<div id="content"  class="">
    <div class="py-[80px]">
        <div class="w-full ">
            <div class="w-[80%] mx-auto flex flex-wrap justify-center mb-[40px]">
                <p class="text-[#101828] uppercase text-[40px] font-semibold w-full text-center my-3">{{ __($section->title) }}</p>
                <p class="text-[#101828] uppercase text-[18px] font-semibold w-full text-center">{{ __($section->sub_title) }}</p>
                <p class="text-[#667085] text-[16px] w-full text-center"> {!! __($section->description) !!} </p>
            </div>
            <div class="slider_introduce w-[100%] mx-auto">

                @foreach ($section->contents as  $content)
                <div class="transition ease-in-out  hover:-translate-y-1 hover:scale-110  duration-300 h-[400px] mx-2">
                    @if(count($content->images) >0)
                    <img class="h-[400px] w-[600px] object-cover" src="{{$content->images[0]->image}}" alt="">
                    @endif
                </div>
                @endforeach
            </div>


        </div>

    </div>
</div>
