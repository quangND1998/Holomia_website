<div id="content"  class="bg-[#FCF5F6]">
    <div class="py-[80px]">
        <div class="w-full h-[350px]">
            <div class="w-full flex flex-wrap justify-center mb-[40px]">
                <p class="text-[#101F73] uppercase text-[18px] font-semibold w-full text-center">{{ __($section->title) }}</p>
                <p class="text-[#101828] uppercase text-[30px] font-semibold w-full text-center">{{ __($section->sub_title) }}</p>
                <p class="text-[#667085] text-[16px] w-full text-center"> {!! __($section->description) !!} </p>
            </div>
            <div class="slider_reason w-[80%] mx-auto">

                @foreach ($section->contents as  $content)
                <div class="border border-[#BF344D] transition ease-in-out  rounded-[10px] mx-2   duration-300 py-6">
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
        <div class="w-full flex justify-center items-center mt-[100px]">
            <a type="submit"  href="#form_advise"
                class="text-white  flex justify-center items-center  bg-[#A60303] font-medium rounded-lg text-sm px-[28px] py-[16px] w-[240px] ">{{
                                __('kiemtratrinhdo') }}
            </a>
        </div>

    </div>
</div>
