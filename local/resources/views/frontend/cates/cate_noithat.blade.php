@extends('noithat.master.index')
@section('title')
@endsection('title')
@section('meta')
@endsection('meta')
@section('style')
<link rel="stylesheet" href="{{url('public/noithat')}}/css/detail_new.css">
@endsection('style')
@section('content')
<div class="container detail">
<div class="row content">
    <div class="col-md-4 sidenav">
      <ul class="nav">
        <li class="bgFull fw-bold colorWhite fontWeightBold"><i class="fa fa-bars" aria-hidden="true"></i> KIẾN THỨC NHÀ ĐẸP</li>
        <br>
        @foreach($listItem as $v)
      <div class="itembaiviet">
        <div class="btn-group" role="group" aria-label="Basic example">
          <div class="col-sm-3" style="width: 30%; float:left;">
            <a href="{{url("$v->slug")}}.html">
           <img src="{{url('public/backend')}}/{{$v->icon}}" class="" width="100%" alt="Avatar">
           </a>
         </div>
          <div class="col-sm-9" style="width:70%; float: left;">
            <p><strong><a href="{{url("$v->slug")}}.html">{{$v->name}}</a></strong></p>
          </div>
        </div>
      </div>
      @endforeach
      </ul>
    </div>
    <div class="col-md-8 text-justify" style="padding: 1px;">
      @foreach($listCatedata as $v)
        <div class="clearfix mgTopBo20">
          <div class="col-sm-4">
            <a href=""><img style="width: 100%" src="{{url('public/backend')}}/{{$v->icon}}" alt=""></a>
          </div>
          <div class="col-sm-8">
             <p><strong><a href="{{url("$v->slug")}}.html">{{$v->name}}</a></strong></p>
                @if($v->des !='')
              <div class="text-justify itemtextdes">
                     {!! Str::words($v->des, 100, ' ...') !!}
                 </div>
              @endif
          </div>
        </div>
      @endforeach


    </div>
  </div>
  </div>
@endsection('content')