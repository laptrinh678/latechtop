<div class="item-reply">
    <h3 class="from-control text-white" style="background: #228a0a; padding: 10px;">{{$question->questionGroup ? $question->questionGroup->name : '' }}</h3>
    <h4 class="text-danger text-center">@if($clientReply->reply_value == 1) {{'Câu trả lời của bạn chính xác'}} @else {{'Câu trả lời của bạn chưa chính xác'}} @endif</h4>
    <ul class="list-group">
            <ul class="list-group" style="padding: 0px; padding-right: 40px; padding-top: 20px;">
                <li class="list-group-item text-danger">Câu {{$question->sort_index}} : {{ $question->name }}</li>
                @foreach($question->replys as $key=>$replyItem)
                    <li class="list-group-item">
                        <span class="@if($replyItem->reply_value==1) {{'text-danger'}} @endif">
                        @switch($key)
                            @case(0)
                                A
                                @break
                            @case(1)
                                B
                                @break
                            @case(2)
                               C
                                @break
                                @case(3)
                                D
                            @break
                        @endswitch : 
                            {{ $replyItem->name }}  @if($replyItem->id == $idReply ) <span class="text-warning"> (Đáp án của bạn)</span> @endif
                        </span>
                        <span class="text-danger"> @if($replyItem->reply_value==1) {{'(Đáp án đúng)'}} @endif</span>
                    </li>
                @endforeach
                <input type="hidden" name="idReply" id="replyValueChoose" value="">
                <input type="hidden" name="idQuestion" id="idQuestionChoose"  value="{{$question->id}}">
                <li class="list-group-item">
                    <p><b>Bài giải:</b></p>
                    <div>
                        {!! $question->explain !!}
                    </div>
                    <p class="text-right">
                        <button class="btn btn-success nextQuestion" dataQuestionGroup ="{{$question->question_groups_id}}" dataSortIndex="{{$question->sort_index}}" >Câu hỏi tiếp theo</button>
                    </p>

                </li>
            </ul>
        <input type="hidden" id="url" value="{{url('')}}">
    </ul>
</div>
<script>
    $(document).ready(function (){
        $('body').on('click', '.nextQuestion', function() {
            let questionGroup = $(this).attr('dataQuestionGroup');
            let sortIndex = $(this).attr('dataSortIndex');
            let url = $('#url').val();
            $.get(url + '/trac-nghiem/next-question/' + questionGroup + '/' + sortIndex, function (data) {
                $('.itemTotalReply').html(data);
            })
            });
        // $('.nextQuestion').click(function (){
        //     let questionGroup = $(this).attr('dataQuestionGroup');
        //     let sortIndex = $(this).attr('dataSortIndex');
        //     let url = $('#url').val();
        //     $.get(url + '/trac-nghiem/next-question/' + questionGroup + '/' + sortIndex, function (data) {
        //         $('.itemTotalReply').html(data);
        //     })
        // })
    })

</script>
