<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function seo(){

        $data=DB::table('seos')->first();
         
        return view('admin.setting.seo.index',compact('data'));

    }

    public function update(Request $request,$id){
        
        $data=array();
        $data['meta_title']=$request->meta_title;
        $data['meta_author']=$request->meta_author;
        $data['meta_tag']=$request->meta_tag;
        $data['meta_description']=$request->meta_description;
        $data['google_analytics']=$request->google_analytics;
        $data['alex_rank']=$request->alex_rank;
        $data['google_abs']=$request->google_abs;

        DB::table('seos')->where('id',$id)->update($data);
        
        return redirect()->back();
    }
    
}
