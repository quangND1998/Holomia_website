
   <div class="section3">
        <div class="container">
            <div class="row title_section3">
                <h1 class="title" id="title-overview">{{__($section->title)}} </h1>
                <div id="content-overview" style="width:300px">
                    <span class="text-font">{{__($section->sub_title)}}</span>
                </div>
                
            </div>
            <div class="row">
                @foreach ($section->contents as $key => $content )
                    
                    <div class="{{$key %2 ==0 ? 'col-overview-left': 'col-overview-right'}}">
                        <div class="overview" data-aos="fade-down">
                            <img src="{{$content->image}}" class=" img_fluid" alt="">
                            <h4 class="text-black">{{__($content->title)}}</h4>
                            <span class="text-black text-font">{{__($content->sub_title)}}</span>
                        </div>
                        <div class="learn-more" data-aos="fade-right">
                            <a href=""><span class="text-black">learn more </span><i class="fas fa-angle-right icon_learnMore text-black"></i></a>
                        </div>
                        
                    </div>
                @endforeach
            
                {{--  <div class="col-overview-right" >
                    <div class="overview" data-aos="fade-down">
                        <img src="/img/icon-right.webp" class=" img_fluid" alt="">
                        <h4 class="text-black ">Không gian tương tác</h4>
                        <span class="text-black text-font">Holomia xây dựng lớp học ảo, phòng họp ảo</span>
                    </div>
                    <div class="learn-more" data-aos="fade-right">
                        <a href=""><span class="learn text-black">learn more </span><i class="fas fa-angle-right text-black icon_learnMore"></i></a>
                    </div>
                </div>  --}}
            </div>
        </div>
    </div>
