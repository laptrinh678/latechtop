<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\ImfomationReponsitory;
use Illuminate\Support\Facades\Session;
class ImfomationsController extends Controller
{
    public $ImfomationReponsitory;
    function __construct(ImfomationReponsitory $ImfomationReponsitory) {
    $this->ImfomationReponsitory = $ImfomationReponsitory;
  }
    public function index()
    {
        $data = $this->ImfomationReponsitory->find(1);
        return view('backend.imfomation.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.imfomation.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
         if($request->hasFile('icon'))
        {
             $imgIcon = $request->file('icon');
             $nameIcon= time() . '_'.$imgIcon->getClientOriginalName();
             $imgIcon->move('public/backend/',$nameIcon);
             $data['logo'] = $nameIcon;
        }else{
            $data['logo'] = '';
        }
         if($request->hasFile('images'))
        {
            $imgdetail = $request->file('images');
            $images=array();
             if($imgdetail)
             {
                foreach($imgdetail as $file)
                {
                    $name= time() . '_'.$file->getClientOriginalName();
                    $file->move('public/backend/',$name);
                    $images[]=$name;
                }
             }
            $data['img1'] = json_encode($images);
        }else
        {
            $data['img1'] = '';
        }
        $ImfomationReponsitory = $this->ImfomationReponsitory->create($data);
        if($ImfomationReponsitory){
            Session::flash('add_success', __('message.add_success'));
            return 'ok';
        }else{
            return back();
        }
    }

   
    public function edit($id)
    {
        if($id){
            $data = $this->ImfomationReponsitory->find($id);
            return view('backend.imfomation.edit', compact('data'));
        }else{
             Session::flash('no_data', __('message.no_data'));
            return back();
        }
    }

    
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if($request->hasFile('logo'))
       {
            $imgIcon = $request->file('logo');
            $nameIcon= time() . '_'.$imgIcon->getClientOriginalName();
            $imgIcon->move('public/backend/',$nameIcon);
            $data['logo'] = $nameIcon;
       }
         if($request->hasFile('img1'))
       {
            $imgIcon1 = $request->file('img1');
            $nameIcon1= time() . '_'.$imgIcon1->getClientOriginalName();
            $imgIcon1->move('public/backend/',$nameIcon1);
            $data['img1'] = $nameIcon1;
       }
         if($request->hasFile('img2'))
       {
            $imgIcon2 = $request->file('img2');
            $nameIcon2= time() . '_'.$imgIcon2->getClientOriginalName();
            $imgIcon2->move('public/backend/',$nameIcon2);
            $data['img2'] = $nameIcon2;
       }
        if($request->hasFile('images'))
       {
           $imgdetail = $request->file('images');
           $images=array();
            if($imgdetail)
            {
               foreach($imgdetail as $file)
               {
                   $name= time() . '_'.$file->getClientOriginalName();
                   $file->move('public/backend/',$name);
                   $images[]=$name;
               }
            }
           $data['img1'] = json_encode($images);
       }
       $result = $this->ImfomationReponsitory->update($id, $data);
       if($result){
           Session::flash('update_success', __('message.update_success'));
           return redirect('admin/imfomation');
       }else{
           return back();
       }
    }

    
}
