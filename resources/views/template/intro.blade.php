
    <div class="section2">
        <div class="container">
            <div class="w-full flex flex-col mt-4">
                <div class="col-text w-1/2">
                    <div class="text" data-aos="fade-down">
                        <span class="text-font">{{__($section->title)}}</span>
                    </div>
                    <div class="text" data-aos="fade-down">
                        <span class="text-base">{!! __($section->description) !!}</span>
                    </div>
                    <div class="flex">
                        <button class="btn-our" data-aos="fade-up"> {{__('dangkytuvan')}} </button>
                        <button class="btn-our" data-aos="fade-up"> {{__('kiemtratrinhdo')}} </button>
                    </div>


                </div>
                <div class="w-1/2">
                    @foreach ($section->contents as $content )
                        <div class="w-full section2-img" data-aos="fade-left">
                            <img src="{{count($content->images) >0 ? $content->images[0]->image : ''}}" class="img-fluid" alt="">
                        </div>
                    @endforeach
                </div>



            </div>

        </div>
    </div>
