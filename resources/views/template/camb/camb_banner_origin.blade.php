<div class="content1 relative ">
    @foreach ($section->contents as  $content)
        @if($loop->index == 0)
            @if(count($content->images) >0)
            <img class="w-full h-[780px] object-cover " src="{{$content->images[0]->image}}" alt="">
            @endif
        <div class=" absolute top-[10%] w-full ">
            <div class="content ml-[15%] w-[70%] md:ml-[10%] md:w-[80%]  flex">
                    <div class="w-1/2 mr-20">
                        <h1 class="mt-10 font-semibold xl:text-[64px]  lg:text-[54px] md:text-[44px] font-roboto">{{__($content->title)}} <br> <span
                                class="text-[#AD0101]">{!! __($content->sub_title) !!}</span></h1>
                        <p class="my-2">
                            {!! __($content->description) !!}
                        </p>

                        <div class="flex mt-10">
                            <button type="submit"
                                class="text-white  flex justify-center items-center end-2.5 bottom-2.5 bg-[#0F197A] font-medium rounded-lg text-sm px-8 py-3 ">{{
                                                __('dangkytuvan') }}
                                    {{-- <i class="uil uil-arrow-right text-white mx-2 text-[14px]"></i> --}}
                                    <img class="mx-2 fill-white" src="images/Vector.svg" alt="">
                            </button>
                            <button type="submit"
                                class="text-[#0F197A] ml-4 end-2.5 bottom-2.5 border border-[#0F197A] font-medium rounded-lg text-sm px-8 py-3 ">{{
                                                __('kiemtratrinhdo') }} </button>
                        </div>
                    </div>
            </div>

        </div>
        @endif
    @endforeach

</div>
