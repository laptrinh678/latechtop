@extends('fontend.master.index')
@section('title')
 Lỗi
@endsection('title')
@section('header_style')
<link rel="stylesheet" href="{{url('public/fontend')}}/css/cate_new.css">
<link rel="stylesheet" href="{{url('public/fontend')}}/css/detail_new.css">

@endsection('header_style')
  
@section('content')
<div class="loi">
 <div class="container">
 	<div class="row">
 		<div class="col-md-12">
 			<h1 align="center">Sai đường dẫn Bạn vui lòng nhập đường đẫn khác hoặc click để quay lại trang chủ </h1>
 			<p align="center"><button class=" btn btn-success"><a style="color: white" href="{{url('')}}">Quay về trang chủ</a></button></p>
 		</div>
 	</div>
 </div>
</div>
@endsection
