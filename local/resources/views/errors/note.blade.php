@if (Session::has('update_success')) <div class="alertNotification2 hideMessage"> {{Session::get('update_success')}}</div> @endif
@if (Session::has('add_success'))<div class="alertNotification2 hideMessage">{{Session::get('add_success')}} </div>@endif
@if (Session::has('delete_success'))<div class="alertNotification2 hideMessage">{{Session::get('delete_success')}} </div>@endif
@if (Session::has('delete_error'))<div class="alertNotification2 hideMessage">{{Session::get('delete_error')}} </div>@endif
@if (Session::has('error'))<div class="alertNotification2 hideMessage">{{Session::get('error')}} </div>@endif
@if (Session::has('chuyentien_success'))<div class="alertNotification2 hideMessage">{{Session::get('chuyentien_success')}} </div>@endif

