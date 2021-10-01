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
            <form action = "{{url('admin/users-store')}}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Username</label>
                <input type="text" name ="username" class="form-control" value="{{ old('name') }}">
                @if ($errors->has('username')) <p class="alert-danger">{{ $errors->first('username') }}</p> @endif
              </div>
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @if ($errors->has('name')) <p class="alert-danger">{{ $errors->first('name') }}</p> @endif  
              </div>
              <div class="form-group">
                <label for="inputName">Email</label>
                <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                @if ($errors->has('email')) <p class="alert-danger">{{ $errors->first('email') }}</p> @endif
                @if(session()->has('error'))
                  <p class="alert-danger">
                      {{ session()->get('error') }}
                    </p>
                  @endif
              </div>
              <div class="form-group">
                <label for="inputName">Password</label>
                <input type="text" name="password" class="form-control" value="">
                @if ($errors->has('password')) <p class="alert-danger">{{ $errors->first('password') }}</p> @endif
              </div>
              <div class="form-group">
                <label for="inputName">Confirm Password</label>
                <input type="text" name="c_password" class="form-control" value="">
                @if ($errors->has('c_password')) <p class="alert-danger">{{ $errors->first('c_password') }}</p> @endif
              </div>
              <div class="form-group">
                <label for="inputName">Image</label><br/>
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