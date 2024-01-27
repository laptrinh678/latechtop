<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use App\Models\Cate;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $data['slider'] = DB::table('sliders')->where('slider_type',1)->whereNull('deleted_at')->get();
        $data['slider_doitac'] = DB::table('sliders')->where('slider_type',5)->whereNull('deleted_at')->get();
        $data['imfomation']=DB::table('imfomations')->first();
        $data['menu_ngang'] = DB::table('cates')->where('parent_id',0)->where('menu_type',1)->whereNull('deleted_at')->get();
        $data['menu_sp'] = DB::table('cates')->where('parent_id',23)->whereNull('deleted_at')->OrderBy('id','desc')->get();
        $data['sp_noibat'] = DB::table('products')->where('outstanding',1)->whereNull('deleted_at')->OrderBy('id','desc')->get();
        $data['menu_sp_footer'] = DB::table('cates')->where('parent_id',23)->whereNull('deleted_at')->OrderBy('id','desc')->limit(9)->get();
        $data['menu_new'] = DB::table('cates')->where('type_menu',0)->whereNull('deleted_at')->OrderBy('id','desc')->limit(9)->get();
        $data['menu_chantrang'] = DB::table('cates')->where('parent_id',0)->where('menu_type',2)->whereNull('deleted_at')->get();
        $data['blogFullPage'] = DB::table('products')->where('cate_id',89)->orderBy('id', 'desc')->limit(20)->get();
        view()->share($data);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
