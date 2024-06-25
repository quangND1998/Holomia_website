    <footer class="bg-[#101F73] px-3 lg:px-[80px]">

        <div class="lg:flex justify-between pt-[48px]">
            <div class=" pb-[48px] lg:pb-2 lg:m-3">
                <img loading="lazy" class="h-[80px] w-[120px] bg-white" src="images/logo.png" alt="">
            </div>

            <div class="search content-center">
                <form class="max-w-md mx-auto">
                    <div class="relative flex">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none ml-2">
                            <i class="uil uil-phone text-[#636060]"></i>
                        </div>
                        <input type="search" id="default-search"
                            class="pl-10 block w-[480px] px-6 py-3  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 "
                            placeholder="Nhập số điện thoại của bạn" required />
                        <button type="submit"
                            class="show_pc w-[400px] text-white ml-4  bg-[#AD0101] font-medium rounded-lg text-sm  py-2 ">{{ __('dangkytuvan') }}</button>

                            <button type="submit"
                            class="show_mobile text-white ml-4  bg-[#AD0101] font-medium rounded-lg text-sm p-3 "><i class="uil uil-envelope-download text-white text-[20px]"></i></button>
                    </div>

                </form>
            </div>
        </div>
        <div class="lg:flex mx-2  my-[40px] py-[60px] border-t-[1px] border-b-[1px]">
            <div class="lg:w-1/4 py-6">
                <p class="text-[#FFFFFF] text-[24px] my-3">Cambridge IEC Engpsh Centre</p>
                <p class="text-[#FFFFFF] text-[16px] my-2">CS1: Số 21, ngõ 12, Đào Tấn, Ba Đình, Hà Nội </p>
                <p class="text-[#FFFFFF] text-[16px]">CS2: 195 Đội Cấn, Ba Đình, Hà Nội </p>
            </div>
            <div class="lg:w-1/4 py-6">
                <a href="about/about_cammbridge">
                    <p class="text-[#FFFFFF] text-[24px] my-3">{{ __('aboutus') }}</p>
                </a>
                <a href="about/about_cammbridge">
                    <p class="text-[#FFFFFF] text-[16px] my-2">{{ __('gioithieu') }} </p>
                </a>
                <a href="about/teacher_cammbridge">
                    <p class="text-[#FFFFFF] text-[16px] my-2">{{ __('teacher') }}</p>
                </a>
                <a href="about/student">
                    <p class="text-[#FFFFFF] text-[16px] my-2">{{ __('excellent_student') }} </p>
                </a>
                <a href="about/activity">
                    <p class="text-[#FFFFFF] text-[16px] my-2">{{ __('experiential_activities') }}</p>
                </a>

            </div>
            <div class="lg:w-1/4 py-6">
                <a href="about/about_cammbridge">
                    <p class="text-[#FFFFFF] text-[24px] my-3">{{ __('Course') }}</p>
                </a>
                @foreach ($category_courses as $category)
                    <p
                        class="w-[200px]  my-2 {{ Request::get('category_name') == $category->slug ? 'text-white bg-[#101F73] rounded-[4px]' : 'border-r-[1px] border-[#101f7380]' }}">
                        <a href="list_course?category_name={{ $category->slug }}"
                            class="text-[#FFFFFF] text-[16px]">
                            {{ __($category->slug) }}</a>
                    </p>
                @endforeach

            </div>
            <div class="lg:w-1/4 py-6">
                <p class="text-[#FFFFFF] text-[24px] my-3">{{ __('social_network') }}</p>

                <div class="icon flex">
                    <a href="https://www.facebook.com/cambridgeiec" class="mr-[16px]" aria-label="linkk facebook">
                        <img loading="lazy" class="h-[24px] w-[24px]" src="images/facebook.png" alt="facebook">
                    </a>
                    <a href="https://www.tiktok.com/@cambridgeiec" class="mr-[16px]" aria-label="linkk tiktok">
                        <img loading="lazy" class="h-[24px] w-[24px]" src="images/tiktok.png" alt="tiktok">
                    </a>
                    <a href="about_cammbridge" class="mr-[16px]" aria-label="linkk youtube">
                        <img loading="lazy" class="h-[24px] w-[24px]" src="images/youtube.png" alt="youtube">
                    </a>
                </div>

            </div>
        </div>
        <div class=" pb-[40px] ">
            <p class="text-[#FFFFFF] text-[16px] my-2">{{ __('copyright') }}</p>
        </div>
    </footer>
