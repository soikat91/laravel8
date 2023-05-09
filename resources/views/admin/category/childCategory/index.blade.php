@extends('layouts.admin')
@section('admin_content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button class="btn btn-primary" data-toggle="modal" data-target="#childCategoryModal"> + Add New</button>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Child Category</h3>
                </div>
                <!-- /.card-header -->
                  <div class="card-body">
                    <table id="" class="table table-bordered table-striped table-sm y-table">
                      <thead>
                      <tr>
                        <th>SL</th>
                        <th>Child Category Name</th>
                        <th>Child Category Slug</th>
                        <th>Sub Category Name</th>                     
                        <th>Category Name</th>                     
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody> 
                     
                  
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
      </div>
  </section>
  </div>

  <!-- Insert Category Modal Start -->
<div class="modal fade" id="childCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Child Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        

            <form action="{{ route('childCategory.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                         
                        <label for="category_name">Category/Sub Category</label>
                        
                        <select class="form-control" name="subcategory_id">

                            <option value="">select One</option>
                            @foreach ($category as $row)

                            @php
                                $subCat=DB::table('sub_categories')->where('category_id',$row->id)->get();
                            @endphp
                              <option value="{{ $row->id }}">{{ $row->category_name }}</option> 
                              @foreach ($subCat as $row)
                              <option value="{{ $row->id }}">---{{ $row->subcategory_name }}</option> 
                              @endforeach
                            

                            @endforeach
                            
                        </select>
                        
                    </div>
                    <div class="form-group">
                         
                        <label for="category_name">Child Category Name</label>
                        <input type="text" class="form-control" name="childCategory_name" id="category_name">
                        
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        
      
      </div>
    </div>
  </div>

   <!--Edit Category Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit SubCategory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div id="modal_body">

      </div>  

    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
   
    $(function childCategory(){

      let ytable=$('.table').DataTable({
        processing:true,
        serverSide:true,
        ajax:"{{ route('childcategory.index') }}",
        columns:[
          {data:'DT_RowIndex' ,name:'DT_RoxIndex'},
          {data:'childCategoryName', name:'childCategoryName'},
          {data:'childCategorySlug', name:'childCategorySlug'},
          {data:'subcategory_name', name:'subcategory_name'},
          {data:'category_name', name:'category_name'},
          {data:'action',name:'action',orderable:true,searchable:true}
        ]
      })
    })




// child category data edit javascript
    $('body').on('click','.edit',function(){
      
        let childCategoryId=$(this).data('id');
        
        $.get('childcategory/edit/'+childCategoryId,function($data){

          $('#modal_body').html($data);
        })  


    
    })
</script>

@endsection