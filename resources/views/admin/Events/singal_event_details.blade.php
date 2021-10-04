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
                    Event Image
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
               {{$event->id}}
                </td>
                <td>
                {{$event->creator_name}}
                </td>
                <td>
                {{$event->ename}}
                </td>
                <td>
                {{$event->eaddress}}
                </td>
                <td>
                {{$event->date}}
                </td>
                <td>
                @if (!$event->eimage)
                 <img src="{{url('/images/'.'default.png')}}" class="img-circle" alt="No photo" style= "width:60px;height:60px;">
                 @else
                <img src="{{url('/images/'.$event->eimage)}}" class="img-circle" alt="user Image" style= "width:60px;height:60px;">
                @endif
               </td>
            </tr>
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Details</h3>
    <div class="card-tools">
    </div>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 40%">
                    Total Attends
                </th>
                <th style="width: 45%">
                    Not Attends
                </th>
                <th style="width: 40%">
                    Total Guest
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
               {{$userAttemptStatus['attend']}}
                </td>
                <td>
                {{$userAttemptStatus['not_attend']}}
                </td>
                <td>
                {{$TotalGuset}}
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