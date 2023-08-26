@extends('dienminhquang.index')
@section('title')
Liên hệ
@endsection
@section('style')
@endsection('style')
@section('content')

<!-- detail product -->
<div class="navbar-vina">
	<div class="container">
		<a href="{{url('/')}}">
			<svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" data-prefix="fa" data-icon="home" role="img"
				xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
				<path fill="currentColor"
					d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z">
				</path>
			</svg>
			Trang chủ
		</a>
		<a href="#">LIÊN HỆ</a>
		<a href="#">Liên hệ</a>
	</div>
</div>
<div class="subpage">
	
	<div class="container">
		<div class="row">

			<div class="col-12 col-md-3 left d-none d-md-block">
				<div class="_box filter_cat">
					@include('dienminhquang.catesList')
				</div>
				<div class="_box left_product">
					@include('dienminhquang.sanphamnoibat')
				</div>
			</div>

			<div class="col-12 col-md-9 right">
				<div class="box_subpage">
					<p style="border-bottom: 1px solid #ddd; margin-bottom: 20px;">Liên hệ</p>
				
					<!--begin contact_page-->
					<div class="contact_page">
						<script type="text/javascript"
							src="https://maps.google.com/maps/api/js?key=AIzaSyDSuhwMI8xVcEHWBzb95HJVSqmq2nmYmGI&amp;language=vi"></script>
						<script type="text/javascript">

							var infoWindow;

							window.onload = function () {
								var toa_do = new google.maps.LatLng(20.925850, 105.636047);
								var conf = {
									center: toa_do,
									zoom: 15,
									mapTypeId: google.maps.MapTypeId.ROADMAP,
									disableDefaultUI: true,
									mapTypeControl: true,
									navigationControl: true,
									navigationControlOptions: {
										style: google.maps.NavigationControlStyle.SMALL
									}
								}
								map = new google.maps.Map(document.getElementById('mapcont'), conf);

								var marker = new google.maps.Marker({
									position: toa_do,
									map: map,
									title: "{{ $imfomation->name }}",
								});

								google.maps.event.addListener(marker, 'click', function () {
									if (!infoWindow) {
										infoWindow = new google.maps.InfoWindow();
									}
									var content = '<div id="info">' +
										'<div><h2>{{ $imfomation->name }}</h2>' +
										'<p><strong>Địa chỉ: {{ $imfomation->adress }}</strong></p>' +
										'<p><strong>Điện thoại:</strong> {{ $imfomation->hotline }}</p>' +
										'<p style="color: #e00;"><strong>Hotline:</strong> {{ $imfomation->hotline }}</p>' +
										'<p><strong>Email:</strong> <a href="mailto:{{ $imfomation->mail }}">{{ $imfomation->mail }}</a></p>' +
										'<p><strong>Website:</strong> <a href="{{ url(' / ') }}">{{ url(' / ') }}</a></p></div>';
									infoWindow.setContent(content);
									infoWindow.open(map, marker);
								});
							};
						</script>
						<div id="mapcont" style="position: relative; overflow: hidden;">
							<div
								style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
								<div class="gm-style"
									style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;">
									<div><button draggable="false" aria-label="Phím tắt" title="Phím tắt" type="button"
											style="background: none transparent; display: block; border: none; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; z-index: 1000002; outline-offset: 3px; right: 0px; bottom: 0px; transform: translateX(100%);"></button>
									</div>
									<div tabindex="0" aria-label="Bản đồ" aria-roledescription="bản đồ" role="region"
										style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;"
										aria-describedby="2728630B-B58F-4B43-9520-A5B4FE7E66FB">
										<div
											style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);">
											<div
												style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
												<div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
													<div
														style="position: absolute; z-index: 985; transform: matrix(1, 0, 0, 1, -17, -146);">
														<div
															style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;">
															<div style="width: 256px; height: 256px;"></div>
														</div>
														<div
															style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;">
															<div style="width: 256px; height: 256px;"></div>
														</div>
														<div
															style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px;">
															<div style="width: 256px; height: 256px;"></div>
														</div>
														<div
															style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;">
															<div style="width: 256px; height: 256px;"></div>
														</div>
														<div
															style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;">
															<div style="width: 256px; height: 256px;"></div>
														</div>
														<div
															style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;">
															<div style="width: 256px; height: 256px;"></div>
														</div>
														<div
															style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px;">
															<div style="width: 256px; height: 256px;"></div>
														</div>
														<div
															style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px;">
															<div style="width: 256px; height: 256px;"></div>
														</div>
														<div
															style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px;">
															<div style="width: 256px; height: 256px;"></div>
														</div>
														<div
															style="position: absolute; left: -512px; top: 256px; width: 256px; height: 256px;">
															<div style="width: 256px; height: 256px;"></div>
														</div>
														<div
															style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px;">
															<div style="width: 256px; height: 256px;"></div>
														</div>
														<div
															style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px;">
															<div style="width: 256px; height: 256px;"></div>
														</div>
													</div>
												</div>
											</div>
											<div
												style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;">
											</div>
											<div
												style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;">
											</div>
											<div
												style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;">
												<div
													style="width: 26px; height: 37px; overflow: hidden; position: absolute; left: -13px; top: -37px; z-index: 0;">
													<img alt=""
														src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi3.png"
														draggable="false"
														style="position: absolute; left: 0px; top: 0px; width: 26px; height: 37px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
												</div>
												<div style="position: absolute; left: 0px; top: 0px; z-index: -1;">
													<div
														style="position: absolute; z-index: 985; transform: matrix(1, 0, 0, 1, -17, -146);">
														<div
															style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 0px;">
														</div>
														<div
															style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 0px;">
														</div>
														<div
															style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: -256px;">
														</div>
														<div
															style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: -256px;">
														</div>
														<div
															style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: -256px;">
														</div>
														<div
															style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 0px;">
														</div>
														<div
															style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 256px;">
														</div>
														<div
															style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 256px;">
														</div>
														<div
															style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 256px;">
														</div>
														<div
															style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -512px; top: 256px;">
														</div>
														<div
															style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -512px; top: 0px;">
														</div>
														<div
															style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -512px; top: -256px;">
														</div>
													</div>
												</div>
											</div>
											<div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
												<div
													style="position: absolute; z-index: 985; transform: matrix(1, 0, 0, 1, -17, -146);">
													<div
														style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
														<img draggable="false" alt="" role="presentation"
															src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26093!3i14442!4i256!2m3!1e0!2sm!3i626358418!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!23i1379903&amp;key=AIzaSyDSuhwMI8xVcEHWBzb95HJVSqmq2nmYmGI&amp;token=63875"
															style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
													</div>
													<div
														style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
														<img draggable="false" alt="" role="presentation"
															src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26092!3i14443!4i256!2m3!1e0!2sm!3i626358418!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!23i1379903&amp;key=AIzaSyDSuhwMI8xVcEHWBzb95HJVSqmq2nmYmGI&amp;token=124196"
															style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
													</div>
													<div
														style="position: absolute; left: -512px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
														<img draggable="false" alt="" role="presentation"
															src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26091!3i14443!4i256!2m3!1e0!2sm!3i626358418!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!23i1379903&amp;key=AIzaSyDSuhwMI8xVcEHWBzb95HJVSqmq2nmYmGI&amp;token=41356"
															style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
													</div>
													<div
														style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
														<img draggable="false" alt="" role="presentation"
															src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26091!3i14442!4i256!2m3!1e0!2sm!3i626358418!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!23i1379903&amp;key=AIzaSyDSuhwMI8xVcEHWBzb95HJVSqmq2nmYmGI&amp;token=29266"
															style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
													</div>
													<div
														style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
														<img draggable="false" alt="" role="presentation"
															src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26091!3i14441!4i256!2m3!1e0!2sm!3i626358418!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!23i1379903&amp;key=AIzaSyDSuhwMI8xVcEHWBzb95HJVSqmq2nmYmGI&amp;token=17176"
															style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
													</div>
													<div
														style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
														<img draggable="false" alt="" role="presentation"
															src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26092!3i14442!4i256!2m3!1e0!2sm!3i626358418!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!23i1379903&amp;key=AIzaSyDSuhwMI8xVcEHWBzb95HJVSqmq2nmYmGI&amp;token=112106"
															style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
													</div>
													<div
														style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
														<img draggable="false" alt="" role="presentation"
															src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26092!3i14441!4i256!2m3!1e0!2sm!3i626358418!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!23i1379903&amp;key=AIzaSyDSuhwMI8xVcEHWBzb95HJVSqmq2nmYmGI&amp;token=100016"
															style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
													</div>
													<div
														style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
														<img draggable="false" alt="" role="presentation"
															src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26093!3i14441!4i256!2m3!1e0!2sm!3i626358418!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!23i1379903&amp;key=AIzaSyDSuhwMI8xVcEHWBzb95HJVSqmq2nmYmGI&amp;token=51785"
															style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
													</div>
													<div
														style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
														<img draggable="false" alt="" role="presentation"
															src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26094!3i14441!4i256!2m3!1e0!2sm!3i626358418!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!23i1379903&amp;key=AIzaSyDSuhwMI8xVcEHWBzb95HJVSqmq2nmYmGI&amp;token=3554"
															style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
													</div>
													<div
														style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
														<img draggable="false" alt="" role="presentation"
															src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26094!3i14442!4i256!2m3!1e0!2sm!3i626358418!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!23i1379903&amp;key=AIzaSyDSuhwMI8xVcEHWBzb95HJVSqmq2nmYmGI&amp;token=15644"
															style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
													</div>
													<div
														style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
														<img draggable="false" alt="" role="presentation"
															src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26094!3i14443!4i256!2m3!1e0!2sm!3i626358418!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!23i1379903&amp;key=AIzaSyDSuhwMI8xVcEHWBzb95HJVSqmq2nmYmGI&amp;token=27734"
															style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
													</div>
													<div
														style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
														<img draggable="false" alt="" role="presentation"
															src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26093!3i14443!4i256!2m3!1e0!2sm!3i626358418!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!23i1379903&amp;key=AIzaSyDSuhwMI8xVcEHWBzb95HJVSqmq2nmYmGI&amp;token=75965"
															style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
													</div>
												</div>
											</div>
										</div>
										<div
											style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;">
											<div
												style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);">
												<div
													style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;">
												</div>
												<div
													style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;">
												</div>
												<div
													style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;">
													<span id="1C767805-DED9-409A-A65F-BDFF7B514B9A"
														style="display: none;">Để đi theo chỉ dẫn, hãy nhấn các phím mũi
														tên.</span>
													<div aria-label="Công ty TNHH thương mại và thiết bị Tiến Thịnh"
														role="button" tabindex="0"
														aria-describedby="1C767805-DED9-409A-A65F-BDFF7B514B9A"
														style="width: 26px; height: 37px; overflow: hidden; position: absolute; left: -13px; top: -37px; z-index: 0;">
														<img alt=""
															src="https://maps.gstatic.com/mapfiles/transparent.png"
															draggable="false" usemap="#gmimap0"
															style="width: 26px; height: 37px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"><map
															name="gmimap0" id="gmimap0"><area log="miw"
																coords="13,0,4,3.5,0,12,2.75,21,13,37,23.5,21,26,12,22,3.5"
																shape="poly" tabindex="-1"
																title="Công ty TNHH thương mại và thiết bị Tiến Thịnh"
																style="display: inline; position: absolute; left: 0px; top: 0px; cursor: pointer; touch-action: none;"></map>
													</div>
												</div>
												<div
													style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;">
												</div>
											</div>
										</div>
										<div class="gm-style-moc"
											style="z-index: 4; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;">
											<p class="gm-style-mot"></p>
										</div>
										<div class="LGLeeN-keyboard-shortcuts-view"
											id="2728630B-B58F-4B43-9520-A5B4FE7E66FB" style="display: none;">
											<table>
												<tbody>
													<tr>
														<td style="text-align: right;"><kbd
																class="VdnQmO-keyboard-shortcuts-view--shortcut-key"
																aria-label="Mũi tên trái">←</kbd></td>
														<td aria-label="Di chuyển sang trái.">Di chuyển sang trái</td>
													</tr>
													<tr>
														<td style="text-align: right;"><kbd
																class="VdnQmO-keyboard-shortcuts-view--shortcut-key"
																aria-label="Mũi tên phải">→</kbd></td>
														<td aria-label="Di chuyển sang phải.">Di chuyển sang phải</td>
													</tr>
													<tr>
														<td style="text-align: right;"><kbd
																class="VdnQmO-keyboard-shortcuts-view--shortcut-key"
																aria-label="Mũi tên lên">↑</kbd></td>
														<td aria-label="Di chuyển lên.">Di chuyển lên</td>
													</tr>
													<tr>
														<td style="text-align: right;"><kbd
																class="VdnQmO-keyboard-shortcuts-view--shortcut-key"
																aria-label="Mũi tên xuống">↓</kbd></td>
														<td aria-label="Di chuyển xuống.">Di chuyển xuống</td>
													</tr>
													<tr>
														<td style="text-align: right;"><kbd
																class="VdnQmO-keyboard-shortcuts-view--shortcut-key">+</kbd>
														</td>
														<td aria-label="Phóng to.">Phóng to</td>
													</tr>
													<tr>
														<td style="text-align: right;"><kbd
																class="VdnQmO-keyboard-shortcuts-view--shortcut-key">-</kbd>
														</td>
														<td aria-label="Thu nhỏ.">Thu nhỏ</td>
													</tr>
													<tr>
														<td style="text-align: right;"><kbd
																class="VdnQmO-keyboard-shortcuts-view--shortcut-key">Di
																chuyển lên trên</kbd></td>
														<td aria-label="Di chuyển sang trái 75%.">Di chuyển sang trái
															75%</td>
													</tr>
													<tr>
														<td style="text-align: right;"><kbd
																class="VdnQmO-keyboard-shortcuts-view--shortcut-key">Di
																chuyển xuống dưới</kbd></td>
														<td aria-label="Di chuyển sang phải 75%.">Di chuyển sang phải
															75%</td>
													</tr>
													<tr>
														<td style="text-align: right;"><kbd
																class="VdnQmO-keyboard-shortcuts-view--shortcut-key">Di
																chuyển lên</kbd></td>
														<td aria-label="Di chuyển lên trên 75%.">Di chuyển lên trên 75%
														</td>
													</tr>
													<tr>
														<td style="text-align: right;"><kbd
																class="VdnQmO-keyboard-shortcuts-view--shortcut-key">Di
																chuyển xuống</kbd></td>
														<td aria-label="Di chuyển xuống dưới 75%.">Di chuyển xuống dưới
															75%</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div><iframe aria-hidden="true" frameborder="0" tabindex="-1"
										style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;"></iframe>
									<div
										style="pointer-events: none; width: 100%; height: 100%; box-sizing: border-box; position: absolute; z-index: 1000002; opacity: 0; border: 2px solid rgb(26, 115, 232);">
									</div>
									<div></div>
									<div></div>
									<div></div>
									<div></div>
									<div><button draggable="false" aria-label="Chuyển đổi chế độ xem toàn màn hình"
											title="Chuyển đổi chế độ xem toàn màn hình" type="button"
											aria-pressed="false" class="gm-control-active gm-fullscreen-control"
											style="background: none rgb(255, 255, 255); border: 0px; margin: 10px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; overflow: hidden; display: none; top: 0px; right: 0px;"><img
												src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E"
												alt="" style="height: 18px; width: 18px;"><img
												src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E"
												alt="" style="height: 18px; width: 18px;"><img
												src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E"
												alt="" style="height: 18px; width: 18px;"></button></div>
									<div></div>
									<div></div>
									<div></div>
									<div></div>
									<div></div>
									<div>
										<div
											style="margin: 0px 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;">
											<a target="_blank" rel="noopener"
												title="Mở khu vực này trong Google Maps (mở cửa sổ mới)"
												aria-label="Mở khu vực này trong Google Maps (mở cửa sổ mới)"
												href="https://maps.google.com/maps?ll=20.852952,106.66697&amp;z=15&amp;t=m&amp;hl=vi&amp;gl=US&amp;mapclient=apiv3"
												style="display: inline;">
												<div style="width: 66px; height: 26px;"><img alt="Google"
														src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2069%2029%22%3E%3Cg%20opacity%3D%22.6%22%20fill%3D%22%23fff%22%20stroke%3D%22%23fff%22%20stroke-width%3D%221.5%22%3E%3Cpath%20d%3D%22M17.4706%207.33616L18.0118%206.79504%2017.4599%206.26493C16.0963%204.95519%2014.2582%203.94522%2011.7008%203.94522c-4.613699999999999%200-8.50262%203.7551699999999997-8.50262%208.395779999999998C3.19818%2016.9817%207.0871%2020.7368%2011.7008%2020.7368%2014.1712%2020.7368%2016.0773%2019.918%2017.574%2018.3689%2019.1435%2016.796%2019.5956%2014.6326%2019.5956%2012.957%2019.5956%2012.4338%2019.5516%2011.9316%2019.4661%2011.5041L19.3455%2010.9012H10.9508V14.4954H15.7809C15.6085%2015.092%2015.3488%2015.524%2015.0318%2015.8415%2014.403%2016.4629%2013.4495%2017.1509%2011.7008%2017.1509%209.04835%2017.1509%206.96482%2015.0197%206.96482%2012.341%206.96482%209.66239%209.04835%207.53119%2011.7008%207.53119%2013.137%207.53119%2014.176%208.09189%2014.9578%208.82348L15.4876%209.31922%2016.0006%208.80619%2017.4706%207.33616z%22/%3E%3Cpath%20d%3D%22M24.8656%2020.7286C27.9546%2020.7286%2030.4692%2018.3094%2030.4692%2015.0594%2030.4692%2011.7913%2027.953%209.39011%2024.8656%209.39011%2021.7783%209.39011%2019.2621%2011.7913%2019.2621%2015.0594c0%203.25%202.514499999999998%205.6692%205.6035%205.6692zM24.8656%2012.8282C25.8796%2012.8282%2026.8422%2013.6652%2026.8422%2015.0594%2026.8422%2016.4399%2025.8769%2017.2905%2024.8656%2017.2905%2023.8557%2017.2905%2022.8891%2016.4331%2022.8891%2015.0594%2022.8891%2013.672%2023.853%2012.8282%2024.8656%2012.8282z%22/%3E%3Cpath%20d%3D%22M35.7511%2017.2905v0H35.7469C34.737%2017.2905%2033.7703%2016.4331%2033.7703%2015.0594%2033.7703%2013.672%2034.7343%2012.8282%2035.7469%2012.8282%2036.7608%2012.8282%2037.7234%2013.6652%2037.7234%2015.0594%2037.7234%2016.4439%2036.7554%2017.2962%2035.7511%2017.2905zM35.7387%2020.7286C38.8277%2020.7286%2041.3422%2018.3094%2041.3422%2015.0594%2041.3422%2011.7913%2038.826%209.39011%2035.7387%209.39011%2032.6513%209.39011%2030.1351%2011.7913%2030.1351%2015.0594%2030.1351%2018.3102%2032.6587%2020.7286%2035.7387%2020.7286z%22/%3E%3Cpath%20d%3D%22M51.953%2010.4357V9.68573H48.3999V9.80826C47.8499%209.54648%2047.1977%209.38187%2046.4808%209.38187%2043.5971%209.38187%2041.0168%2011.8998%2041.0168%2015.0758%2041.0168%2017.2027%2042.1808%2019.0237%2043.8201%2019.9895L43.7543%2020.0168%2041.8737%2020.797%2041.1808%2021.0844%2041.4684%2021.7772C42.0912%2023.2776%2043.746%2025.1469%2046.5219%2025.1469%2047.9324%2025.1469%2049.3089%2024.7324%2050.3359%2023.7376%2051.3691%2022.7367%2051.953%2021.2411%2051.953%2019.2723v-8.8366zm-7.2194%209.9844L44.7334%2020.4196C45.2886%2020.6201%2045.878%2020.7286%2046.4808%2020.7286%2047.1616%2020.7286%2047.7866%2020.5819%2048.3218%2020.3395%2048.2342%2020.7286%2048.0801%2021.0105%2047.8966%2021.2077%2047.6154%2021.5099%2047.1764%2021.7088%2046.5219%2021.7088%2045.61%2021.7088%2045.0018%2021.0612%2044.7336%2020.4201zM46.6697%2012.8282C47.6419%2012.8282%2048.5477%2013.6765%2048.5477%2015.084%2048.5477%2016.4636%2047.6521%2017.2987%2046.6697%2017.2987%2045.6269%2017.2987%2044.6767%2016.4249%2044.6767%2015.084%2044.6767%2013.7086%2045.6362%2012.8282%2046.6697%2012.8282zM55.7387%205.22083v-.75H52.0788V20.4412H55.7387V5.220829999999999z%22/%3E%3Cpath%20d%3D%22M63.9128%2016.0614L63.2945%2015.6492%2062.8766%2016.2637C62.4204%2016.9346%2061.8664%2017.3069%2061.0741%2017.3069%2060.6435%2017.3069%2060.3146%2017.2088%2060.0544%2017.0447%2059.9844%2017.0006%2059.9161%2016.9496%2059.8498%2016.8911L65.5497%2014.5286%2066.2322%2014.2456%2065.9596%2013.5589%2065.7406%2013.0075C65.2878%2011.8%2063.8507%209.39832%2060.8278%209.39832%2057.8445%209.39832%2055.5034%2011.7619%2055.5034%2015.0676%2055.5034%2018.2151%2057.8256%2020.7369%2061.0659%2020.7369%2063.6702%2020.7369%2065.177%2019.1378%2065.7942%2018.2213L66.2152%2017.5963%2065.5882%2017.1783%2063.9128%2016.0614zM61.3461%2012.8511L59.4108%2013.6526C59.7903%2013.0783%2060.4215%2012.7954%2060.9017%2012.7954%2061.067%2012.7954%2061.2153%2012.8161%2061.3461%2012.8511z%22/%3E%3C/g%3E%3Cpath%20d%3D%22M11.7008%2019.9868C7.48776%2019.9868%203.94818%2016.554%203.94818%2012.341%203.94818%208.12803%207.48776%204.69522%2011.7008%204.69522%2014.0331%204.69522%2015.692%205.60681%2016.9403%206.80583L15.4703%208.27586C14.5751%207.43819%2013.3597%206.78119%2011.7008%206.78119%208.62108%206.78119%206.21482%209.26135%206.21482%2012.341%206.21482%2015.4207%208.62108%2017.9009%2011.7008%2017.9009%2013.6964%2017.9009%2014.8297%2017.0961%2015.5606%2016.3734%2016.1601%2015.7738%2016.5461%2014.9197%2016.6939%2013.7454h-4.9931V11.6512h7.0298C18.8045%2012.0207%2018.8456%2012.4724%2018.8456%2012.957%2018.8456%2014.5255%2018.4186%2016.4637%2017.0389%2017.8434%2015.692%2019.2395%2013.9838%2019.9868%2011.7008%2019.9868z%22%20fill%3D%22%234285F4%22/%3E%3Cpath%20d%3D%22M29.7192%2015.0594C29.7192%2017.8927%2027.5429%2019.9786%2024.8656%2019.9786%2022.1884%2019.9786%2020.0121%2017.8927%2020.0121%2015.0594%2020.0121%2012.2096%2022.1884%2010.1401%2024.8656%2010.1401%2027.5429%2010.1401%2029.7192%2012.2096%2029.7192%2015.0594zM27.5922%2015.0594C27.5922%2013.2855%2026.3274%2012.0782%2024.8656%2012.0782S22.1391%2013.2937%2022.1391%2015.0594C22.1391%2016.8086%2023.4038%2018.0405%2024.8656%2018.0405S27.5922%2016.8168%2027.5922%2015.0594z%22%20fill%3D%22%23E94235%22/%3E%3Cpath%20d%3D%22M40.5922%2015.0594C40.5922%2017.8927%2038.4159%2019.9786%2035.7387%2019.9786%2033.0696%2019.9786%2030.8851%2017.8927%2030.8851%2015.0594%2030.8851%2012.2096%2033.0614%2010.1401%2035.7387%2010.1401%2038.4159%2010.1401%2040.5922%2012.2096%2040.5922%2015.0594zM38.4734%2015.0594C38.4734%2013.2855%2037.2087%2012.0782%2035.7469%2012.0782%2034.2851%2012.0782%2033.0203%2013.2937%2033.0203%2015.0594%2033.0203%2016.8086%2034.2851%2018.0405%2035.7469%2018.0405%2037.2087%2018.0487%2038.4734%2016.8168%2038.4734%2015.0594z%22%20fill%3D%22%23FABB05%22/%3E%3Cpath%20d%3D%22M51.203%2010.4357v8.8366C51.203%2022.9105%2049.0595%2024.3969%2046.5219%2024.3969%2044.132%2024.3969%2042.7031%2022.7955%2042.161%2021.4897L44.0417%2020.7095C44.3784%2021.5143%2045.1997%2022.4588%2046.5219%2022.4588%2048.1479%2022.4588%2049.1499%2021.4487%2049.1499%2019.568V18.8617H49.0759C48.5914%2019.4612%2047.6552%2019.9786%2046.4808%2019.9786%2044.0171%2019.9786%2041.7668%2017.8352%2041.7668%2015.0758%2041.7668%2012.3%2044.0253%2010.1319%2046.4808%2010.1319%2047.6552%2010.1319%2048.5914%2010.6575%2049.0759%2011.2323H49.1499V10.4357H51.203zM49.2977%2015.084C49.2977%2013.3512%2048.1397%2012.0782%2046.6697%2012.0782%2045.175%2012.0782%2043.9267%2013.3429%2043.9267%2015.084%2043.9267%2016.8004%2045.175%2018.0487%2046.6697%2018.0487%2048.1397%2018.0487%2049.2977%2016.8004%2049.2977%2015.084z%22%20fill%3D%22%234285F4%22/%3E%3Cpath%20d%3D%22M54.9887%205.22083V19.6912H52.8288V5.220829999999999H54.9887z%22%20fill%3D%22%2334A853%22/%3E%3Cpath%20d%3D%22M63.4968%2016.6854L65.1722%2017.8023C64.6301%2018.6072%2063.3244%2019.9869%2061.0659%2019.9869%2058.2655%2019.9869%2056.2534%2017.827%2056.2534%2015.0676%2056.2534%2012.1439%2058.2901%2010.1483%2060.8278%2010.1483%2063.3818%2010.1483%2064.6301%2012.1768%2065.0408%2013.2773L65.2625%2013.8357%2058.6843%2016.5623C59.1853%2017.5478%2059.9737%2018.0569%2061.0741%2018.0569%2062.1746%2018.0569%2062.9384%2017.5067%2063.4968%2016.6854zM58.3312%2014.9115L62.7331%2013.0884C62.4867%2012.4724%2061.764%2012.0454%2060.9017%2012.0454%2059.8012%2012.0454%2058.2737%2013.0145%2058.3312%2014.9115z%22%20fill%3D%22%23E94235%22/%3E%3C/svg%3E"
														draggable="false"
														style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;">
												</div>
											</a>
										</div>
									</div>
									<div></div>
									<div>
										<div style="display: inline-flex; position: absolute; right: 0px; bottom: 0px;">
											<div class="gmnoprint" style="z-index: 1000001;">
												<div draggable="false" class="gm-style-cc"
													style="user-select: none; position: relative; height: 14px; line-height: 14px;">
													<div
														style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
														<div style="width: 1px;"></div>
														<div
															style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
														</div>
													</div>
													<div
														style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
														<button draggable="false" aria-label="Phím tắt" title="Phím tắt"
															type="button"
															style="background: none; display: inline-block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; color: rgb(0, 0, 0); font-family: inherit; line-height: inherit;">Phím
															tắt</button>
													</div>
												</div>
											</div>
											<div class="gmnoprint" style="z-index: 1000001;">
												<div draggable="false" class="gm-style-cc"
													style="user-select: none; position: relative; height: 14px; line-height: 14px;">
													<div
														style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
														<div style="width: 1px;"></div>
														<div
															style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
														</div>
													</div>
													<div
														style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
														<button draggable="false" aria-label="Dữ liệu Bản đồ"
															title="Dữ liệu Bản đồ" type="button"
															style="background: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; color: rgb(0, 0, 0); font-family: inherit; line-height: inherit; display: none;">Dữ
															liệu Bản đồ</button><span style="">Dữ liệu bản đồ
															©2022</span>
													</div>
												</div>
											</div>
											<div class="gmnoscreen">
												<div
													style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(0, 0, 0); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">
													Dữ liệu bản đồ ©2022</div>
											</div>
											<div draggable="false" class="gm-style-cc"
												style="user-select: none; position: relative; height: 14px; line-height: 14px; display: none;">
												<div
													style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
													<div style="width: 1px;"></div>
													<div
														style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
													</div>
												</div>
												<div
													style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
													<span>200 m&nbsp;</span>
													<div
														style="position: relative; display: inline-block; height: 8px; bottom: -1px; width: 49px;">
														<div
															style="width: 100%; height: 4px; position: absolute; left: 0px; top: 0px;">
														</div>
														<div
															style="width: 4px; height: 8px; left: 0px; top: 0px; background-color: rgb(255, 255, 255);">
														</div>
														<div
															style="width: 4px; height: 8px; position: absolute; background-color: rgb(255, 255, 255); right: 0px; bottom: 0px;">
														</div>
														<div
															style="position: absolute; background-color: rgb(102, 102, 102); height: 2px; left: 1px; bottom: 1px; right: 1px;">
														</div>
														<div
															style="position: absolute; width: 2px; height: 6px; left: 1px; top: 1px; background-color: rgb(102, 102, 102);">
														</div>
														<div
															style="width: 2px; height: 6px; position: absolute; background-color: rgb(102, 102, 102); bottom: 1px; right: 1px;">
														</div>
													</div>
												</div>
											</div>
											<div class="gmnoprint gm-style-cc" draggable="false"
												style="z-index: 1000001; user-select: none; position: relative; height: 14px; line-height: 14px;">
												<div
													style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
													<div style="width: 1px;"></div>
													<div
														style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
													</div>
												</div>
												<div
													style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
													<a href="https://www.google.com/intl/vi_US/help/terms_maps.html"
														target="_blank" rel="noopener"
														style="text-decoration: none; cursor: pointer; color: rgb(0, 0, 0);">Điều
														khoản sử dụng</a>
												</div>
											</div>
											<div draggable="false" class="gm-style-cc"
												style="user-select: none; position: relative; height: 14px; line-height: 14px;">
												<div
													style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
													<div style="width: 1px;"></div>
													<div
														style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
													</div>
												</div>
												<div
													style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
													<a target="_blank" rel="noopener"
														title="Báo cáo lỗi trong bản đồ đường hoặc hình ảnh đến Google"
														dir="ltr"
														href="https://www.google.com/maps/@20.852952,106.66697,15z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3"
														style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); text-decoration: none; position: relative;">Báo
														cáo một lỗi bản đồ</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div
								style="background-color: white; font-weight: 500; font-family: Roboto, sans-serif; padding: 15px 25px; box-sizing: border-box; top: 5px; border: 1px solid rgba(0, 0, 0, 0.12); border-radius: 5px; left: 50%; max-width: 375px; position: absolute; transform: translateX(-50%); width: calc(100% - 10px); z-index: 1;">
								<div><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/google_gray.svg"
										draggable="false"
										style="padding: 0px; margin: 0px; border: 0px; height: 17px; vertical-align: middle; width: 52px; user-select: none;">
								</div>
								<div style="line-height: 20px; margin: 15px 0px;"><span
										style="color: rgba(0, 0, 0, 0.87); font-size: 14px;">Trang này không thể tải
										Google Maps đúng cách.</span></div>
								<table style="width: 100%;">
									<tr>
										<td style="line-height: 16px; vertical-align: middle;"><a
												href="https://developers.google.com/maps/documentation/javascript/error-messages?utm_source=maps_js&amp;utm_medium=degraded&amp;utm_campaign=billing#api-key-and-billing-errors"
												target="_blank" rel="noopener"
												style="color: rgba(0, 0, 0, 0.54); font-size: 12px;">Bạn có sở hữu trang
												web này không?</a></td>
										<td style="text-align: right;"><button class="dismissButton">OK</button></td>
									</tr>
								</table>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 item">
								<form id="contact-form" method="post">
									<ul>
										<li>
											<input placeholder="Họ tên" name="name" required id="ContactForm_name"
												type="text">
										</li>

										<li>
											<input placeholder="Email" name="email" required id="ContactForm_email"
												type="email">
										</li>

										<li>
											<input placeholder="Điện thoại" required name="phone"
												id="ContactForm_mobile" type="text">
										</li>

										<li>
											<input placeholder="Địa chỉ" required name="adress" id="ContactForm_address"
												type="text">
										</li>

										<li>
											<textarea placeholder="Nội dung yêu cầu" name="note"
												id="ContactForm_body"></textarea>
										</li>

										<li>
											<button type="submit">Gửi</button>
											<button type="reset">Làm lại</button>
										</li>

									</ul>
									{{csrf_field()}}
								</form>
							</div>

							<div class="col-md-6 item right_contact">
								<h1>{{$imfomation->name}}</h1>
								<p><svg class="svg-inline--fa fa-map-marker fa-w-12" aria-hidden="true"
										data-prefix="fas" data-icon="map-marker" role="img"
										xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
										<path fill="currentColor"
											d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0z">
										</path>
									</svg><!-- <i class="fas fa-map-marker"></i> --> <strong>Địa chỉ:</strong>
									{{$imfomation->adress}}</p>
								<p><svg class="svg-inline--fa fa-mobile-alt fa-w-10" aria-hidden="true"
										data-prefix="fas" data-icon="mobile-alt" role="img"
										xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
										<path fill="currentColor"
											d="M272 0H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h224c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM160 480c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm112-108c0 6.6-5.4 12-12 12H60c-6.6 0-12-5.4-12-12V60c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v312z">
										</path>
									</svg><!-- <i class="fas fa-mobile-alt"></i> --> <span
										style="color: #e00;"><strong>Hotline:</strong> {{$imfomation->hotline}}</span>
								</p>



								<p><svg class="svg-inline--fa fa-envelope fa-w-16" aria-hidden="true" data-prefix="fas"
										data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg"
										viewBox="0 0 512 512" data-fa-i2svg="">
										<path fill="currentColor"
											d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z">
										</path>
									</svg><!-- <i class="fas fa-envelope"></i> --> <strong>Email:</strong> <a
										href="mailto:tienthinhetc.co@gmail.com">{{$imfomation->mail}}</a></p>
								<p><svg class="svg-inline--fa fa-globe fa-w-16" aria-hidden="true" data-prefix="fas"
										data-icon="globe" role="img" xmlns="http://www.w3.org/2000/svg"
										viewBox="0 0 512 512" data-fa-i2svg="">
										<path fill="currentColor"
											d="M364.215 192h131.43c5.439 20.419 8.354 41.868 8.354 64s-2.915 43.581-8.354 64h-131.43c5.154-43.049 4.939-86.746 0-128zM185.214 352c10.678 53.68 33.173 112.514 70.125 151.992.221.001.44.008.661.008s.44-.008.661-.008c37.012-39.543 59.467-98.414 70.125-151.992H185.214zm174.13-192h125.385C452.802 84.024 384.128 27.305 300.95 12.075c30.238 43.12 48.821 96.332 58.394 147.925zm-27.35 32H180.006c-5.339 41.914-5.345 86.037 0 128h151.989c5.339-41.915 5.345-86.037-.001-128zM152.656 352H27.271c31.926 75.976 100.6 132.695 183.778 147.925-30.246-43.136-48.823-96.35-58.393-147.925zm206.688 0c-9.575 51.605-28.163 104.814-58.394 147.925 83.178-15.23 151.852-71.949 183.778-147.925H359.344zm-32.558-192c-10.678-53.68-33.174-112.514-70.125-151.992-.221 0-.44-.008-.661-.008s-.44.008-.661.008C218.327 47.551 195.872 106.422 185.214 160h141.572zM16.355 192C10.915 212.419 8 233.868 8 256s2.915 43.581 8.355 64h131.43c-4.939-41.254-5.154-84.951 0-128H16.355zm136.301-32c9.575-51.602 28.161-104.81 58.394-147.925C127.872 27.305 59.198 84.024 27.271 160h125.385z">
										</path>
									</svg><!-- <i class="fas fa-globe"></i> --> <strong>Website:</strong> <a
										href="{{url('/') }}">{{url('/') }}</a></p>
							</div>

						</div>
					</div>
					<!--end contact_page-->
				</div>
			</div>


		</div>
	</div>
</div>
<style>
	.contact_page form input[type=email], .contact_page form textarea {
    width: 100%;
    border: 1px solid #ddd;
    text-indent: 8px;
    height: 32px;
    outline: none;
}
</style>

<!-- end detail product -->
@endsection('content')
<script>
	const myTimeout = setTimeout(hideMessage, 3000);
	function hideMessage() {
		$('.hideMessage').hide(300);
	}
</script>