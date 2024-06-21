@extends('frontend.index')
@section('title')

@endsection
@section('meta')
    <meta name="keywords" itemprop="keywords" content="">
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="{{ url('public/backend') }}/" />
    <meta property="og:image:alt" content="" />
@endsection('meta')
@section('style')
<style>
.item-reply{
    border: 1px solid #d1d0d0;
    padding-bottom: 50px;
}
</style>
@endsection('style')
@section('content')
    <!-- detail product -->
    <div class="navbar-vina">
        <div class="container">
            @include('frontend.blog.titlePage')
        </div>
    </div>
    <div class="subpage">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-12">
                    <ul class="list-group" style="padding: 0px;">
                        <li class="list-group-item font-weight-bold text-light" style="background: #228a0a">
                            <i class="fa fa-gift" aria-hidden="true"></i> LUYỆN ĐỀ TRẮC NGHIỆM</li>
                        @foreach($questionGroup as $questionGroupItem)
                        <a href="{{ url("trac-nghiem/$questionGroupItem->id/$questionGroupItem->slug.html") }}" class="text-dark font-weight-bold">
                            <li class="list-group-item"><i class="fa fa-gift text-danger" aria-hidden="true"></i> {{$questionGroupItem->name}}</li>
                        </a>
                        @endforeach
                      </ul>
                </div>
                <div class="col-md-8 col-sm-12 itemTotalReply">
                    @if($question)
                    <div class="item-reply">
                        <h3 class="from-control text-white" style="background: #228a0a; padding: 10px;">{{$question->questionGroup ? $question->questionGroup->name : '' }}</h3>
                        <ul class="list-group">
                            <div>
                            <ul class="list-group" style="padding: 0px; padding-right: 40px; padding-top: 20px;">
                                <li class="list-group-item text-danger">Câu {{$question->sort_index}} : {{ $question->name }}</li>
                                @foreach($question->replys as $replyItem)
                                <li class="list-group-item">
                                    <input type="radio" class="replyRadio" name="reply"  dataId="{{ $replyItem->id }}" value="">
                                    {{ $replyItem->name }}
                                </li>
                                @endforeach
                                <input type="hidden" name="idReply" id="replyValueChoose" value="">
                                <input type="hidden" name="idQuestion"  id="idQuestionChoose" value="{{$question->id}}">
                                <li class="list-group-item">
                                    <button class="btn btn-success" id="reply-form">Trả lời</button>
                                </li>
                            </ul>
                            {{ csrf_field() }}
                        </div>
                            <input type="hidden" id="url" value="{{url('')}}">
                        </ul>
                    </div>
                    @else
                    <div>
                        <p class="text-center">Chưa có câu hỏi bạn vui lòng chọn bộ đề khác</p>
                    </div>
                        @endif
                </div>
                <div class="col-md-2 col-sm-12">
                    <label class="form-control bg-warning" for="">
                        <h5>
                            <a class="text-white" href="#">THỜI GIAN LÀM BÀI</a>
                        </h5>

                    </label>
                    <p class="text-center">30p</p>
                    <label class="form-control bg-info" for="">
                        <h5>
                            <a class="text-white" href="#">NGƯỜI LÀM NHANH NHẤT</a>
                        </h5>
                    </label>
                    <p class="text-center">Nguyễn Thị Hằng</p>
                </div>

            </div>
        </div>
    </div>
@endsection('content')
@section('script')
    <script>
        $(document).ready(function() {
            $('body').on('click', '.replyRadio', function() {
                let idReplyChoose = $(this).attr('dataId');
                if(idReplyChoose){
                    $('#replyValueChoose').val(idReplyChoose);
                }
            });
            
            $('body').on('click','#reply-form', function () {
                let replyValue = $("#replyValueChoose").val();
                if(!replyValue){
                    alert('Vui lòng chọn đáp án');
                    return false;
                }
                let url = $('#url').val();
                let replyValueChoose = $('#replyValueChoose').val();
                let idQuestionChoose = $('#idQuestionChoose').val();
                console.log(replyValueChoose + 'd' + idQuestionChoose);
                $.get(url + '/trac-nghiem/replyChoose/' + replyValueChoose + '/' + idQuestionChoose, function (data) {
                    $('.itemTotalReply').html(data);
                })
            });
        })
    </script>
@endsection
