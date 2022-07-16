@extends('landingpage.layout')
@section('content')
    @foreach ($page->sections as $key => $section)
           @include($section->theme->link_code)         
    @endforeach

       <div class="page-contact">
        <div class="container">
            <div class="row d-block">
                <h1 class="title text-center">{{__('contact_us')}}</h1>
                <div class="icon-contact text-center pt-4">
                    <a href="https://www.facebook.com/search/top?q=holomia" class="pr-4"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.youtube.com/results?search_query=holomia" class="pr-4"><i class="fab fa-youtube"></i></a>
                    <a href="" class="pr-4"><i class="fab fa-instagram-square"></i></a>
                </div>
                <div class="text-center pt-4">
                    <span>{{__('company-email')}}</span>
                </div>               
            </div>
            <div class="form_contact ">
                <form id="contact-form" action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data" novalidate="novalidate">   
                        {{ csrf_field() }}       
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Your Name">
                          @if ($errors->has('name'))
                            <span class="text-red">
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </span>
                        @endif
                    </div>   
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input type="text" name="email" id="phone" class="form-control" placeholder="Your Email Address">
                        @if ($errors->has('email'))
                            <span class="text-red">
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </span>
                        @endif
                    </div>   
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone Number">
                          @if ($errors->has('phone'))
                            <span class="text-red">
                                <p class="text-danger">{{ $errors->first('phone') }}</p>
                            </span>
                        @endif
                    </div>                        
                    <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                        <textarea class="form-control" name="message" id="message" placeholder="Type your mesage here.." rows="5" cols="4"></textarea>
                           @if ($errors->has('message'))
                            <span class="text-red">
                                <p class="text-danger">{{ $errors->first('message') }}</p>
                            </span>
                            @endif
                    </div>  
                    <div style="text-align:center">
                        <button type="submit" class=" btn-sub text-uppercase" >Submit</button>      
                    </div> 
                                      
                </form>
            </div>
        </div>
    </div>
@endsection