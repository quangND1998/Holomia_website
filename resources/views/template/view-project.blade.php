<div class="view-project">
    <div class="container-fluid">
        @foreach ($section->contents as  $content)
        <div class="main-view1">
            <div class="background-game" style="background-image: url({{count($content->images) >0 ? $content->images[0]->image : ''}});"></div>
            <div class="row view-content1" >
                <h1 class="title" data-aos="fade-down" >{{__($content->title)}}</h1>
                <span class="text-font"  style="color: rgba(255, 255, 255, 0.7) ; padding-top:1rem">{!!__($content->description)!!}</span>
                <div class="view ">
                    <a  class=" " href="">
                        <span >View Project </span><i class="fas fa-arrow-right icon-view"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
     
       
    </div>
</div>