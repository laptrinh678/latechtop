<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\PostReponsitory;
use App\Repository\CateReponsitory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DB;
use App\Http\Requests\AdminPostRequest;
use App\Models\Province;
use App\Repository\ReplyRepository;
use App\Repository\QuestionGroupRepository;
use Exception;
use App\Repository\QuestionRepository;

class QuestionController extends Controller
{
    public $PostReponsitory;
    protected $replyRepo;
    protected $questionGroupRepo;
    protected $questionRepo;
    function __construct(
    PostReponsitory $PostReponsitory,
    ReplyRepository $replyRepository,
    QuestionGroupRepository $questionGroupRepo,
    QuestionRepository $questionRepository
    )
    {
        $this->PostReponsitory = $PostReponsitory;
        $this->replyRepo = $replyRepository;
        $this->questionGroupRepo = $questionGroupRepo;
        $this->questionRepo = $questionRepository;
    }

    public function index()
    {
        $questions = $this->questionRepo->with(['questionGroup','replys'])->getAll();
        return view('backend.question.index', compact('questions'));
    }

    public function create(Request $request)
    {
        $questionGroups =  $this->questionGroupRepo->getAll();
        return view('backend.question.add', compact('questionGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $sortIndexMax = $this->questionRepo->where('question_groups_id',$request->question_groups_id)->latest('id')->first();
            $question = [];
            $question['name'] = $request->name;
            $question['question_groups_id'] = $request->question_groups_id;
            $question['explain'] = $request->explain;
            $question['sort_index'] = 1;
            if($sortIndexMax){
                $question['sort_index'] = $sortIndexMax->sort_index + 1;
            }
            $question = $this->questionRepo->create($question);
            $replyName = $request->reply_name;
            $replyValue = $request->reply_value;
            if ($question->id && isset($replyName)) {
                foreach($replyName as $key=>$replyNameItem){
                    $dataReply['question_id'] = $question->id;
                    $dataReply['name'] = $replyNameItem;
                    $dataReply['reply_value'] = $replyValue[$key];
                    $this->replyRepo->create($dataReply);
                }
                Session::flash('add_success', __('message.add_success'));
                return redirect('admin/question/');
            } else {
                return back();
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function show($id)
    {
        //
    }


    public function edit($id, CateReponsitory $CateReponsitory)
    {
        if ($id) {
            $question = $this->questionRepo->with(['questionGroup','replys'])->find($id);
            $questionGroups =  $this->questionGroupRepo->getAll();
            return view('backend.question.edit', compact('question','questionGroups'));
        } else {
            Session::flash('no_data', __('message.no_data'));
            return back();
        }
    }

    public function update(Request $request,$id )
    {
        if ($id) {
            $question = $this->questionRepo->find($id);
            $dataQuestion = [];
            $dataQuestion['name'] = $request->name;
            $dataQuestion['question_groups_id'] = $request->question_groups_id;
            $dataQuestion['explain'] = $request->explain;
            $question->update($dataQuestion);

            $replyName = $request->reply_name;
            $replyValue = $request->reply_value;
            $replyId = $request->reply_id;
            if ($question->id && isset($replyName)) {
                foreach($replyName as $key=>$replyNameItem){
                    $dataReply['question_id'] = $question->id;
                    $dataReply['name'] = $replyNameItem;
                    $dataReply['reply_value'] = $replyValue[$key];
                    if(isset($replyId[$key])){
                        $replyObject = $this->replyRepo->find($replyId[$key]);
                        $replyObject->update($dataReply);
                    }else{
                        $this->replyRepo->create($dataReply);
                    }
                }
            }
            return redirect('admin/question');

        } else {
            Session::flash('no_data', __('message.no_data'));
            return back();
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $result = $this->questionRepo->delete($id);
            if ($result) {
                Session::flash('delete_success', __('message.delete_success'));
                return back();
            }
        }
    }

    public function status($status, $id)
    {
        $idsp = $id;
        if ($status == 1) {
            $data['deleted_at'] = Carbon::now();
            $this->PostReponsitory->update($id, $data);
            $status = 0;
            return view('errors.status', compact('idsp', 'status'));
        } else {
            $data['deleted_at'] = null;
            $this->PostReponsitory->update($id, $data);
            $status = 1;
            return view('errors.status', compact('idsp', 'status'));
        }
    }
}
