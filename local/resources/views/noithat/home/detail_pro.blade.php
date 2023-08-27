@extends('fontend.master.index')
@section('title')
{{$detailproductId->name}}
@endsection
@section('meta')
<link rel="canonical" href="{{url("$detailproductId->cat_id/$detailproductId->post_slug.html")}}" />
<meta property="og:image" content="{{url('public/backend/post')}}/{{$detailproductId->post_img}}" />
@endsection('meta')
@section('header_style')
<script src="{{url('public/fontend/bootstrap')}}/bootstrap3.4.0.min.js"></script>
<script type="text/javascript" src="{{url('public/fontend/fancybox')}}/js/vendor/xzoom.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{url('public/fontend/fancybox')}}/css/xzoom.css" media="all" />
<!-- hammer plugin here -->
<script type="text/javascript" src="{{url('public/fontend/fancybox')}}/hammer.js/1.0.5/jquery.hammer.min.js"></script>
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link type="text/css" rel="stylesheet" media="all"
    href="{{url('public/fontend/fancybox')}}/fancybox/source/jquery.fancybox.css" />
<link type="text/css" rel="stylesheet" media="all"
    href="{{url('public/fontend/fancybox')}}/magnific-popup/css/magnific-popup.css" />
<script type="text/javascript" src="{{url('public/fontend/fancybox')}}/fancybox/source/jquery.fancybox.js"></script>
<script type="text/javascript" src="{{url('public/fontend/fancybox')}}/magnific-popup/js/magnific-popup.js"></script>
<link rel="stylesheet" href="{{url('public/fontend/css')}}/toantrang.css" />
<link rel="stylesheet" href="{{url('public/fontend/css')}}/detailproduct.css" />
@endsection('header_style')

@section('content')


