<div class="our-team">
    <div class="container">
        <h1 class="title ">our team</h1>
        <div class="row row-team ">
        @foreach ($section->contents as $content )
                <div class="item-team " data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">
                    <div class="row img-team">
                        <img loading="lazy" src="{{$content->images[0]->image}}" class="avt-team" alt="">
                    </div>

                    <div class="name-team">
                        <h5>{{__($content->title)}}</h5>
                        <span>{{__($content->sub_title)}}</span>
                    </div>

                </div>

        @endforeach
    </div>

</div>


</div>
