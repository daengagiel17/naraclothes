@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post Size</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Post Size</li>
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
                <h3 class="card-title">List of Post Size {{$post->id}} </h3>
                <div class="card-tools">
                  <a href="{{ route('post.index') }}" class="btn btn-sm btn-danger"><i class="fas fa-chevron-left"></i> Back</a>
                  @if ($varSizes->isNotEmpty())
                    <a href="{{ route('post-size.destroy', ['post_id' => $post->id]) }}" class="btn btn-sm btn-danger"
                        onclick="event.preventDefault();
                        document.getElementById('destroy-form').submit();">                    
                      <i class="fas fa-cog"></i> Set Ulang
                    </a>                      
                    <form id="destroy-form" action="{{ route('post-size.destroy', ['id' => $post->id]) }}" method="POST" style="display: none;">
                        @csrf @method('DELETE')
                    </form>
                  @else
                    <a href="{{ route('post-size.create', ['post_id' => $post->id]) }}" class="btn btn-sm btn-success"><i class="fas fa-cog"></i> Setting Ukuran</a>
                  @endif
                  <a href="{{ route('post-size.edit', ['post_id' => $post->id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Isi Ukuran</a>
                </div>
              </div>
              <!-- /.card-header -->
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
                          <td>{{$sizePost->pivot->number}}</td>                            
                        @endif
                      @endforeach
                    </tr>                      
                  @endforeach
                </table>
              </div>
              <!-- /.card-body -->
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