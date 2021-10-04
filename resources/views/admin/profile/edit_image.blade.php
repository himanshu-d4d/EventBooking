@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style = "margin-left:130px">Image Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Image Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
      <div class="row">
        <div class="col-md-10" style = "margin-left:140px">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form action = "{{url('admin/edit-image')}}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="card-body">
              <div class="form-group">
              <input type="hidden" class="form-control" name ="id" value = "{{AuthData()->id}}" />
                <label for="inputName">Image</label><br>
                <input type="hidden" class="form-control" value="{{AuthData()->image}}" name ="old_image"/>
                @if (!AuthData()->image)
               <img src="{{url('/images/'.'default.png')}}" class="img-circle" alt="No photo" style= "width:60px;height:60px;">
                 @else
                <img src="{{url('/images/'.AuthData()->image)}}" class="img-circle" alt="user Image" style= "width:60px;height:60px;">
                @endif
                <br><br>
                 <input type="file" class="form-control" name ="image" />
              </div>
              <div class="row">
                <div class="col-7">
                <a href="#" class="btn btn-secondary" style ="margin-left:75%">Cancel</a>
                <input type="submit" value="Save Changes" class="btn btn-success float-right">
                </div>
            </div>
            </div>
         </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
    <!-- /.content -->
  </div>
  
    </section>

    <!-- /.content -->
  </div>
  @endsection