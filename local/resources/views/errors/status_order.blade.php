@if($status ==1)
<button class="btn btn-success changeStatus" data="1" id ="{{$order_id}}">Đã giao hàng và thanh toán</button>
@else
    <button class="btn btn-danger changeStatus" data="" id ="{{$order_id}}">Chưa giao hàng và thanh toán</button>
@endif
