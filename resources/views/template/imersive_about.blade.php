 <div class="container">
                <div class="row">
                    <div class="immersive-img">
                        {{--  <video autoplay="" muted="" loop="" id="Video">
                            <source src="/img/event.mp4" type="video/mp4">
                            
                        </video>  --}}
                        <iframe class="video_cover" src="https://www.youtube.com/embed/{{count($section->contents) >0 ? $section->contents[0]->video :''}}?autoplay=1&amp;mute=1&amp;enablejsapi=1&loop=1&playlist={{count($section->contents) >0 ? $section->contents[0]->video :''}}" allowfullscreen=""></iframe>
                        {{--  <iframe  id="Video" src="https://www.youtube.com/embed/{{count($section->contents) >0 ? $section->contents[0]->video :''}}?&autoplay=1&loop=1&rel=0&showinfo=0&color=white&iv_load_policy=3&playlist={{count($section->contents) >0 ? $section->contents[0]->video :''}}" allowfullscreen="" ></iframe>  --}}
                    </div>
                    <div class="immersive-content">
                        <div class=" text-immersive">
                            <a href="../page/item-immersive.html"><h5>{{__($section->title)}}</h5></a>
                            <span class="text-font">{!!__($section->description)!!}
                               
                                </span>
                        </div>
                        
                    </div>
                </div>
                
</div>