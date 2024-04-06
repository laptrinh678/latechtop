<div class="container">
    <form action="{{ route('searchPost') }}" method="get">
    <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7 col-sm-12" style="padding-top: 2px;">          
              <input type="text" class="form-control" id="pwd" placeholder="Tìm kiếm tin tuyển dụng" name="postName">
            </div>        
            <div class="col-md-2 col-sm-12" style="padding-top: 2px;">
              <button type="submit" class="btn btn-success">Tìm kiếm</button>
            </div>
    </div>
    {{ csrf_field() }}
</form>
</div>