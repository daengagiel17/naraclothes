@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Isi Ukuran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Isi Ukuran</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Isi Ukuran {{$post->id}} </h3>
              </div>
              <!-- /.card-header -->

              <form role="form" action="{{ route('post-size.update', ['post_id' => $post->id]) }}" method="POST">
                @csrf @method('PUT')
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <tr>
                      <th>Size</th>
                      @foreach ($varSizes as $varSize)
                        <th>{{$varSize->name}}</th>                        
                      @endforeach
                    </tr>
                    @foreach ($sizes as $size)
                      <tr>
                        <td>{{$size->name}}</td>
                        @foreach ($post->size as $sizePost)
                          @if ($size->id == $sizePost->id)
                            <td>
                              <div class="form-group">
                                <input type="number" class="form-control" id="number[{{$sizePost->id}}][{{$sizePost->pivot->var_size_id}}]" name="number[{{$sizePost->id}}][{{$sizePost->pivot->var_size_id}}]" value="{{$sizePost->pivot->number}}">
                              </div>                          
                            </td>                            
                          @endif
                        @endforeach
                      </tr>                      
                    @endforeach
                  </table>
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
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection