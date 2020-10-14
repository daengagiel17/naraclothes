@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setting</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Setting</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('setting.update') }}" method="POST">
                @csrf @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="popular_id">Popular Id</label>
                    <input type="text" class="form-control" id="popular_id" name="popular_id" placeholder="Enter Popular Id" value="{{$setting->popular_id}}">
                  </div>
                  <div class="form-group">
                    <label for="post1_id">Post Id 1</label>
                    <input type="text" class="form-control" id="post1_id" name="post1_id" placeholder="Enter Post Id" value="{{$setting->post1_id}}">
                  </div>
                  <div class="form-group">
                    <label for="post2_id">Post Id 2</label>
                    <input type="text" class="form-control" id="post2_id" name="post2_id" placeholder="Enter Post Id" value="{{$setting->post2_id}}">
                  </div>
                  <div class="form-group">
                    <label for="post3_id">Post Id 3</label>
                    <input type="text" class="form-control" id="post3_id" name="post3_id" placeholder="Enter Post Id" value="{{$setting->post3_id}}">
                  </div>
                  <div class="form-group">
                    <label for="post4_id">Post Id 4</label>
                    <input type="text" class="form-control" id="post4_id" name="post4_id" placeholder="Enter Post Id" value="{{$setting->post4_id}}">
                  </div>
                  <div class="form-group">
                    <label for="post5_id">Post Id 5</label>
                    <input type="text" class="form-control" id="post5_id" name="post5_id" placeholder="Enter Post Id" value="{{$setting->post5_id}}">
                  </div>
                  <div class="form-group">
                    <label for="post6_id">Post Id 6</label>
                    <input type="text" class="form-control" id="post6_id" name="post6_id" placeholder="Enter Post Id" value="{{$setting->post6_id}}">
                  </div>
                  <div class="form-group">
                    <label for="whatsapp">Whatsapp</label>
                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="Enter Whatsapp" value="{{$setting->whatsapp}}">
                  </div>
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('setting.show') }}" class="btn btn-danger">Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection