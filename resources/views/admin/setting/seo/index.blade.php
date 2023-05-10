@extends('layouts.admin')

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Seo Setting</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">SEO Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('setting.seo.update',$data->id)}}" method="Post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" value="{{ $data->meta_title }}" placeholder="Meta Title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Meta Author</label>
                    <input type="text" class="form-control" name="meta_author" value="{{ $data->meta_author }}" placeholder="Meta Author">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Meta Tag</label>
                    <input type="text" class="form-control" name="meta_tag" value="{{ $data->meta_tag }}" placeholder="Meta Tag">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Meta Description</label>                 
                   <textarea class="form-control" name="meta_description" placeholder="Meta Description" id="" cols="30" rows="10">{{ $data->meta_description }}</textarea>
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Google Anaytices</label>
                    <input type="text" class="form-control" name="google_analytics" value="{{ $data->google_analytics }}" placeholder="Google Anaytices">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Alexa Rank</label>
                    <input type="text" class="form-control" name="alex_rank" value="{{ $data->alex_rank }}" placeholder="Alexa Rank">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Google </label>
                    <input type="text" class="form-control" name="google_abs" value="{{ $data->google_abs }}" placeholder="Google Abse">
                  </div>                  

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
