    <footer class="bg-[#101F73] px-3 lg:px-[80px]">

        <div class="lg:flex justify-between pt-[48px]">
            <div class=" pb-[48px] lg:pb-2 lg:m-3">
                <img class="h-[80px] bg-white" src="images/logo.png" alt="">
            </div>

            <div class="search content-center">
                <form class="max-w-md mx-auto">
                    <div class="relative flex">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none ml-2">
                            <svg class="w-8 h-8 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" id="envelope-alt">
                                <path fill="#667085"
                                    d="M19,4H5A3,3,0,0,0,2,7V17a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V7A3,3,0,0,0,19,4ZM5,6H19a1,1,0,0,1,1,1l-8,4.88L4,7A1,1,0,0,1,5,6ZM20,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V9.28l7.48,4.57a1,1,0,0,0,1,0L20,9.28Z">
                                </path>
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="pl-14 block w-[400px] px-6 py-3  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 "
                            placeholder="Nhập email của bạn để nhận tin tức mới nhất" required />
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
                    <a href="https://www.facebook.com/cambridgeiec" class="mr-[16px]">
                        <img class="h-[24px] w-[24px]" src="images/facebook.png">
                    </a>
                    <a href="https://www.tiktok.com/@cambridgeiec" class="mr-[16px]">
                        <img class="h-[24px] w-[24px]" src="images/tiktok.png">
                    </a>
                    <a href="about_cammbridge" class="mr-[16px]">
                        <img class="h-[24px] w-[24px]" src="images/youtube.png">
                    </a>
                </div>

            </div>
        </div>
        <div class=" pb-[40px] ">
            <p class="text-[#FFFFFF] text-[16px] my-2">{{ __('copyright') }}</p>
        </div>
    </footer>
