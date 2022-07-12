
<div class="aboutus2">
        <div class="container">
            
        
            <h1 class="title text-black" data-aos="fade-down"> {{__($section->title)}}</h1>
            <div class="row">
                @foreach ($section->contents as  $content)
                    <div class="aboutus2-left" data-aos="flip-left">
                    <div class="icon-aboutus">
                        <img src="{{$content->image}}" alt="">
                    </div>
                    <div class="content-left">
                        <h5>{{__($content->title)}} </h5>
                        <span class="text-font">{!!__($content->description)!!}</span>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>           
    </div>
