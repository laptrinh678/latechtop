@extends('noithat.master.index')
@section('title')
 {{$data->name}}
@endsection('title')
@section('meta')
<link rel="canonical" href="{{url("$data->slug.html")}}" />
<meta property="og:image" content="{{url('public/backend/')}}/{{$data->icon}}" />
@endsection('meta')
@section('style')
<link rel="stylesheet" href="{{url('public/noithat')}}/css/detail_new.css">
@endsection('style')
@section('content')
<div class="container detail">
<div class="row content">
    <div class="col-sm-4 sidenav">
      <ul class="nav">
        <li class="bgFull fw-bold colorWhite fontWeightBold"><i class="fa fa-bars" aria-hidden="true"></i> KIẾN THỨC NHÀ ĐẸP</li>
        <br>
        @foreach($listItem as $v)
      <div class="itembaiviet">
        <div class="btn-group" role="group" aria-label="Basic example">
          <div class="col-sm-3" style="width:30%; float: left;"> 
            <a href="{{url("$v->slug")}}.html">
            <img src="{{url('public/backend')}}/{{$v->icon}}" class="" width="100%" alt="Avatar">
            </a>
          </div>
          <div class="col-sm-9" style="width:70%; float: left;">
            <p><a href="{{url("$v->slug")}}.html">{{$v->name}}</a></p>
          </div>
        </div>
      </div>
      @endforeach
      </ul>
    </div>
    <div class="col-sm-8 text-justify">
      <h2>{{$data->name}}</h2><br>
       <h5>Posted on {{date('d', strtotime($data->created_at))}} Tháng {{date('m', strtotime($data->created_at))}}, {{date('Y', strtotime($data->created_at))}} by admin </h5>
      <hr class="mg_o">
      <div class="row text-justify">
        <div class="col-md-12">
             {!! $data->des2 !!}
        </div>
          <div class="fb-share-button" data-href="{{url("$data->slug.html")}}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url("$data->slug.html")}}" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
     
      </div>


    </div>
  </div>
  </div>
@endsection('content')