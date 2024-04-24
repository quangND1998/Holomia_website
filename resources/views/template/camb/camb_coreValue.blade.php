<div id="content"  >
    <div class="py-[80px]">
        <div class="w-full">
            <div class="w-full flex flex-wrap justify-center mb-[40px]">
                <p class="text-[#101F73] uppercase text-[18px] font-semibold w-full text-center">{{ __($section->title) }}</p>
                <p class="text-[#101828] uppercase text-[40px] font-semibold w-full text-center">{{ __($section->sub_title) }}</p>
                <p class="text-[#667085] text-[16px] w-full text-center"> {!! __($section->description) !!} </p>
            </div>
            <div class=" w-[80%] mx-auto">

                @foreach ($section->contents as  $content)
                 @if($loop->index % 2 == 0)
                    <div class="flex w-full justify-center items-center my-[64px] ">
                        <div class="w-1/2 mr-3">
                            @if(count($content->images) >0)
                            <img class="h-[400px] w-[600px] object-cover rounded-[20px]" src="{{$content->images[0]->image}}" alt="">
                            @endif
                        </div>
                        <div class="w-1/2">
                            <div class="flex">
                                @if($content->image != null)
                                <img class="w-[48px] h-[48px] object-cover mx-3" src="{{$content->image}}" alt="">
                                @endif
                                <p class="text-[#101828] text-[24px] my-3 font-roboto font-semibold">{{ __($content->title) }}</p>
                            </div>
                            <p class="text-[#667085] text-[16px]">{!! __($content->description) !!}</p>
                        </div>
                        
                        
                    </div>
                  @else
                    <div class="flex w-full justify-center items-center my-[64px] ">
                        <div class="w-1/2 mr-3">
                            <div class="flex">
                                @if($content->image != null)
                                <img class="w-[48px] h-[48px] object-cover mx-3" src="{{$content->image}}" alt="">
                                @endif
                                <p class="text-[#101828] text-[24px] my-3 font-roboto font-semibold">{{ __($content->title) }}</p>
                            </div>
                            <p class="text-[#667085] text-[16px]">{!! __($content->description) !!}</p>
                        </div>
                        <div class="w-1/2">
                            @if(count($content->images) >0)
                            <img class="h-[400px] w-[600px] object-cover rounded-[20px]" src="{{$content->images[0]->image}}" alt="">
                            @endif
                        </div>
                        
                    </div>
                  @endif
                @endforeach
            </div>


        </div>

    </div>
</div>
