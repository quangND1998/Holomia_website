<div id="form_advise" class="containt6 bg-[#FDF7F7] {{ Request::path() === 'contact' ? 'hidden' : ''  }}">
    <div class="w-[80%]  mx-auto flex py-[60px]">
        <div class="w-1/2 mx-10 flex justify-center items-center ">
            <img class="w-full rounded-[10px]" src="images/img.jpg" alt="">
        </div>
        <div class="w-1/2 mx-12 relative my-auto ">
            <p class="text-[#101828] uppercase font-semibold text-[30px] my-2"> {{ __('tuvanvakiemtra') }}</p>
            <p class="content">
                {!! __('tuvan_description') !!}
            </p>
            <form class="my-8" action="{{ route('advise.store') }}" method="POST"
            enctype="multipart/form-data">
            {{ csrf_field() }}  
                <div class="my-3">
                    <p class="font-semibold">{{ __('hoten') }}</p>
                    <input type="text" name="name" class="w-full border border-[#CBD5E0] bg-[#FDF7F7] rounded-[10px]">
                </div>
                <div class="my-3">
                    <p class="font-semibold">{{ __('tuoi') }}</p>
                    <input type="text" name="old" class="w-full border border-[#CBD5E0] bg-[#FDF7F7] rounded-[10px]">
                </div>
                <div class="my-3">
                    <p class="font-semibold">{{ __('phone') }}</p>
                    <input type="text" name="phone" class="w-full border border-[#CBD5E0] bg-[#FDF7F7] rounded-[10px]">
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
