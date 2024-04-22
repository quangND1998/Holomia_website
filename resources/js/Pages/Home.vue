<template>
    <div>
        <header>
            <div class="nav_header border-b-[1px] border-[#D0D5DD] ">
                <div class="menu-pc">
                    <div
                        class="top_header bg-[#0F197A] h-[48px] text-white py-2 flex flex-wrap justify-end text-center content-center">
                        <div class="flex mx-4">
                            <i class="uil uil-clock text-white mx-2 text-[14px]"></i>
                            <p>08:00 - 21:00</p>
                        </div>
                        <div class="border-r-2 border-[#D0D5DD]"></div>
                        <div class="flex mx-4">
                            <i class="uil uil-envelope-alt text-white mx-2 text-[14px]"></i>
                            <a href=""> Email </a>
                        </div>
                        <div class="border-r-2 border-[#D0D5DD]"></div>
                        <div class="flex mx-4">
                            <i class="uil uil-phone-alt text-white mx-2 text-[14px]"></i>
                            <p>0336 555 876 / 0359 719 595</p>
                        </div>
                        <div class="border-r-2 border-[#D0D5DD]"></div>
                        <ul class="list-language flex mx-4">
                            <li class="menu__item to-left menu-language">
                                <a href="/language/en" class="menu__link menu_news"><img src="images/uk.png"
                                        class="img-fluid logo_language w-6 h-6 mx-2" alt="" />
                                </a>
                            </li>
                            <li class="menu__item to-left menu-language">
                                <a href="/language/vn" class="menu__link menu_news"><img src="images/vn.png"
                                        class="img-fluid logo_language w-6 h-6 mx-2" alt="" />
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div id="nav_sticky"
                        class="menu-content  overlay flex content-center text-center justify-between w-[90%] mx-auto">
                        <div class="logo-menu-pc">
                            <a href="/index"><img src="images/logo.png"
                                    class="logo-holo logo-pc img-fluid w-[240px] xs:w-[120px]" alt="" /></a>
                        </div>
                        <nav class="bg-white border-gray-200 flex content-center text-center">
                            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                                <button data-collapse-toggle="navbar-dropdown" type="button"
                                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                    aria-controls="navbar-dropdown" aria-expanded="false">
                                    <span class="sr-only">Open main menu</span>
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 17 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                                    </svg>
                                </button>
                                <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                                    <ul
                                        class="flex font-roboto flex-col font-semibold p-4 md:p-0 mt-4 text-[#21272A] border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                                        <li>
                                            <a href="#"
                                                class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0"
                                                aria-current="page">{{ __("Home") }}</a>
                                        </li>
                                        <li>
                                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                                                class="flex items-center justify-between font-semibold py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">
                                                {{ __("introduce") }}
                                                <svg class="w-2.5 h-2.5 ms-2.5 mx-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                </svg>
                                            </button>
                                            <!-- Dropdown menu -->
                                            <div id="dropdownNavbar"
                                                class="z-10 hidden font-bold bg-[#D9DFE8] divide-y divide-gray-100 rounded-lg shadow w-54 justify-start text-left">
                                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                                    aria-labelledby="dropdownLargeButton">
                                                    <li>
                                                        <a href="#"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-60">{{
                                                    __("about") }} {{ __("Cambridge IEC") }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">{{
                                                    __("teacher") }}
                                                            {{ __("Cambridge IEC") }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">{{
                                                    __("excellent_student") }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">{{
                                                    __("experiential_activities") }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <button id="dropdownNavbarLink2" data-dropdown-toggle="dropdownNavbar2"
                                                class="flex items-center justify-between font-semibold py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">
                                                {{ __("course") }}
                                                <svg class="w-2.5 h-2.5 ms-2.5 mx-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                </svg>
                                            </button>
                                            <!-- Dropdown menu -->
                                            <div id="dropdownNavbar2"
                                                class="z-10 hidden font-bold bg-[#D9DFE8] divide-y divide-gray-100 rounded-lg shadow w-54 justify-start text-left">
                                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                                    aria-labelledby="dropdownLargeButton">
                                                    <li>
                                                        <a href="#"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-60">{{
                                                    __("about") }} {{ __("Cambridge IEC") }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white">{{
                                                    __("News") }}</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">{{
                                                    __("Contact") }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <div class="search content-center">
                            <form class="max-w-md mx-auto">
                                <div class="relative flex">
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none ml-4">
                                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="search" id="default-search"
                                        class="pl-10 block w-[260px] p-3  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 "
                                        placeholder="Tra cứu thông tin khóa học" required />
                                    <button type="submit"
                                        class="text-white ml-4 end-2.5 bottom-2.5 bg-[#A60303] font-medium rounded-lg text-sm px-8 py-2 ">{{
                                                    __('search') }}</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="content w-full mx-auto">
            <div class="content1 relative ">
                <img class="w-full" src="/images/contents/banner.jpg" alt="">
                <div class=" absolute top-[10%] ">
                    <div class="content ml-[15%] w-[70%] md:ml-[10%] md:w-[80%]  flex">

                        <div class="w-1/2 mr-20">
                            <h1 class="mt-10 font-semibold text-[64px] font-roboto">Học Tiếng Anh cùng <br> <span
                                    class="text-[#A60303]">Cambridge IEC</span></h1>
                            <p>
                                Bạn sẵn sàng chinh phục Tiếng Anh cùng Cambridge IEC chưa?
                                Bạn sẵn sàng chinh phục Tiếng Anh cùng Cambridge IEC chưa?
                                Hãy bắt đầu con đường dẫn đến thành công ngay hôm nay bằng cách đăng ký lớp học phù hợp
                                với
                                mình nào!
                            </p>

                            <div class="flex mt-10">
                                <button type="submit"
                                    class="text-white  end-2.5 bottom-2.5 bg-[#0F197A] font-medium rounded-lg text-sm px-8 py-3 ">{{
                                                    __('dangkytuvan') }} <i
                                        class="uil uil-arrow-right text-white mx-2 text-[14px]"></i></button>
                                <button type="submit"
                                    class="text-[#0F197A] ml-4 end-2.5 bottom-2.5 border border-[#0F197A] font-medium rounded-lg text-sm px-8 py-3 ">{{
                                                    __('kiemtratrinhdo') }} </button>
                            </div>
                            <div class="icon mt-20 flex">
                                <div class="flex mx-3">
                                    <img class="w-[32px] h-[32px]" src="images/Speak.png" alt="">
                                    <p class="mx-2 text-center content-center ">{{ __('tutingiaotiep') }}</p>
                                </div>
                                <div class="flex mx-3">
                                    <img class="w-[32px] h-[32px]" src="images/Briefcase.png" alt="">
                                    <p class="mx-2 text-center content-center ">{{ __('namvungkienthuc') }}</p>
                                </div>
                                <div class="flex mx-3">
                                    <img class="w-[32px] h-[32px]" src="images/idea.png" alt="">
                                    <p class="mx-2 text-center content-center ">{{ __('morongtrithuc') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2 relative">
                            <div
                                class="border border-[#A60303] rounded-[12px] bg-white  flex  items-center px-4 w-[247px] ml-20">
                                <img class="w-[48px] h-[48px] my-4" src="/images/camket.png" alt="">
                                <div class="mx-4">
                                    <p class="text-[#101828] text-[24px] font-semibold">{{ __('camket') }}</p>
                                    <p class="text-[#667085] text-[16px]">{{ __('ketquadaura') }}</p>
                                </div>
                            </div>
                            <div
                                class="mt-40 border border-[#A60303] rounded-[12px] bg-white flex  items-center px-4 w-[267px] ml-40">
                                <img class="w-[48px] h-[48px] my-4" src="/images/giaotrinh.png" alt="">
                                <div class="mx-4">
                                    <p class="text-[#101828] text-[24px] font-semibold">{{ __('giaotrinh') }}</p>
                                    <p class="text-[#667085] text-[16px]">{{ __('chuanquocte') }}</p>
                                </div>
                            </div>
                            <div
                                class=" mt-40 border border-[#A60303] rounded-[12px] bg-white flex  items-center px-4 w-[340px]">
                                <img class="w-[48px] h-[48px] my-4" src="/images/doingu.png" alt="">
                                <div class="mx-4">
                                    <p class="text-[#101828] text-[24px] font-semibold">{{ __('doingu') }}</p>
                                    <p class="text-[#667085] text-[16px]">{{ __('chuyenmon') }}</p>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="absolute bottom-[-80px] w-[90%] mx-[5%]  bg-white rounded-[20px] flex drop-shadow-md">
                    <div class="flex mx-10 my-6 items-center w-1/3 border-r-[1px] ">
                        <img class="w-[120px] h-[120px] object-cover rounded-full" src="/images/1.jpg" alt="">
                        <div class="mx-4">
                            <p class="text-[#101828] text-[24px] font-semibold">{{ __('doingu') }}</p>
                            <p class="text-[#667085] text-[16px]">{{ __('chuyenmon') }}</p>
                        </div>
                    </div>
                    <div class="flex mx-10 my-6 items-center w-1/3 border-r-[1px] ">
                        <img class="w-[120px] h-[120px] object-cover rounded-full" src="/images/1.jpg" alt="">
                        <div class="mx-4">
                            <p class="text-[#101828] text-[24px] font-semibold">{{ __('doingu') }}</p>
                            <p class="text-[#667085] text-[16px]">{{ __('chuyenmon') }}</p>
                        </div>
                    </div>
                    <div class="flex mx-10 my-6 items-center w-1/3 border-r-[1px] ">
                        <img class="w-[120px] h-[120px] object-cover rounded-full" src="/images/1.jpg" alt="">
                        <div class="mx-4">
                            <p class="text-[#101828] text-[24px] font-semibold">{{ __('doingu') }}</p>
                            <p class="text-[#667085] text-[16px]">{{ __('chuyenmon') }}</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="containt2">
                <div class="w-[80%] mt-[200px] mb-[60px] mx-auto flex">
                    <div class="w-1/2 mr-10">
                        <img class="w-full rounded-[10px]" src="images/2.jpg" alt="">
                    </div>
                    <div class="w-1/2">
                        <p class="text-[#0F197A] uppercase font-semibold text-[18px]"> Về chúng tôi </p>
                        <p class="content">
                            CAMBRIDGE IEC ENGLISH CENTRE
                            Thành lập từ năm 2009, Trung tâm đào tạo Tiếng Anh các cấp độ Mầm non - Tiểu học - Trung học
                            - IELTS. Cambridge IEC tự hào khi là đối tác chính thức của IDP và Hội Đồng Anh từ 2010.
                            Trong những năm qua, Cambridge IEC đã trở thành địa chỉ đáng tin cậy giúp các bạn đăng ký
                            thi IELTS trên toàn quốc, đặc biệt là khu vực Hà Nội.
                        </p>
                        <button
                            class="text-[#A60303] my-3 end-2.5 bottom-2.5 border border-[#A60303] font-medium rounded-lg text-sm px-8 py-3 ">
                            {{ __('more') }}
                            <i class="uil uil-arrow-right text-[#A60303] mx-2 text-[14px]"></i>
                        </button>
                        <div class="w-full  flex flex-wrap">
                            <div class="w-1/2 mt-10">
                                <div class="flex items-center my-2">
                                    <img class="w-[48px] h-[48px]" src="/images/light-bulb.png" alt="">
                                    <p class="mx-2 font-semibold text-[24px]">{{ __('tamnhin') }}</p>
                                </div>
                                <p class="text-[#667085] text-[16px]">{{ __("text_tamnhin") }}</p>
                            </div>
                            <div class="w-1/2 mt-10">
                                <div class="flex items-center my-2">
                                    <img class="w-[48px] h-[48px]" src="/images/mission.png" alt="">
                                    <p class="mx-2 font-semibold text-[24px]">{{ __('sumenh') }}</p>
                                </div>
                                <p class="text-[#667085] text-[16px]">{{ __("text_sumenh") }}</p>
                            </div>
                            <div class="w-1/2 mt-10">
                                <div class="flex items-center my-2">
                                    <img class="w-[48px] h-[48px]" src="/images/diamond.png" alt="">
                                    <p class="mx-2 font-semibold text-[24px]">{{ __('giatri') }}</p>
                                </div>
                                <p class="text-[#667085] text-[16px]">{{ __("text_giatri") }}</p>
                            </div>
                            <div class="w-1/2 mt-10">
                                <div class="flex items-center my-2">
                                    <img class="w-[48px] h-[48px]" src="/images/road.png" alt="">
                                    <p class="mx-2 font-semibold text-[24px]">{{ __('road') }}</p>
                                </div>
                                <p class="text-[#667085] text-[16px]">{{ __("text_road") }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="containt3 w-[80%] mx-auto my-[120px]">
                <vue-glide :perView="4" class="">
                    <vue-glide-slide v-for="i in 10" :key="i">
                        <div class="border rounded-[10px]">
                            <img class="w-full" src="images/picture.png" alt="">
                            <div class="m-4">
                                <div class="my-2">
                                    <p class="text-[#0F197A] text-[16px]">Trung học</p>
                                    <p class="text-[#101828] text-[24px]">Khóa học A2 nâng cao</p>
                                    <p class="text-[#667085] text-[16px]">Tham gia khóa học tiếng anh A2 nâng cao của
                                        Cambridge IEC, học viên sẽ được...</p>
                                </div>
                                <a class="text-[#0F62FE] mt-10" href="">Tìm hiểu thêm
                                    <i class="uil uil-arrow-right text-[#0F62FE] mx-2 text-[14px]"></i> </a>
                            </div>

                        </div>
                    </vue-glide-slide>
                    <template slot="control">
                        <button data-glide-dir="<">prev</button>
                        <button data-glide-dir=">">next</button>
                    </template>
                </vue-glide>
            </div>
            <div class="containt5">
                <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4 w-[80%] mx-auto my-[120px]">
                    <div class="rounded-[10px] my-6" v-for="i in 6" :key="i">
                        <img class="rounded-t-[10px] w-full" src="/images/2.jpg" alt="">
                        <div class="bg-[#A60303] relative p-3 rounded-b-[10px]">
                            <p class="text-white uppercase text-[24px]">Nguyễn Vy Khanh</p>
                            <p class="text-white text-[16px]">Lớp 11, THPT...</p>
                            <div
                                class="absolute top-[-45px] right-4 lg:scale-[1] md:right-0 md:scale-[0.7]  sm:scale-[0.6]">
                                <img class="w-[100px] h-[90px]" src="/images/star.png" alt="">
                                <p
                                    class="text-[#E5920E] text-[14px] absolute top-[25px] right-[35px] w-[30px] text-center items-center justify-center font-semibold">
                                    8.0 IELTS</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="containt6 bg-[#FDF7F7]">
                <div class="w-[80%]  mx-auto flex py-[60px]">
                    <div class="w-1/2 mx-10 flex justify-center items-center ">
                        <img class="w-full rounded-[10px]" src="images/img.jpg" alt="">
                    </div>
                    <div class="w-1/2 mx-16 relative my-auto ">
                        <p class="text-[#101828] uppercase font-semibold text-[40px] my-2"> TƯ VẤN VÀ KIỂM TRA MIỄN PHÍ </p>
                        <p class="content">
                            Bạn còn thắc mắc và băn khoăn về các khóa học tại Cambridge IEC? Nhận tư vấn trực tiếp miễn
                            phí từ đội
                            ngũ của Cambridge IEC về lộ trình học phù hợp cho bản thân mình ngay trong hôm nay bằng cách
                            điền thông
                            tin của bạn vào form bên dưới.
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
        </div>

    </div>

</template>

<script>
import Icon from "@/Components/Icon";
import PageModal from "@/Components/Modal/PageModal";
import Layout from "@/Components/Layout2";
import { Link } from "@inertiajs/inertia-vue";
import draggable from "vuedraggable";
import { Glide, GlideSlide } from 'vue-glide-js'
export default {
    layout: Layout,
    components: {
        PageModal,
        Icon,
        Link,
        draggable,
        [Glide.name]: Glide,
        [GlideSlide.name]: GlideSlide,

    },
    props: {
        persons: Object,
        errors: Object,
    },
};
</script>
