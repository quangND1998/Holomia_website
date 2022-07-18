@foreach ($section->contents as $content )
    <div class="about-us">
        <div class="container-fluid">
            <div class="main-about">
                <div class="background-aboutus"  style="background-image: url({{count($content->images) >0 ? $content->images[0]->image : ''}})"></div>
                <div class="row content-aboutus">
                    <div class="col-lg-12 single_page_contact">
                        <h1 class="title text-center">{{__($section->title)}}</h1>
                        <div class="icon-contact text-center pt-4">
                            <a href="https://www.facebook.com/search/top?q=holomia" class="pr-4"><i class="fab fa-facebook"></i></a>
                            <a href="https://www.youtube.com/results?search_query=holomia" class="pr-4"><i class="fab fa-youtube"></i></a>
                            <a href="" class="pr-4"><i class="fab fa-instagram-square"></i></a>
                        </div>
                        <div class="text-center pt-4">
                            <span>{{__('company-email')}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endforeach
