@extends('landingpage.layout')

@section('title')
    {{ __('Không tìm thấy') }} — Holomia
@endsection

@section('content')
    <div class="container py-5 my-5 text-center">
        <h1 class="display-4 text-dark mb-3">{{ __('Không tìm thấy') }}</h1>
        <p class="lead text-muted mb-4">
            {{ __('Nội dung bạn tìm không tồn tại hoặc chưa được dịch đầy đủ.') }}
        </p>
        <a href="/index" class="btn btn-primary">{{ __('Về trang chủ') }}</a>
    </div>
@endsection
