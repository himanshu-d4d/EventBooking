@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Users</h3>
    <div class="card-tools">
    </div>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 8%">
                    Id
                </th>
                <th style="width: 12%">
                    Creator Name
                </th>
                <th style="width: 12%">
                    Event Name
                </th>
                <th style="width: 10%">
                    Event Address
                </th>
                <th style="width: 10%">
                    Event Date
                </th>
                <th style="width: 8%">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
        @if(!empty($Events) && $Events->count())
        @foreach($Events as $Event)
            <tr>
            
                <td>
               {{$Event->id}}
                </td>
                <td>
                {{$Event->creator_name}}
                </td>
                <td>
                {{$Event->ename}}
                </td>
                <td>
                {{$Event->eaddress}}
                </td>
                <td>
                {{$Event->date}}
                </td>
                <td>
                <a class="btn btn-success btn-sm" href="{{url('admin/singal-event-details/'.$Event->id)}}">View</a>
                <a class="btn btn-info btn-sm" href="{{url('admin/Events-Edit/'.$Event->id)}}">Edit</a>
                <a class="btn btn-danger btn-sm" href="{{url('admin/Events-delete/'.$Event->id)}}">Delete</a>
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
{{$Events->links("pagination::bootstrap-4")}}
</div>  

@endsection