@extends('dienminhquang.index')
@section('title')
    Đăng ký
@endsection
@section('style')
@endsection('style')
@section('content')

    <!-- detail product -->
    <div class="navbar-vina">
        <div class="container">
            <a href="{{url('/')}}">
                <svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" data-prefix="fa" data-icon="home"
                     role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                    <path fill="currentColor"
                          d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z">
                    </path>
                </svg>
                Trang chủ
            </a>
            <a href="#">ĐĂNG KÝ</a>
            <a href="#">Đăng ký thành viên</a>
        </div>
    </div>
    <div class="subpage">

        <div class="container">
            <div class="row">

                <div class="col-12  right">
                    <div class="box_subpage">
                        <h2 style="border-bottom: 1px solid #ddd; margin-bottom: 20px;" class="text-center">Đăng ký thành viên mới</h2>
                        <p class="text-danger text-center">Bạn được cộng 100 điểm vào Điểm thành viên - bạn có thể sử dụng điểm để dowload tài liệu</p>

                        <!--begin contact_page-->
                        <div class="contact_page">


                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8 item">
                                    <form id="contact-form" method="post">
                                        <ul>
                                            <li>
                                                <input placeholder="Họ tên" name="name" id="ContactForm_name"
                                                       type="text" value="{{old('name')}}">
                                                <p>
                                                    <span style="color: red;">{{$errors->first('name')}}</span>
                                                </p>
                                            </li>
                                            <li>
                                                <label for="">Giới tính</label>
                                                <input type="radio" id="huey" name="sex" value="1" />
                                                <label for="Nam">Nam</label>
                                                <input type="radio" id="huey" name="sex" value="2"  />
                                                <label for="Nữ">Nữ</label>
                                                <p>
                                                    <span style="color: red;">{{$errors->first('sex')}}</span>
                                                </p>
                                            </li>
                                            <li>
                                                <input placeholder="Email" value="{{old('email')}}" name="email"
                                                       id="ContactForm_email"
                                                       type="email">
                                                <p>
                                                    <span style="color: red;">{{$errors->first('email')}}</span>
                                                </p>
                                            </li>
                                            <li>
                                                <input placeholder="Điện thoại" value="{{old('phone')}}" name="phone"
                                                       id="ContactForm_mobile" type="text">
                                                <p>
                                                    <span style="color: red;">{{$errors->first('phone')}}</span>
                                                </p>
                                            </li>

                                            <li>
                                                <input placeholder="Địa chỉ" value="{{old('adress')}}" name="adress"
                                                       id="ContactForm_address"
                                                       type="text">
                                                <p>
                                                    <span style="color: red;">{{$errors->first('adress')}}</span>
                                                </p>
                                            </li>

                                            <li>
                                                <input placeholder="Password" value="{{old('password')}}"
                                                       name="password" id="ContactForm_address"
                                                       type="text">
                                                <p>
                                                    <span style="color: red;">{{$errors->first('password')}}</span>
                                                </p>
                                            </li>
                                            <li>
                                                <input placeholder="Nhập lại passwors"
                                                       value="{{old('password_confirm')}}" name="password_confirm"
                                                       type="text">
                                                <p>
                                                    <span
                                                        style="color: red;">{{$errors->first('password_confirm')}}</span>
                                                </p>
                                            </li>


                                            <li class="text-center">
                                                <button type="submit" class="btn btn-success">Gửi</button>
                                                <button type="reset">Làm lại</button>
                                            </li>

                                        </ul>
                                        {{csrf_field()}}
                                    </form>
                                </div>
                                <div class="col-2"></div>


                            </div>
                        </div>
                        <!--end contact_page-->
                    </div>
                </div>


            </div>
        </div>
    </div>
    @if (Session::has('add_success'))
        <div class="modal" tabindex="-1" role="dialog" style="display:block">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">ĐĂNG KÝ THÀNH CÔNG</h3>

                    </div>
                    <div class="modal-body">
                        <p>Chúc mừng bạn đã đăng ký thành viên thành công bạn hãy nhấn ok để quay lại trang chủ</p>
                        <p>Đăng nhập với mã thành viên {{Session::get('mathanhvien')}}</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{url('')}}">
                            <button type="button" class="btn btn-success">OK</button>
                        </a>


                    </div>
                </div>
            </div>
        </div>
    @endif
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
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
            integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
          integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous"/>
    <script>
        const myTimeout = setTimeout(hideMessage, 3000);

        function hideMessage() {
            $('.hideMessage').hide(300);
        }

        $(document).ready(function () {
            $(document).ready(function () {
                $('select').selectize({
                    sortField: 'text'
                });
            });
        })
    </script>

@endsection
