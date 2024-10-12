<div class="modal fade modalLogin" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Đăng nhập hệ thống</h3>
            </div>
            <div class="modal-body">
                <form method="post" id="loginsystem">
                    <div class="form-group phonelogin">
                        <label for="recipient-name" class="col-form-label">Số điện thoại</label>
                        <input type="number" class="form-control" id="phonename" name="phone"
                            value="{{ old('phone') }}">
                        <p><span class="text-danger error1"></span>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Password:</label>
                        <input type="password" class="form-control" name="password" id="password"
                            value="{{ old('password') }}">
                        <p><span class="text-danger error2"></span>
                        </p>
                    </div>
                    <div class="form-group">
                        <h5><span class="text-danger error3"></span>
                        </h5>
                        <h4>
                            <div class="w-50" style="float:left">
                                <button class="btn btn-success" type="submit">Đăng nhập</button>
                            </div>

                            <div class="w-25 text-right" style="float:right">
                                <a href="{{ url('forgot-password') }}">Quên mật khẩu</a>
                            </div>

                        </h4>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="modal-footer">
                <a href="{{ url('dang-ky.html') }}" class="btn btn-warning">ĐĂNG KÝ THÀNH VIÊN</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="hidden" class="form-control" id="url-login" name="url" value="{{ url('/login') }}">
            </div>
        </div>
    </div>
</div>
