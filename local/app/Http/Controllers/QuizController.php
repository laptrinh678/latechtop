<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\QuestionGroupRepository;
use App\Repository\QuestionRepository;
use App\Repository\ReplyRepository;

class QuizController extends Controller
{
    protected $questionGroupRepo;
    protected $questionRepo;
    protected $replyRepo;

    function __construct(
        QuestionGroupRepository $questionGroupRepo,
        QuestionRepository      $questionRepository,
        ReplyRepository         $replyRepository
    )
    {
        $this->questionGroupRepo = $questionGroupRepo;
        $this->questionRepo = $questionRepository;
        $this->replyRepo = $replyRepository;
    }

    public function replyChoose($idReply,$idQuestion)
    {
        //dd($request->all());
        $clientReply = $this->replyRepo->find($idReply);
        //dd( $clientReply);
        $question = $this->questionRepo->with(['questionGroup', 'replys'])->find($idQuestion);
        return view('frontend.multiplechoice.itemReply', compact('question', 'clientReply'));
        // dd($request->all());
    }

    public function topicSet($id, $slug)
    {
        $questionGroup = $this->questionGroupRepo->with('cate')->orderBy('id', 'desc')->get();

        $question = $this->questionRepo->with(['questionGroup', 'replys'])->where('question_groups_id', $id)->orderBy('id', 'ASC')->first();
        return view('frontend.multiplechoice.quizQuestion', compact('question', 'questionGroup'));
    }

    public function nextQuestion($questionGroupId, $sortIndex)
    {
        $question = $this->questionRepo->with(['questionGroup', 'replys'])->where('question_groups_id', $questionGroupId)->where('sort_index', $sortIndex + 1)->first();
        return view('frontend.multiplechoice.nextQuestion', compact('question'));
    }
}
