<div class="containt6 bg-[#FDF7F7]">
    <div class="w-[80%]  mx-auto flex py-[60px]">
        <div class="w-1/2 mx-10 flex justify-center items-center ">
            @foreach ($section->contents as $content)
                @if (count($content->images) > 0)
                    <img loading="lazy" class="w-full rounded-[10px]" src="{{$content->images[0]->image}}" alt="">
                @endif
            @endforeach
        </div>
        <div class="w-1/2 mx-16 relative my-auto ">
            <p class="text-[#101828] uppercase font-semibold text-[30px] my-2"> {{ __($section->title) }}</p>
            <p class="content">
                {!! __($section->description) !!}
            </p>
            <form class="my-8">
                <div class="my-3">
                    <p class="font-semibold">Họ tên</p>
                    <input type="text" class="w-full border border-[#CBD5E0] bg-[#FDF7F7] rounded-[10px]">
                </div>
                <div class="my-3">
                    <p class="font-semibold">Tuổi</p>
                    <input type="text" class="w-full border border-[#CBD5E0] bg-[#FDF7F7] rounded-[10px]">
                </div>
                <div class="my-3">
                    <p class="font-semibold">Số điện thoại</p>
                    <input type="text" class="w-full border border-[#CBD5E0] bg-[#FDF7F7] rounded-[10px]">
                </div>
                <button
                    class="absolute right-0   justify-end items-end text-white my-3 end-2.5  border bg-[#0F197A] font-medium rounded-lg text-sm px-8 py-3 ">
                    {{ __('register') }}
                    <i class="uil uil-arrow-right text-white mx-2 text-[14px]"></i>
                </button>
            </form>

        </div>
    </div>
</div>
