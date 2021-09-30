@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Profile</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
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
                <th style="width: 20%">
                    profile Image
                </th>
                <th style="width: 8%">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                {{AuthData()->id}}
                </td>
                <td>
                {{AuthData()->username}}
                </td>
                <td>
                {{AuthData()->name}}
                </td>
                <td>
                {{AuthData()->email}}
                </td>
                <td>
                <img src="{{url('/images/'.AuthData()->image)}}" class="img-circle elevation-2" alt="User Image" style= "height:50px">
                </td>
                <td>
                <a class="btn btn-info btn-sm" href="{{url('admin/profile/'.AuthData()->id)}}">Edit</a>
                </td>
               
            </tr>

        </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
</div>  
@endsection