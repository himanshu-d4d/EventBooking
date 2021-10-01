@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Users</h3>
    <div class="card-tools">
    <form method = "GET">
      <input type="text" name = "search" style = "margin-right:10px" value="{{isset($_GET['search'])?$_GET['search']:'' }}">
      <button type ="submit"><i class="fa fa-search"></i></button>
    </form>
    </div>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 8%">
                    Id
                </th>
                <th style="width: 20%">
                   Username
                </th>
                <th style="width: 20%">
                    Name
                </th>
                <th style="width: 20%">
                    Email
                </th>
                <th style="width: 15%">
                    profile Image
                </th>
                <th style="width: 8%">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
        @if(!empty($users) && $users->count())
        @foreach($users as $user)
            <tr>
            
                <td>
               {{$user->id}}
                </td>
                <td>
                {{$user->username}}
                </td>
                <td>
                {{$user->name}}
                </td>
                <td>
                {{$user->email}}
                </td>
                <td>
                <img src="{{url('/images/'.$user->image)}}" class="img-circle elevation-2" alt="User Image" style= "height:50px">
                </td>
                <td>
                <a class="btn btn-info btn-sm" href="{{url('admin/users-edit/'.$user->id)}}">Edit</a>
                <a class="btn btn-danger btn-sm" href="{{url('admin/users-delete/'.$user->id)}}">Delete</a>

                </td>
               
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="10">There are no data.</td>
            </tr>
        @endif
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
</section>
{{$users->links("pagination::bootstrap-4")}}
</div>  

@endsection