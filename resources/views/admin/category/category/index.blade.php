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
              <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal"> + Add New</button>
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
                  <h3 class="card-title">All categories list here</h3>
                </div>
                <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-sm">
                      <thead>
                      <tr>
                        <th>SL</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>                     
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
  
                    @foreach ($data as $key=>$category )
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->category_slug }}</td>
                       
                        <td>
                            <a href="" class="btn btn-primary btn-sm edit" data-id="{{ $category->id }}" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
                            <a href="{{ route("category.delete",$category->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
                        </td>
                     
                      </tr>
                    @endforeach
                     
                  
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
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        

            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                         
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="category_name">
                        
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      

          <form action="{{ route('category.update') }}" method="POST">
              @csrf
              <div class="modal-body">

                  <div class="form-group">
                       
                      <label for="category_name">Category Name</label>
                      <input type="text" class="form-control" name="category_name" id="edit_category_name">
                      <input type="hidden" class="form-control" name="id" id="edit_category_id">
                      
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
              </div>
          </form>

      
    
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
   
   $('body').on('click','.edit',function(){

      let catgory_id=$(this).data('id');
      //alert(catgory_id);

      $.get('category/edit/'+catgory_id,function(data){

       // console.log(data); test purpose
       $('#edit_category_name').val(data.category_name);//database table filed name
       $('#edit_category_id').val(data.id);//database table field name
    
      })
   })
</script>

@endsection