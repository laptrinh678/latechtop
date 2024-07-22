@if($question)
    <div class="item-reply">
        <h3 class="from-control text-white" style="background: #228a0a; padding: 10px;">{{$question->questionGroup ? $question->questionGroup->name : '' }}</h3>
        <ul class="list-group">
            <div>
                <ul class="list-group" style="padding: 0px; padding-right: 40px; padding-top: 20px;">
                    <li class="list-group-item text-danger">Câu {{$question->sort_index}} : {{ $question->name }}</li>
                    @foreach($question->replys as $key=>$replyItem)
                        <li class="list-group-item">
                            <input type="radio" class="replyRadio" name="reply"  dataId="{{ $replyItem->id }}" value="">
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
                            {{ $replyItem->name }}
                        </li>
                    @endforeach
                    <input type="hidden" name="idReply" id="replyValueChoose" value="">
                    <input type="hidden" name="idQuestion" id="idQuestionChoose" value="{{$question->id}}">
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
    <div class="item-reply">
        <br>
        <br>
        <p class="text-center text-danger"><b>Hết câu hỏi bạn vui lòng chọn bộ đề khác</b></p>
    </div>
@endif
