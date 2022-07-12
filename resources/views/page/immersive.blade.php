@extends('landingpage.layout')
@section('content')
 <div class="immersive-activities">
        <div class="container-fluid">
            @foreach ($page->sections as $key => $section)
                     @include($section->theme->link_code)         
             @endforeach 
            <div class=" row holo-event" style="padding:0">
                <div class="container">
                    <div class="row">
                        <div class="title-event-join ">
                            <h1 style="color:black" class="title">Holomia event to join</h1>
                        </div>

                        <div class=" d-flex">
                            <div class="row content-event-join">
                                <div class="item-event-join">
                                    <div class="item-img">
                                        <img src="/img/1.jpg" class="img-fluid img-event" alt="">
                                    </div>
                                    
                                    <div class="content-item">
                                        <span class="d-block time-event">Dec, 20,2022 - 10 min</span>
                                        <a href="/item-immersive.html" target="_blank" class="title-event"><span class="d-block text-font ">Lễ trao giải Bùi Xuân Thái với dự án Tái lập kiến trúc chùa Diên Hựu - Một cột bằng công nghệ thực tế ảo</span></a>
                                       
                                    </div> 
                                    <hr >  
                                    <div class="icon-event d-flex">
                                        <div class="w-50">
                                            <a href=""><i class="fas fa-eye pr-2"></i>4</a>
                                            <a href="" class="pl-4"><i class="fas fa-comment-alt pr-2"></i>0</a>
                                        </div>               
                                        <div class="w-50 icon-heart-event" >
                                            <a href="">8<i class="fas fa-heart pl-2"></i></a>
                                        </div>
                                    </div>                   
                                </div>
                                <div class="item-event-join">
                                    <div class="item-img">
                                        <img src="/img/7.jpg" class="img-fluid img-event" alt="">
                                    </div>
                                    
                                    <div class="content-item">
                                        <span class="d-block time-event">Dec, 20,2022 - 10 min</span>
                                        <a href="../page/item-immersive.html" target="_blank" class="title-event"><span class="d-block text-font">Lễ trao giải Bùi Xuân Thái với dự án Tái lập kiến trúc chùa Diên Hựu - Một cột bằng công nghệ thực tế ảo</span></a>
                                        <!-- <span>Dự án đã được đề cử giải Ý tưởng - Vì tình yêu HN của giải thưởng Bùi Xuân Thái - Vì tình yêu HN lần thứ 14-2021...</span> -->
                                    </div> 
                                    <hr >  
                                    <div class="icon-event d-flex">
                                        <div class="w-50">
                                            <a href=""><i class="fas fa-eye pr-2"></i>44</a>
                                            <a href="" class="pl-4"><i class="fas fa-comment-alt pr-2"></i>10</a>
                                        </div>               
                                        <div class="w-50 icon-heart-event" >
                                            <a href="">61<i class="fas fa-heart pl-2"></i></a>
                                        </div>
                                    </div>                   
                                </div>
                                <div class="item-event-join">
                                    <div class="item-img">
                                        <img src="/img/99.jpg" class="img-fluid img-event" alt="">
                                    </div>
                                    
                                    <div class="content-item">
                                        <span class="d-block time-event">Dec, 20,2022 - 10 min</span>
                                        <a href="../page/item-immersive.html" target="_blank" class="title-event"><span class="d-block text-font">Lễ trao giải Bùi Xuân Thái với dự án Tái lập kiến trúc chùa Diên Hựu - Một cột bằng công nghệ thực tế ảo</span></a>
                                        
                                    </div> 
                                    <hr >  
                                    <div class="icon-event d-flex">
                                        <div class="w-50">
                                            <a href=""><i class="fas fa-eye pr-2"></i>14</a>
                                            <a href="" class="pl-4"><i class="fas fa-comment-alt pr-2"></i>11</a>
                                        </div>               
                                        <div class="w-50 icon-heart-event" >
                                            <a href="">16<i class="fas fa-heart pl-2"></i></a>
                                        </div>
                                    </div>                   
                                </div>
                                <div class="item-event-join">
                                    <div class="item-img">
                                        <img src="/img/95.jpg" class="img-fluid img-event" alt="">
                                    </div>
                                    
                                    <div class="content-item">
                                        <span class="d-block time-event">Dec, 20,2022 - 10 min</span>
                                        <a href="../page/item-immersive.html" target="_blank" class="title-event"><span class="d-block text-font">Lễ trao giải Bùi Xuân Thái với dự án Tái lập kiến trúc chùa Diên Hựu - Một cột bằng công nghệ thực tế ảo</span></a>
                                        
                                    </div> 
                                    <hr >  
                                    <div class="icon-event d-flex">
                                        <div class="w-50">
                                            <a href=""><i class="fas fa-eye pr-2"></i>24</a>
                                            <a href="" class="pl-4"><i class="fas fa-comment-alt pr-2"></i>32</a>
                                        </div>               
                                        <div class="w-50 icon-heart-event" >
                                            <a href="">9<i class="fas fa-heart pl-2"></i></a>
                                        </div>
                                    </div>                   
                                </div>
                                <div class="item-event-join">
                                    <div class="item-img">
                                        <img src="/img/97.jpg" class="img-fluid img-event" alt="">
                                    </div>
                                    
                                    <div class="content-item">
                                        <span class="d-block time-event">Dec, 20,2022 - 10 min</span>
                                        <a href="../page/item-immersive.html" target="_blank" class="title-event"><span class="d-block text-font">Lễ trao giải Bùi Xuân Thái với dự án Tái lập kiến trúc chùa Diên Hựu - Một cột bằng công nghệ thực tế ảo</span></a>
                                        
                                    </div> 
                                    <hr >  
                                    <div class="icon-event d-flex">
                                        <div class="w-50">
                                            <a href=""><i class="fas fa-eye pr-2"></i>56</a>
                                            <a href="" class="pl-4"><i class="fas fa-comment-alt pr-2"></i>11</a>
                                        </div>               
                                        <div class="w-50 icon-heart-event" >
                                            <a href="">45<i class="fas fa-heart pl-2"></i></a>
                                        </div>
                                    </div>                   
                                </div>
                                <div class="item-event-join">
                                    <div class="item-img">
                                        <img src="/img/97.jpg" class="img-fluid img-event" alt="">
                                    </div>
                                    
                                    <div class="content-item">
                                        <span class="d-block time-event">Dec, 20,2022 - 10 min</span>
                                        <a href="../page/item-immersive.html" target="_blank" class="title-event"><span class="d-block text-font">Lễ trao giải Bùi Xuân Thái với dự án Tái lập kiến trúc chùa Diên Hựu - Một cột bằng công nghệ thực tế ảo</span></a>
                                       
                                    </div> 
                                    <hr >  
                                    <div class="icon-event d-flex">
                                        <div class="w-50">
                                            <a href=""><i class="fas fa-eye pr-2"></i>48</a>
                                            <a href="" class="pl-4"><i class="fas fa-comment-alt pr-2"></i>101</a>
                                        </div>               
                                        <div class="w-50 icon-heart-event" >
                                            <a href="">67<i class="fas fa-heart pl-2"></i></a>
                                        </div>
                                    </div>                   
                                </div>
                                <div class="item-event-join collapse" id="hidden">
                                    <div class="item-img">
                                        <img src="/img/97.jpg" class="img-fluid img-event" alt="">
                                    </div>
                                    
                                    <div class="content-item">
                                        <span class="d-block time-event">Dec, 20,2022 - 10 min</span>
                                         <a href="../page/item-immersive.html" target="_blank" class="title-event"><span class="d-block text-font">Lễ trao giải Bùi Xuân Thái với dự án Tái lập kiến trúc chùa Diên Hựu - Một cột bằng công nghệ thực tế ảo</span></a>
                                        
                                    </div> 
                                    <hr >  
                                    <div class="icon-event d-flex">
                                        <div class="w-50">
                                            <a href=""><i class="fas fa-eye pr-2"></i>74</a>
                                            <a href="" class="pl-4"><i class="fas fa-comment-alt pr-2"></i>90</a>
                                        </div>               
                                        <div class="w-50 icon-heart-event" >
                                            <a href="">16<i class="fas fa-heart pl-2"></i></a>
                                        </div>
                                    </div>                   
                                </div>
                                <div class="item-event-join collapse" id="hidden">
                                    <div class="item-img">
                                        <img src="/img/97.jpg" class="img-fluid img-event" alt="">
                                    </div>
                                    
                                    <div class="content-item">
                                        <span class="d-block time-event">Dec, 20,2022 - 10 min</span>
                                         <a href="../page/item-immersive.html" target="_blank" class="title-event"><span class="d-block text-font">Lễ trao giải Bùi Xuân Thái với dự án Tái lập kiến trúc chùa Diên Hựu - Một cột bằng công nghệ thực tế ảo</span></a> 
        
                                    </div> 
                                    <hr >  
                                    <div class="icon-event d-flex">
                                        <div class="w-50">
                                            <a href=""><i class="fas fa-eye pr-2"></i>74</a>
                                            <a href="" class="pl-4"><i class="fas fa-comment-alt pr-2"></i>90</a>
                                        </div>               
                                        <div class="w-50 icon-heart-event" >
                                            <a href="">16<i class="fas fa-heart pl-2"></i></a>
                                        </div>
                                    </div>                   
                                </div>
                                <div class="item-event-join collapse" id="hidden">
                                    <div class="item-img">
                                        <img src="/img/97.jpg" class="img-fluid img-event" alt="">
                                    </div>
                                    
                                    <div class="content-item">
                                        <span class="d-block time-event">Dec, 20,2022 - 10 min</span>
                                         <a href="../page/item-immersive.html" target="_blank" class="title-event"><span class="d-block text-font">Lễ trao giải Bùi Xuân Thái với dự án Tái lập kiến trúc chùa Diên Hựu - Một cột bằng công nghệ thực tế ảo</span></a> 
                                    </div> 
                                    <hr >  
                                    <div class="icon-event d-flex">
                                        <div class="w-50">
                                            <a href=""><i class="fas fa-eye pr-2"></i>74</a>
                                            <a href="" class="pl-4"><i class="fas fa-comment-alt pr-2"></i>90</a>
                                        </div>               
                                        <div class="w-50 icon-heart-event" >
                                            <a href="">16<i class="fas fa-heart pl-2"></i></a>
                                        </div>
                                    </div>                   
                                </div>
                            </div>    
                                          
                        </div> 
                        <div class="event-readmore">
                            <a href="#hidden"  aria-expanded="false" data-toggle="collapse" class="btn-event-readmore btn-readmore"> Read More</a>
                        </div>
                    
                    </div>
                    <!-- <div class="row">
                        
                    </div> -->
                </div>
            </div>       
        </div>
        
    </div>

@endsection