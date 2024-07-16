
    <div class="section2">
        <div class="container">
            <div class="row">
                <div class="col-text">
                    <div class="text" data-aos="fade-down">
                        <span class="text-font">{{__($section->title)}}</span>
                    </div>
                    
                      <button class="btn-our" data-aos="fade-up"> {{__('our-story')}} </button>
               
                </div>
                @foreach ($section->contents as $content )
                       <div class="section2-img" data-aos="fade-left">
                    <img src="{{count($content->images) >0 ? $content->images[0]->image : ''}}" class="img-fluid" alt="">
                </div>
                @endforeach
             
               
            </div>
            
        </div>
    </div>
