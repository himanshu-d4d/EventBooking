@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style = "margin-left:130px">Profile Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile Edit</li>
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
            <form action = "{{url('admin/editprofile')}}" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group">
              <input type="hidden" name ="id" class="form-control" value="{{AuthData()->id}}"  >
                <label for="inputName">Username</label>
                <input type="text" name ="username" class="form-control" value="{{AuthData()->username}}"  disabled>
              </div>
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" name="name" class="form-control" value="{{AuthData()->name}}">
                @if ($errors->has('name')) <p class="alert-danger">{{ $errors->first('name') }}</p> @endif
              </div>
              <div class="form-group">
                <label for="inputName">Email</label>
                <input type="text" name="email" class="form-control" value="{{AuthData()->email}}">
                @if ($errors->has('email')) <p class="alert-danger">{{ $errors->first('email') }}</p> @endif
              </div>
              <div class="form-group">
                <label for="inputName">Image</label><br>
                @if (!AuthData()->image)
                <a href = "{{url('admin/image')}}"><img src="{{url('/images/'.'default.png')}}" class="img-circle" alt="No photo" style= "width:60px;height:60px;"></a>
                 @else
                 <a href = "{{url('admin/image')}}"><img src="{{url('/images/'.AuthData()->image)}}" class="img-circle" alt="user Image" style= "width:60px;height:60px;"></a>
                @endif
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