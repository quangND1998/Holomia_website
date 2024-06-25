<div class="content1 relative ">
    @foreach ($section->contents as  $content)
        @if($loop->index == 0)
            @if(count($content->images) >0)
            <img loading="lazy"  class="bg_cover w-full h-[780px] object-cover " src="{{$content->images[0]->image}}" alt="">
            @endif
        <div class=" lg:absolute top-[10%] w-full ">
            <div class="content mx-3 md:ml-[10%] md:w-[80%] lg:ml-[15%] lg:w-[70%] flex">
                    <div class="lg:w-1/2 lg:mr-20">
                        <h1 class="mt-10 font-semibold text_title xl:text-[64px]  lg:text-[54px] md:text-[44px] font-roboto">{{__($content->title)}} <br> <span
                                class="text-[#AD0101]">{!! __($content->sub_title) !!}</span></h1>
                        <p class="my-2">
                            {!! __($content->description) !!}
                        </p>

                        <div class="flex mt-10 items-center justify-center lg:justify-start ">
                            <a type="submit" href="#form_advise"
                                class="text-white  flex justify-center items-center end-2.5 bottom-2.5 bg-[#0F197A] font-medium rounded-lg text-sm px-4 lg:px-8 py-3 ">{{
                                                __('dangkytuvan') }}
                                    {{-- <i class="uil uil-arrow-right text-white mx-2 text-[14px]"></i> --}}
                                    <img loading="lazy"  class="mx-2 fill-white" src="images/Vector.svg" alt="">
                            </a>
                            <a type="submit" href="#form_advise"
                                class="text-[#0F197A] ml-4 end-2.5 bottom-2.5 border border-[#0F197A] font-medium rounded-lg text-sm px-4 lg:px-8 py-3 ">{{
                                                __('kiemtratrinhdo') }} </a>
                        </div>
                    </div>
            </div>

        </div>
        @endif
    @endforeach

</div>
