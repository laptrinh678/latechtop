@extends('frontend.index')
@section('title')
Error
@endsection('title')
@section('meta')
    <meta name="keywords" itemprop="keywords" content="Công ty TNHH LATECH">
    <meta name="description" content="{{ $imfomation->text_seo }}">
    <base href="{{ url('/') }}:443" target="_self">
    <link rel="icon" href="{{ url('public/backend') }}/{{ $imfomation->logo }}">
    <meta property="og:title" content="{{ $imfomation->text_seo }}">
    <meta property="og:type" content="website">
@endsection('meta')
@section('content')
<br><br>
<h3 class="text-center">Có lỗi xảy ra vui lòng quay lại trang chủ <a href="{{url('/') }}">Trang chủ</a></h3>
<br><br>
@endsection('content')