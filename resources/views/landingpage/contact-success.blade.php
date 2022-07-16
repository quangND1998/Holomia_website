@extends('landingpage.layout')
@section('content')

        <div class="page_contact">
            <div class="container">
                 @if (session()->has('success'))
                   <h1>{{ session()->get('success') }} !</h1>
                 @endif
               
            </div>
        </div>
@endsection


