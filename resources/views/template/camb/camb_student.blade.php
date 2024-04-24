<div id="content"  >
    <div class="my-[80px]">
        <div class="w-full">
            <div class="flex flex-wrap  w-[70%] text-center mx-auto justify-center">
                <p class="text-[#101F73] uppercase text-[18px] font-semibold w-full text-center">{{ __($section->title) }}</p>
                <p class="text-[#101828] uppercase text-[40px] font-semibold w-full text-center">{{ __($section->sub_title) }}</p>
                <p class="text-[#667085] text-[16px] text-center"> {!! __($section->description) !!} </p>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4 w-[80%] mx-auto my-[10px]">
                @foreach ($students as $student)
                <div class="rounded-[10px] my-6" >
                    <img class="rounded-t-[10px] w-full h-[400px]  object-cover" src="{{ $student->image }}" alt="">
                    <div class="bg-[#A60303] relative p-4 rounded-b-[10px]">
                        <p class="text-white uppercase text-[24px] font-roboto">{{ $student->name }}</p>
                        <p class="text-white text-[16px]">{{ __($student->description) }}</p>
                        @if($student->score != null)
                        <div
                            class="absolute top-[-45px] right-4 lg:scale-[1] md:right-0 md:scale-[0.7]  sm:scale-[0.6]">
                            <img class="w-[100px] h-[90px]" src="/images/star.png" alt="">
                            <p
                                class="text-[#E5920E] text-[14px] absolute top-[25px] right-[35px] w-[30px] text-center items-center justify-center font-semibold">
                                {{ $student->score }} IELTS</p>
                        </div>
                        @endif

                    </div>
                </div>
                @endforeach
                
            </div>

        </div>
        {{-- <div class="w-full flex justify-center items-center ">
            <button type="submit"
                class="text-white  flex justify-center items-center  bg-[#A60303] font-medium rounded-lg text-sm px-[28px] py-[16px] w-[240px] ">{{
                                __('xemthemkhoahoc') }}
            </button>
        </div> --}}

    </div>
</div>
