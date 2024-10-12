<div class="modal fade modalAddMoney" id="addMoneyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog"  srole="document"  style="max-width:1000px">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3 class="modal-title text-danger">
                    NẠP TIỀN TÀI KHOẢN HOẶC MUA TÀI LIỆU ĐỂ LÀM TIẾP TRẮC NGHIỆM
                    </h3>
            </div>
            <div class="modal-body">
                <p class="text-center"><i>Ủng hộ TUYENDUNGCONGCHUC247.COM duy trì server nhé</i></p>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                         {!! $imfomation->money_member !!}
                        </div>
                        <div class="col-md-4 col-sm-12">
                            {!! $imfomation->des3 !!}
                        </div>
                     </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="hidden" class="form-control" id="url-login" name="url" value="{{ url('/login') }}">
            </div>
        </div>
    </div>
</div>
