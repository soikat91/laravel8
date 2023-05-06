<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index(){

        // query builder
        // $data=DB::table('sub_categories')->leftJoin('categories','sub_categories.category_id','categories.id')
        //                     ->select('sub_categories.*','categories.category_name')->get();
                            
                            
        // $category=DB::table('categories')->get(); 
        
        
        //ORM
        $data=SubCategory::all();
        $category=Category::all();

        return view('admin.category.subCategory.index',compact('data','category'));
        //echo "hi";
       }

     public function store(Request $request){


        $validated = $request->validate([
            'subcategory_name' => 'required|max:55',        
        ]);

        // $data=array();
        
        // $data['subcategory_name']=$request->subcategory_name;
        // $data['subcategory_slug']=Str::slug($request->subcategory_name,'-') ;
        // $data['category_id']=$request->category_id;

        // DB::table('sub_categories')->insert($data);

        //Eloquent orm
        SubCategory::insert(
            [
                'subcategory_name'=>$request->subcategory_name,
                'subcategory_slug'=>Str::slug($request->subcategory_name,'-'),
                'category_id'=>$request->category_id,

            ]
            );
        
        return redirect()->back();
     }  


     public function edit($id){
           
        // $data=DB::table('sub_categories')->get();
        $data=SubCategory::find($id);

        $category=DB::table('categories')->get();
        
       // return response()->json($data);

      return view('admin.category.subCategory.edit',compact('data','category'));

     }


     public function update(Request $request){

        // $validated = $request->validate([
        //     'subcategory_name' => 'required|max:55',        
        // ]);

        $data=array();
        $data['category_id']=$request->category_id;
        $data['subcategory_name']=$request->subcategory_name;
        $data['subcategory_slug']=Str::slug($request->subcategory_name,'-');
        //dd($data);

         DB::table('sub_categories')->where('id',$request->id)->update($data);        
        return redirect()->back();
     }


     public function destroy($id){

        // query builder
       // DB::table('sub_categories')->where('id',$id)->delete();

        // orm
       $subcategory= SubCategory::find($id);
       $subcategory->delete();

        return redirect()->back();

     }

}
