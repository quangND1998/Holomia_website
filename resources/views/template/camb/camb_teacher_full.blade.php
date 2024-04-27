<div id="content"  >
    <div class="my-[120px]">
        <div class="w-full">
            <div class="w-full flex flex-wrap   justify-center my-[60px]">
                <p class="text-[#101F73] uppercase text-[18px] font-semibold w-full text-center">{{ __($section->title) }}</p>
                <p class="text-[#101828] uppercase text-[30px] font-semibold w-full text-center">{{ __($section->sub_title) }}</p>
                <p class="text-[#667085] text-[16px] w-full text-center"> {!! __($section->description) !!} </p>
            </div>
            <div class="grid gap-x-8 gap-y-4 grid-cols-4 w-[80%] mx-auto">
                @foreach ($teachers as $teacher)

                <div class=" border rounded-[10px] my-2 hover:-translate-y-1 hover:scale-110 relative">
                    @if($teacher->image != null)
                    <img class="w-full h-[460px] object-cover " src="{{ $teacher->image }}" alt="">
                    @endif
                    <div class="absolute w-full bottom-0 items-center text-center p-4 bg-gradient-to-b from-[#00000000] to-[#000000]">
                        <p class="text-[#FFFFFF] uppercase text-[24px]">{{ $teacher->name }}</p>
                        <p class="text-[#FFFFFF] text-[16px]">{{ __($teacher->description) }}</p>
                    </div>

                </div>
                @endforeach
                
                
            </div>
            <div class="w-full">
                {{ $teachers->links('landingpage.page') }}
            </div>

        </div>

    </div>
</div>
