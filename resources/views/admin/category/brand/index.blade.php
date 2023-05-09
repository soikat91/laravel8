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
                            <h3 class="card-title">Brand</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="" class="table table-bordered table-striped table-sm y_table">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Brand Name</th>
                                    <th>Brand Slug</th>
                                    <th>Brand Logo</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Create Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form action="{{ route("brand.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group">

                        <label for="category_name">Brand Name</label>
                        <input type="text" class="form-control" name="brand_name" id="brand_name">

                    </div>
                    <div class="form-group">

                        <label for="category_name">Brand Logo</label>
                        <input type="file" class="form-control" name="brand_logo" id="brand_logo">

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
                <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
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

    $(function barand(){

        let ytable=$('.y_table').DataTable({

                processing:true,
                serverSide:true,
                ajax:"{{route('brand.index')}}",
                columns:[
                  
                        {data:'DT_RowIndex',name:'DT_RowIndex'},
                        {data:'brand_name',name:'brand_name'},
                        {data:'brand_slug',name:'brand_slug'},
                        {data:'brand_logo',name:'brand_logo',render: function(data,type,full,meta){
                            return "<img src=\""+data+"\" height=\"40\" />"
                        }},
                        
                        {data:'action', name:'action', orderable:true,searchable:true}
                
                    ]
        })
                

    })

    $('body').on('click','.editBrand',function(){
       
     
         let brandId=$(this).data('id');
         //alert(brandId);//testing

        $.get('brand/edit/'+brandId,function($data){
            
        $('#modal_body').html($data);
        
            
        })
    })

    // child category data edit javascript
    // $('body').on('click','.edit',function(){

    //     let childCategoryId=$(this).data('id');

    //     $.get('childcategory/edit/'+childCategoryId,function($data){

    //         $('#modal_body').html($data);
    //     })



    // })
</script>

@endsection
