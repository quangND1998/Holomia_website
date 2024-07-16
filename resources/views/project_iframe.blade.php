@extends('landingpage.layout')
@section('title', $project->name)
@section('content')
<div class="page_iframe ">
    <iframe src="{{ $project->link }}" class="iframe_item" ></iframe>
</div>
@endsection
@section('javascript')
