@if($status ==1)
<button class="btn btn-success changeStatus" data="1" id ="{{$idsp}}">ON</button>
@else
    <button class="btn btn-danger changeStatus" data="" id ="{{$idsp}}">OFF</button>
@endif