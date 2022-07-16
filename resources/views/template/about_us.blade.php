@foreach ($section->contents as $content )
    <div class="about-us">
        <div class="container-fluid">
            <div class="main-about">
                <div class="background-aboutus"  style="background-image: url({{count($content->images) >0 ? $content->images[0]->image : ''}})"></div>
                <div class="row content-aboutus">
                    <h1 class="title">{{__($section->title)}}</h1>
                </div>
            </div>
        </div>
</div>
@endforeach
