<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Yajra\DataTables\Contracts\DataTable;
use DataTables;

use Illuminate\Support\Str;
use Image;
use File;




class BrandController extends Controller
{
   function  index(Request $request){
    
        if($request->ajax()){

            $brand=DB::table('brand')->get();


            return DataTables::of($brand)

                ->addIndexColumn()
                ->addColumn('action',function ($row){
                    $actionButton='<a href="#" class="btn btn-primary btn-sm editBrand" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
                        <a href="'.route('brand.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';
     
                    return $actionButton;
                })
                ->rawColumns(['action'])
                ->make(true);
     
        }
      

       return view('admin.category.brand.index');
   }


   public function store(Request $request){

    $slug=Str::slug($request->brand_name,'-');
        $data=array();     
        $data['brand_name']=$request->brand_name;
        $data['brand_slug']=Str::slug($request->brand_name,'-');
        $photo=$request->brand_logo;
        $photoName=$slug.'.'.$photo->getClientOriginalExtension();//jpg png etc 
        $photo->move('public/files/brand/',$photoName);///photo move kore file rakha hoice
        //Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoName);
        $data['brand_logo']='public/files/brand/'.$photoName;///database a save kore rakher jnno        
        //dd($data);
        DB::table('brand')->insert($data);        
        return redirect()->back();    
    }
   public function edit($id){

        $data=DB::table('brand')->where('id',$id)->first();

        return view('admin.category.brand.edit',compact('data'));   
        
   }
   public function update(Request $request){


        $slug=Str::slug($request->brand_name,'-');
        $data=array();
        $data['brand_name']=$request->brand_name;
        $data['brand_slug']=Str::slug($request->brand_name,'-');

        if($request->brand_logo){

           if( File::exists($request->old_brand_logo)){
                unlink($request->old_brand_logo);
            }

            $photo=$request->brand_logo;
            $photoName=$slug.'.'.$photo->getClientOriginalExtension();
            $photo->move('public/files/brand',$photoName);
            $data['brand_logo']='public/files/brand/'.$photoName;

            //dd($data);

            DB::table('brand')->where('id',$request->id)->update($data);
            return redirect()->back(); 
        }else{
            $photo=$request->old_brand_logo;       
          
            DB::table('brand')->where('id',$request->id)->update($data);
            return redirect()->back();
        }
   }

   public function delete($id){

        $data=DB::table('brand')->where('id',$id)->first();

        // dd($data);

        $image=$data->brand_logo;

        if(File::exists($image)){

            unlink($image);//image delete korar jnno use kora hoice            
        }

            DB::table('brand')->where('id',$id)->delete();
            return redirect()->back();    

   }
}
