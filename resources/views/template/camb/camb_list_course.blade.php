<div class="content my-[60px]">
    <div class="category w-[80%] mx-auto">
        <ul class="w-full flex">
            <li
                class="w-[135px]  py-3  text-center {{ Request::get('category_name') == 'all' ? 'text-white bg-[#101F73] rounded-[4px]' : 'border-r-[1px] border-[#101f7380]' }}">
                <a href="list_course?category_name=all">{{ __('all') }}</a>
            </li>
            @foreach ($category_courses as $category)
                <li
                    class=" w-[135px] font-semibold py-3  text-center {{ Request::get('category_name') == $category->slug ? 'text-white bg-[#101F73] rounded-[4px]' : 'text-[#667085] border-r-[1px] border-[#101f7380]' }}">
                    <a href="list_course?category_name={{ $category->slug }}">{{ __($category->slug) }}</a>
                </li>
            @endforeach
        </ul>
        <div class="w-full grid grid-cols-4 gap-4 my-[60px]">
            @foreach ($courses as $course)
                <div
                    class="  transition ease-in-out border rounded-[10px]  hover:-translate-y-1 hover:scale-110  duration-300 min-h-[430px]">
                    <a href="list_course/{{ __($course->slug) }}">
                        @if ($course->image != null)
                            <img class="w-full h-[200px] rounded-t-[10px] object-cover" src="{{ $course->image }}"
                                alt="">
                        @endif
                        <div class="m-4">
                            <div class="my-2 ">
                                <p class="text-[#101F73] text-[16px] font-semibold ">{{ __($course->category->slug) }}
                                </p>
                                <p class="text-[#101828] text-[24px] font-semibold my-2">{{ __($course->title) }}</p>
                                <p class="text-[#667085] text-[16px]  line-clamp-2">{!! __($course->sub_title) !!}</p>
                            </div>
                            <div class="flex">
                                <i class="uil uil-clock text-black"></i>
                                <p class="mx-2">{{ __($course->time) }} {{ __('month') }}</p>
                            </div>
                            <div class="flex">
                                <i class="uil uil-users-alt text-black"></i>
                                <p class="mx-2">{{ $course->number_student }} {{ __('hocviendahoc') }}</p>
                            </div>
                            <div class="flex">
                                <i class="uil uil-money-bill text-black"></i>
                                <p class="mx-2">{{ $course->price }} VNĐ</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="w-full">
            {{ $courses->links('landingpage.page') }}
        </div>
    </div>
</div>