@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gambar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Gambar</li>
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
                <h3 class="card-title">List of Gambar {{$post_id}} </h3>
                <div class="card-tools">
                  <a href="{{ route('post.index') }}" class="btn btn-sm btn-danger"><i class="fas fa-chevron-left"></i> Back</a>
                  <a href="{{ route('gambar.create', ['post_id' => $post_id]) }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Create</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($gambars as $gambar)
                    <tr>
                      <td>{{$gambar->id}}</td>
                      <td>
                        <img src="{{ asset($gambar->url)}}" alt="" width="70">  
                      </td>
                      <td>
                        <a class="btn btn-sm btn-danger" href="{{ route('gambar.destroy', ['post_id' => $post_id, 'id' => $gambar->id]) }}"
                            onclick="event.preventDefault();
                                          document.getElementById('destroy-form-{{$gambar->id}}').submit();">
                            <i class="fas fa-trash"></i>
                        </a>
                        <form id="destroy-form-{{$gambar->id}}" action="{{ route('gambar.destroy', ['post_id' => $post_id, 'id' => $gambar->id]) }}" method="POST" style="display: none;">
                            @csrf @method('DELETE')
                        </form>
                      </td>
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