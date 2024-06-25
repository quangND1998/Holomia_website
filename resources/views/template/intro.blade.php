
    <div class="section2">
        <div class="container">
            <div class="w-full flex ">
                <div class="text-white w-1/2">
                    <div class="px-3" data-aos="fade-down">
                        <span class="text-font">{{__($section->title)}}</span>
                        <span class="text-base">{!! __($section->description) !!}</span>
                    </div>

                      <button class="btn-our" data-aos="fade-up"> {{__('our-story')}} </button>

                </div>
                <div class="w-1/2">
                    @foreach ($section->contents as $content )
                            <div class="section2-img" data-aos="fade-left">
                        <img loading="lazy" src="{{count($content->images) >0 ? $content->images[0]->image : ''}}" class="img-fluid" alt="">
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
