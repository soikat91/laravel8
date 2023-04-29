<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
   public function __construct()
   {
        $this->middleware('auth');
   }

   
   public function index(){
     
     $data=DB::table('categories')->get();
     //return response()->json($data);
    //  echo "<pre>";
    //   print_r($data);
    //   exit();

    return view("admin.category.category.index",compact('data'));

   }

   public function store(Request $request){
       
    $validated = $request->validate([
        'category_name' => 'required|unique:categories|max:55',        
    ]);


   $data=array();
   $data['category_name']=$request->category_name;
   $data['category_slug']=Str::slug($request->category_name,'-');
   
    DB::table('categories')->insert($data);
    $notification=array('message'=>"Category Inserted",'alert-type'=>"success");

    return redirect()->back()->with($notification);

     
   }
}
