<div id="form_advise" class="containt6 bg-[#FDF7F7] {{ Request::path() === 'contact' ||  Request::path() === 'thanks_register' ? 'hidden' : ''  }}">
    <div class="lg:w-[80%] title_center  mx-auto lg:flex py-[60px]">
        <div class="lg:w-1/2 lg:mx-10 flex justify-center items-center ">
            <img class="w-full rounded-[10px]" src="images/img.jpg" alt="">
        </div>
        <div class="lg:w-1/2 mx-12 relative my-auto ">
            <p class="text-[#101828] uppercase font-semibold text-[30px] my-2 text-center lg:text-left"> {{ __('tuvanvakiemtra') }}</p>
            <p class="content">
                {!! __('tuvan_description') !!}
            </p>
            <form class="my-8" action="{{ route('advise.store') }}" method="POST"
            enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="my-3">
                    <p class="font-semibold !text-left">{{ __('hoten') }}</p>
                    <input type="text" name="name" class="w-full border border-[#CBD5E0] bg-[#FDF7F7] rounded-[10px]" required>
                </div>
                <div class="my-3">
                    <p class="font-semibold !text-left">{{ __('tuoi') }}</p>
                    <input type="text" name="old" class="w-full border border-[#CBD5E0] bg-[#FDF7F7] rounded-[10px]" required>
                </div>
                <div class="my-3">
                    <p class="font-semibold !text-left">{{ __('phone') }}</p>
                    <input type="number" pattern="[789][0-9]{9}" name="phone" class="w-full border border-[#CBD5E0] bg-[#FDF7F7] rounded-[10px]" required>
                </div>
                <button
                    class="absolute right-0   justify-end items-end text-white my-3 end-2.5  border bg-[#0F197A] font-medium rounded-lg text-sm px-8 py-3 ">
                    {{ __('btn_register') }}
                    <i class="uil uil-arrow-right text-white mx-2 text-[14px]"></i>
                </button>
            </form>

        </div>
    </div>
</div>
