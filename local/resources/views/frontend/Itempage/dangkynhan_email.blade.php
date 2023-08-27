<!-- bat dau dang ky email -->
<div class="container-fluid dangkynhanemail">
    <div class="row">
      <div class="col-md-6  slideInRight">
          <div class="left_15"><p align="right"><i class="fa fa-envelope-o" aria-hidden="true"></i></p></div>
          <div class="right_85">
            <p>ĐỂ KHÔNG BỎ LỠ THÔNG TIN HỮU ÍCH TỪ CHÚNG TÔI</p>
            <h3 class="roboto_bold">HÃY ĐĂNG KÝ NHẬN EMAIL</h3>
          </div>
      </div>
      <div class="col-md-6 formemail  slideInLeft">
        <form action="" method="get">
          <input type="email" value=""  name="email" placeholder="Nhập địa chỉ e-mail" class="input_text">

          <input type="submit" value="ĐĂNG KÝ" class="inputsubmit">
          {{csrf_field()}}
          <p class="text-center" style="color:red;">{{$errors->first('email')}}</p>
        </form>

      </div>
    </div>
</div>