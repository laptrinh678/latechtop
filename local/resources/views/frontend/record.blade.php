@extends('frontend.layout')
@section('title')
無題ドキュメント
@endsection('title')
@section('style')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('app_html/js/jquery.form.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('app_html/css/loading.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app_html/recorder/style.css')}}">
<link rel="stylesheet" href="{{asset('app_html/css/destyle.css')}}">
<link rel="stylesheet" href="{{asset('app_html/css/template.css')}}">
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<link rel="stylesheet" href="{{asset('app_html/css/top.css')}}">
<!-- InstanceEndEditable -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<style>
.loading_text {
    text-align: center;
    font-size: 9vw;
    font-weight: bold;
    color: #59606d;
}
#frmIssue{ position: relative;}
#item_tranlate{  position: absolute;
    z-index: 100;
    background: white; 
    display: none;
    width: 100%;
    }
.text{text-align: center;
    display: block;
    padding: 8px;}
</style>
@endsection('style')

@section('content')
<form id="frmIssue" action="" enctype="multipart/form-data" method="post">
    <div id="controls">
        <!-- <button id="recordButton">Record</button>  -->
        <!-- <button id="pauseButton" disabled>Pause</button> -->
        <!-- <button id="stopButton" disabled>Stop</button> -->
    </div>
    <div id="formats">Format: start recording to see sample rate</div>
    <!-- <p><strong>Recordings:</strong></p>  -->
    <ol id="recordingsList"> </ol>
    <div class="record_button">
        <a href="javascript:void(0);" id="stopButton">
            <img src="{{url('app_html/images')}}/record.png">
            <br>
            <span class="text">録音終了</span>
        </a>
      
      
    </div>

    <div id="item_tranlate">
        <div class="logo_img" >
            <img src="{{asset('app_html/images/logo.png')}}"/>
           
        </div>
      
        <p class="loading_text">ハナセール</p>
    </div>
    <input type="hidden" id="language" name="languageCode" value="">
    <input type="hidden" id="language2" name="targetLanguageCode" value="">
    <textarea class="hidden d-none" id="audio_file" name="audio_file"></textarea>
    {{csrf_field()}}
</form>
</div>
@endsection('content')
@section('script')
<script src="{{asset('app_html/recorder/app.js')}}"></script>
<script src="{{asset('app_html/recorder/recorder.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() 
{
    var sesion_language = sessionStorage.getItem("language");
    var sesion_language2 = sessionStorage.getItem("language2");
    $('#language').val(sesion_language);
    $('#language2').val(sesion_language2);
    var timebig = sessionStorage.getItem("timebig");
    //console.log(timebig);
    if (timebig == 1) 
    {
        alert('記録時間制限を超えました');
    }
  
    $('#stopButton').click(function(){
        $('#item_tranlate').show();
    })
})
</script>
@endsection('script')
