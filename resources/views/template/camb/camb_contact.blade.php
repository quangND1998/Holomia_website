<div class="bg-[#FCF5F6] py-[80px]">
    <div class="w-[90%] lg:w-[80%] mx-auto">
        <div class="w-full flex flex-wrap justify-center mb-[60px] ">
            <p class="text-[#101828] uppercase text-[30px] font-semibold w-full text-center my-[20px]">{{ __($section->title) }}
            </p>
            <p class="text-[#667085]  text-[18px] font-semibold w-full text-center">
                {{ __($section->sub_title) }}</p>
        </div>

        <div class="w-full lg:flex form_contact ">
            <div class="w-full lg:w-1/2">
                <div class="w-full lg:w-[90%]">
                    <div class="bg-white shadow-md rounded-[12px] px-6 py-4 flex  mb-4">
                        <div class="bg-[#a6030325] rounded-full w-[30px] h-[30px] lg:w-[60px] lg:h-[60px] flex items-center justify-center">
                            <i class="uil uil-phone-alt text-[#A60303]  text-[16px] lg:text-[24px]"></i>
                        </div>
                        <div class="mx-2 lg:mx-6">
                            <p class="text-[#101828] text-[16px] lg:text-[24px] font-semibold">{{ __('phone') }}</p>
                            <p class="text-[#667085] text-[14px] lg:text-[16px] ">0336 555 876</p>
                            <p class="text-[#667085] text-[14px] lg:text-[16px] ">0359 719 595</p>
                        </div>
                    </div>
                    <div class="bg-white shadow-md rounded-[12px] px-6 py-4 flex  my-4">
                        <div class="bg-[#a6030325] rounded-full w-[30px] h-[30px] lg:w-[60px] lg:h-[60px] flex items-center justify-center">
                            <i class="uil uil-envelope-alt text-[#A60303]  text-[16px] lg:text-[24px]"></i>
                        </div>
                        <div class="mx-2 lg:mx-6">
                            <p class="text-[#101828] text-[16px] lg:text-[24px] font-semibold">{{ __('Email') }}</p>
                            <p class="text-[#667085] text-[14px] lg:text-[16px] ">ieccambridge21@gmail.com</p>
                        </div>
                    </div>
                    <div class="bg-white shadow-md rounded-[12px] px-6 py-4 flex  my-4">
                        <div class="bg-[#a6030325] rounded-full w-[30px] h-[30px] lg:w-[60px] lg:h-[60px] flex items-center justify-center">
                            <i class="uil uil-map-marker text-[#A60303]  text-[16px] lg:text-[24px]"></i>
                        </div>
                        <div class="mx-2 lg:mx-6">
                            <p class="text-[#101828] text-[16px] lg:text-[24px] font-semibold">{{ __('list_location') }}</p>
                            <p class="text-[#667085] text-[14px] lg:text-[16px] ">CS1: Số 21, ngõ 12, Đào Tấn, Ba Đình, Hà Nội </p>
                            <p class="text-[#667085] text-[14px] lg:text-[16px] ">CS2: 195 Đội Cấn, Ba Đình, Hà Nội</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <div class="w-full lg:w-[80%] bg-white shadow-lg rounded-[12px] px-6 py-6">
                    <form class="w-full" id="contact-form" action="{{ route('contact.store') }}" method="POST"
                        enctype="multipart/form-data" novalidate="novalidate">
                        {{ csrf_field() }}
                        <div class="form-group w-full my-3 {{ $errors->has('name') ? 'has-error' : '' }}">
                            <p class="w-full text-[#101828] font-semibold text-[14px] lg:text-[16px]">{{ __('hoten') }}</p>
                            <input type="text" name="name" id="name" class="border border-[#CBD5E0] rounded-[8px] w-full"
                               >
                            @if ($errors->has('name'))
                                <span class="text-red">
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </span>
                            @endif
                        </div>
                        <div class="form-group  w-full my-3 {{ $errors->has('email') ? 'has-error' : '' }}">
                            <p class="w-full text-[#101828] font-semibold text-[14px] lg:text-[16px]">{{ __('email') }}</p>
                            <input type="text" name="email" id="phone" class="border border-[#CBD5E0] rounded-[8px] w-full"
                               >
                            @if ($errors->has('email'))
                                <span class="text-red">
                                    <p class="text-danger">{{ $errors->first('Email') }}</p>
                                </span>
                            @endif
                        </div>
                        <div class="form-group  w-full my-3 {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <p class="w-full text-[#101828] font-semibold text-[14px] lg:text-[16px]">{{ __('phone') }}</p>
                            <input type="text" name="phone" id="phone" class="border border-[#CBD5E0] rounded-[8px]  w-full"
                                >
                            @if ($errors->has('phone'))
                                <span class="text-red">
                                    <p class="text-danger">{{ $errors->first('phone') }}</p>
                                </span>
                            @endif
                        </div>
                        <div class="form-group  w-full my-3 {{ $errors->has('message') ? 'has-error' : '' }}">
                            <p class="w-full text-[#101828] font-semibold text-[14px] lg:text-[16px]">{{ __('content') }}</p>
                            <textarea class="border border-[#CBD5E0] rounded-[8px]  w-full p-3" name="message" id="message" rows="5"
                                cols="4"></textarea>
                            @if ($errors->has('message'))
                                <span class="text-red">
                                    <p class="text-danger">{{ $errors->first('message') }}</p>
                                </span>
                            @endif
                        </div>
                        <div class="flex justify-center items-center">
                            <button type="submit"
                                class="text-white btn-sub  flex justify-center items-center bg-[#0F197A] font-medium rounded-lg text-sm px-10 py-3 ">{{
                                                __('send') }}
                                    <img loading="lazy" class="mx-2 fill-white" src="images/Vector.svg" alt="">
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