<div class="container-fluid detail_pro">
    <div class="container item">
        <div class="row imfomationpro">
            <div class="col-md-8">
                <div class="mottram detail_pro_left">
                    <h1 class="titel_detail_pro"><span>Trang chủ</span> <i class="fa fa-angle-double-right"
                            aria-hidden="true"></i> <span>Sản phẩm</span>
                             <!-- <i class="fa fa-angle-double-right"
                            aria-hidden="true"></i> <span>ff</span> -->
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                        <span>{{$detailproductId->name}}</span>
                    </h1>

                    <div class="img_detail_pro">
                        <div class="large-5 column">
                            <div class="xzoom-container">
                                <div class="x_zoom_right">
                                    <div class="baymuoi">
                                        <img class="xzoom" id="xzoom-default"
                                            src="{{url('public/backend/post')}}/{{$detailproductId->post_img}}"
                                            xoriginal="{{url('public/backend/post')}}/{{$detailproductId->post_img}}" />
                                    </div>

                                    <div class="bamuoi">
                                        <p align="center">
                                            <a href="{{url("dowload/$detailproductId->post_img")}}">
                                                <img class="img_dowload"
                                                    src="{{url('public/fontend/images')}}/download.png" alt="">
                                            </a>
                                        </p>
                                        <p><i class="fa fa-volume-control-phone" aria-hidden="true"></i> HOTLINE
                                            :{{$header_footer->hotline}}</p>
                                        <ul class="list-group">
                                            <li class="list-group-item"><i class="fa fa-check-square-o"
                                                    aria-hidden="true"></i>Giao hàng phiễn phí</li>
                                            <li class="list-group-item"><i class="fa fa-check-square-o"
                                                    aria-hidden="true"></i>Đổi trả miễn phí trong 15 ngày</li>
                                            <li class="list-group-item"><i class="fa fa-check-square-o"
                                                    aria-hidden="true"></i>Thanh toán khi nhận hàng</li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="xzoom-thumbs">
                                    <?php 
									$imgdetail = $detailproductId->imgdetail;
									
									?>
									
                                    @if($imgdetail !='')
									<?php $imgdetail_decode = json_decode($imgdetail); ?>
                                    @foreach($imgdetail_decode as $val)
                                    <a href="{{url('public/backend/post')}}/{{$val}}">
                                        <img class="xzoom-gallery" width="80"
                                            src="{{url('public/backend/post')}}/{{$val}}"
                                            xpreview="{{url('public/backend/post')}}/{{$val}}"
                                            title="The description goes here">
                                    </a>
                                    @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="mottram">

                            <div class="saumuoi vanchuyen">
                                <div id="hotline-top"> <a href="#" title="Phí vận chuyển">Miễn phí vận chuyển nội thành
                                        Hà Nội</a> </div>
                            </div>
                            <div class="bonmuoi">
                                <span>
                                   <div class="fb-share-button" data-href="{{url("$detailproductId->cat_id/$detailproductId->post_slug.html")}}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url("$detailproductId->cat_id/$detailproductId->post_slug.html")}}" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                                </span>
                            </div>
                        </div>




                    </div>
                </div>

            </div>



            <div class="col-md-4 thongtinchitietsp col-xs-12 col-sm-12">
                <div class="mottram">
                    <h1 class="title_detail"><i class="fa fa-hand-o-right"
                            aria-hidden="true"></i>{{$detailproductId->name}}</h1>
                    <div class="item_tt_sp">
                <p class="gia">Giá: <span> @if($detailproductId->price !=''){{number_format($detailproductId->price) }} VNĐ @endif</span></p>
                    </div>

                    <div class="shortdes item_tt_sp">
                        {!!$detailproductId->post_gtngan !!}
                    </div>
                    <!-- <div class="trangthai item_tt_sp">
				
				</div>
				<div class="keyword item_tt_sp">
					
					
				</div>
				<div class="keyword item_tt_sp">
					
				</div> -->


                    <div class="huongdanmuahang item_tt_sp">
                        <p><a class="btn" href="{{url('cart/add')}}/{{$detailproductId->id}}"> <i
                                    class="fa fa-shopping-bag" aria-hidden="true"></i>HƯỚNG DẪN MUA HÀNG</a></p>
                    </div>

                </div>
            </div>
        </div>
        <div class="row content_detail_pro">
            <div class="col-md-8 col-xs-12 col-sm-12 ">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">CHI TIẾT SẢN PHẨM</a></li>
                    <!-- <li><a data-toggle="tab" href="#menu1">DANH SÁCH BÌNH LUẬN</a></li> -->

                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        {!!$detailproductId->post_gtchitiet !!}
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <h3>Menu 1</h3>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat.</p>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <h3>Menu 2</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <h3>Menu 3</h3>
                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                            explicabo.</p>
                    </div>
                </div>

            </div>
            <div class="col-md-4 splienquan col-xs-12 col-sm-12">
                <div class="mottram">
                    <h5 class="title_detail"> <i class="fa fa-hand-o-right" aria-hidden="true"></i>SẢN PHẨM LIÊN QUAN
                    </h5>

					@foreach($product_lienquan as $val)
						<div class="form-group" style="min-height: 100px;
                   border-bottom: 1px solid #d5d0d0;">
							<div class="left_30">
								<a href="{{url("$val->cat_id/$val->post_slug.html")}}" class="">
		                <img src="{{url('public/backend/post')}}/{{$val->post_img }}" alt="{{$val->name}}">
		              </a>
							</div>
							<div class="right_70">
								<p> <a href="{{url("$val->cat_id/$val->post_slug.html")}}"> {{$val->name}}</a></p>
								<p>Giá:@if($val->price !=''){{number_format($val->price) }} VNĐ @endif</p>
							</div>
						</div>
                        <div class="clearfix"></div>
				  @endforeach

                </div>

            </div>
        </div>
        <!-- <div class="row">
			<div class="col-md-8 col-sm-12 col-xs-12 CommentProduct">
				 <div class="mottram binhluan">
		          <h6 class="title_detail">Bình luận</h6>
		          <p>Địa chỉ Email của bạn sẽ không được công khai</p>
		          <form action="">
		            <div class="nammuoi">
		              <input type="text" placeholder="Họ tên" class="hoten_inpt_d">
		            </div>
		            <div class="nammuoi">
		              <input type="text" placeholder="Địa chỉ Email" class="email_input_d">
		            </div>
		            <br><br>
		            <textarea class="form-control" rows="5" id="comment"></textarea>
		            <div class="form-group">
		            	<label for="">Đánh giá sao</label>
		            	<fieldset>
					    <span class="star-cb-group">
					      <input type="radio" id="rating-5" name="rating" value="5" /><label for="rating-5">5</label>
					      <input type="radio" id="rating-4" name="rating" value="4"  /><label for="rating-4">4</label>
					      <input type="radio" id="rating-3" name="rating" value="3" /><label for="rating-3">3</label>
					      <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
					      <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
					      <input type="radio" id="rating-0" name="rating" value="0" class="star-cb-clear" /><label for="rating-0">0</label>
					    </span>
					  </fieldset>
		            </div>
		            <input type="submit" value="ĐĂNG" class="hvr-radial-out search_sub_new2 ">
		          </form>
		       </div>

				
				
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12 col-lg-6">
				
			</div>
			
		</div> -->

    </div>
</div>
@endsection
@section('script')
<script src="{{url('public/fontend/fancybox')}}/js/foundation.min.js"></script>
<script src="{{url('public/fontend/fancybox')}}/js/setup.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
var logID = 'log',
    log = $('<div id="' + logID + '"></div>');
$('body').append(log);
$('[type*="radio"]').change(function() {
    var me = $(this);
    log.html(me.attr('value'));
});
</script>
@endsection('script')