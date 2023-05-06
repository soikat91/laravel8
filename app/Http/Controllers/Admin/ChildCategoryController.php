<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Str;



class ChildCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index(Request $request){

    if($request->ajax()){

            $data=DB::table('child_category_tables')->leftJoin('categories','child_category_tables.category_id','categories.id')
                                    ->leftJoin('sub_categories','child_category_tables.sub_category_id','sub_categories.id')
                                    ->select('child_category_tables.*','categories.category_name','sub_categories.subcategory_name')->get();


            //  echo "<pre>";
            //  print_r($data);
            //  exit();    
            
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action',function($row){

                        $actionButton='<a href="#" class="btn btn-primary btn-sm edit" data-id="{{ $row->id }}" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
                        <a href="'.route('childCategory.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                        return $actionButton;

                    })
                    ->rawColumns(['action'])
                    ->make(true);

     }

     $category=DB::table('categories')->get();
     return view('admin.category.childcategory.index',compact('category'));

    }


    public function store(Request $request){
        

        //dd($request->all());

        $subCat=DB::table('sub_categories')->where('id',$request->subcategory_id)->first();

        $data=array();

        $data['category_id']=$subCat->category_id;
        $data['sub_category_id']=$request->subcategory_id ;
        $data['childCategoryName']=$request->childCategory_name ;
        $data['childCategorySlug']=Str::slug($request->childCategory_name) ;
        // dd($data);

        DB::table('child_category_tables')->insert($data);
        return redirect()->back();
           

            
    }


    public function delete($id){


        //DB::table('child_category_tables')->where('id',$id)->delete();
        
        return redirect()->back();
    }

}
