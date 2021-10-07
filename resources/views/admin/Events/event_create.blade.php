@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style = "margin-left:130px">New Event</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Event</li>
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
              <h3 class="card-title">Create New</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form action = "{{url('admin/Events-store')}}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="card-body">
            <input type="hidden" name ="creator_name" class="form-control" value="" id = "creator_name">
            <div class="form-group">
            <label for="inputName">Creator</label>
            <select class="form-control" name="user_id" id = "select_id">
            <option value="Select Part">Select Creator</option>  
                @foreach(listAllUsers() as $users)                  
                    <option value="{{$users->id}}" data-tokens="Part 1">{{$users->name}}</option>
               @endforeach    
            </select>
              </div>
              <div class="form-group">
                <label for="inputName">Event Name</label>
                <input type="text" name ="ename" class="form-control" value="">
                @if ($errors->has('ename')) <p class="alert-danger">{{ $errors->first('ename') }}</p> @endif
              </div>
              <div class="form-group">
                <label for="inputName">Event Address</label>
                <input type="text" name="eaddress" class="form-control" value="">
                @if ($errors->has('eaddress')) <p class="alert-danger">{{ $errors->first('eaddress') }}</p> @endif  
              </div>
              <div class="form-group">
                <label for="inputName">Event Price</label>
                <input type="text" name="eprice" class="form-control" value="">
                @if ($errors->has('eprice')) <p class="alert-danger">{{ $errors->first('eprice') }}</p> @endif
              </div>
              <div class="form-group">
                <label for="inputName">Date</label>
                <input type="date" name="date" class="form-control" value="">
                @if ($errors->has('date')) <p class="alert-danger">{{ $errors->first('date') }}</p> @endif
              </div>
              <div class="form-group">
                <label for="inputName">Description</label><br />
                <textarea id="w3review" name="description" class="form-control" rows="4" cols="50">
                 </textarea>
                @if ($errors->has('description')) <p class="alert-danger">{{ $errors->first('description') }}</p> @endif
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
 <script>
   $(document).ready(function(){
    $("#select_id").change(function() {
    var username = $(this).find("option:selected").text();
    //var result=username.split('');
    //alert(username);
    $('#creator_name').val(username);
});             
   });
 </script>
  @endsection