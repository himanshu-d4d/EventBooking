@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style = "margin-left:130px">New User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New User</li>
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
            <form action = "{{url('admin/Events-update')}}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="card-body">
            <div class="form-group">
            <label for="inputName">Users</label>
             <input type="text" name ="creator_name" class="form-control" value="{{$Events->creator_name}}" disabled>
              </div>
              <div class="form-group">
              <input type="hidden" name ="id" class="form-control" value="{{$Events->id}}"  >
                <label for="inputName">Event Name</label>
                <input type="text" name ="ename" class="form-control" value="{{$Events->ename}}">
              </div>
              <div class="form-group">
                <label for="inputName">Event Address</label>
                <input type="text" name="eaddress" class="form-control" value="{{$Events->eaddress}}">
              </div>
              <div class="form-group">
                <label for="inputName">Event Price</label>
                <input type="text" name="eprice" class="form-control" value="{{$Events->eprice}}">
              </div>
              <div class="form-group">
                <label for="inputName">Date</label>
                <input type="text" name="date" class="form-control" value="{{$Events->date}}">
              </div>
              <div class="form-group">
                <label for="inputName">Description</label>
                <input type="text" name="description" class="form-control" value="{{$Events->description}}">
              </div>
              <div class="form-group">
                <label for="inputName">Image</label><br/>
                @if (!$Events->eimage)
                 <img src="{{url('/images/'.'default.png')}}" class="img-circle" alt="No photo" style= "width:60px;height:60px;">
                 @else
                <img src="{{url('/images/'.$Events->eimage)}}" class="img-circle" alt="user Image" style= "width:60px;height:60px;">
                @endif
                <input type="hidden" class="form-control" name ="old_image" value ="{{$Events->eimage}}"/>
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