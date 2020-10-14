@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setting Ukuran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Setting Ukuran</li>
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
                <h3 class="card-title">Setting Ukuran</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('post-size.store', ['post_id' => $post->id]) }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Size</label>
                    @foreach ($sizes as $key => $size)
                        <div class="form-check">
                            @if($post->size->contains('id', $size->id))
                                <input class="form-check-input" type="checkbox" value="{{$size->id}}" name="size_id[]" id="size_id[]" checked>
                            @else
                                <input class="form-check-input" type="checkbox" value="{{$size->id}}" name="size_id[]" id="size_id[]">
                            @endif
                            <label class="form-check-label" for="size_id[]">{{$size->name}}</label>
                        </div>
                    @endforeach
                  </div>
                  <div class="form-group">
                    <label for="title">Variabel Size</label>
                    @foreach ($varSizes as $varSize)
                      <div class="form-check">
                        @if ($post->varSize->contains('id', $varSize->id))
                          <input class="form-check-input" type="checkbox" value="{{$varSize->id}}" name="var_size_id[]" id="var_size_id[]" checked>                          
                        @else
                          <input class="form-check-input" type="checkbox" value="{{$varSize->id}}" name="var_size_id[]" id="var_size_id[]">                                                      
                        @endif
                        <label class="form-check-label" for="var_size_id[]">{{$varSize->name}}</label>
                      </div>                        
                    @endforeach
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a  href="{{ route('post-size.index', ['post_id' => $post->id]) }}" class="btn btn-danger">Back</a>
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