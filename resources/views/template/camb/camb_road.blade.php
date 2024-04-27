<div id="content"  class="bg-[#FCF5F6]">
    <div class="py-[80px]">
        <div class="w-full">
            <div class="w-full flex flex-wrap justify-center mb-[40px]">
                <p class="text-[#101F73] uppercase text-[30px] font-semibold w-full text-center">{{ __($section->title) }}</p>
            </div>
            <div class=" w-[60%] mx-auto flex flex-wrap">
 
                <div class="w-full mx-auto flex flex-wrap">
                    @foreach ($section->contents as  $content)
                    <div class="w-1/2 transition ease-in-out  rounded-[10px] px-2 hover:-translate-y-1 hover:scale-110  duration-300 py-[50px]">
                        <div class="flex flex-col justify-center items-center">
                            <p class="text-[#A60303] text-[64px] mb-4 font-bold">{!! __($content->sub_title) !!}</p>
                            <p class="text-[#101828] text-[24px] font-semibold">{{ __($content->title) }}</p>
                            
                        </div>
    
                    </div>
                    @endforeach
                </div>
               
            </div>


        </div>

    </div>
</div>
