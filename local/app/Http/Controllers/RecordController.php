<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
class RecordController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.record');
    }

    public function store(Request $request)
    {
		$languageCode = $request->languageCode;
		$targetLanguageCode = $request->targetLanguageCode;
		$audio_file = $request->audio_file;
		//Store session
		Session::flash('audio_translate', array(
			'languageCode' => $languageCode,
			'targetLanguageCode' => $targetLanguageCode,
			'audio_file' => $audio_file
		));
		Session::save();
		
		// Return
		echo 1; die();
    }
   
}
