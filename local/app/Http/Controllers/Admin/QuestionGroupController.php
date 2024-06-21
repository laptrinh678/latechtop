<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\CateReponsitory;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Exception;
use App\Repository\QuestionGroupRepository;

class QuestionGroupController extends Controller
{
    protected $cateRepo;
    protected $questionGroupRepo;
    function __construct(
    CateReponsitory $cateReponsitory,
    QuestionGroupRepository $questionGroupRepository
    )
    {
        $this->cateRepo = $cateReponsitory;
        $this->questionGroupRepo = $questionGroupRepository;
    }

    public function index()
    {
        $questionGroups = $this->questionGroupRepo->with('cate')->getAll();
        return view('backend.questionGroup.index', compact('questionGroups'));
    }

    public function create(Request $request)
    {
        $categories =  $this->cateRepo->getAll();
        return view('backend.questionGroup.add', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $questionGroup = [];
            $questionGroup['name'] = $request->name;
            $questionGroup['cate_id'] = $request->cate_id;
            $questionGroup['slug']= Str::slug($request->name);
            $questionGroup = $this->questionGroupRepo->create($questionGroup);
            Session::flash('add_success', __('message.add_success'));
            return redirect('admin/questionGroup');
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
            $questionGroup = $this->questionGroupRepo->with(['cate'])->find($id);
            $categories =  $this->cateRepo->getAll();
            return view('backend.questionGroup.edit', compact('questionGroup','categories'));
        } else {
            Session::flash('no_data', __('message.no_data'));
            return back();
        }
    }

    public function update(Request $request,$id )
    {
        if ($id) {
            $questionGroup = $this->questionGroupRepo->find($id);
            $dataQuestion = [];
            $dataQuestion['name'] = $request->name;
            $dataQuestion['cate_id'] = $request->cate_id;
            $questionGroup['slug']= Str::slug($request->name);
            $questionGroup->update($dataQuestion);
            Session::flash('edit_success', __('message.edit_success'));
            return redirect('admin/questionGroup');
        } else {
            Session::flash('no_data', __('message.no_data'));
            return back();
        }
    }

    public function destroy($id)
    {
        
        if ($id) {
            $result = $this->questionGroupRepo->delete($id);
            dd($result);
            if ($result) {
                Session::flash('delete_success', __('message.delete_success'));
                return back();
            }
        }
    }
}
