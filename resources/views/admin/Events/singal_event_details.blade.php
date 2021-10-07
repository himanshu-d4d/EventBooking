@extends('admin.layouts.master')
@section('content')
<?php
 $alleventUser = listAllEventUser($event->id);

 $listNotAteendUser = listNotAttendEventUser($event->id);

 //dd($listNotAteendUser);
 $CountAllComments = CountEventComments($event->id);

 //dd($CountAllComments);
 $CountAlllikes = CountEventlikes($event->id);

 $listUserComments = listUsercomments($event->id);

 $listTotalUsers = listTotalUsers($event->id);

 $userLikeslist = listlikesEventUser($event->id);
 //dd($userLikeslist );
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Event Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Event Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Event Detail</h3>
        </div>
        <div class="card-body">
          <div class="row">
          <div class="col-12 col-md-12 col-lg-4 order-1 order-md-1">
          <h3 class="text-primary"><i class="fa fa-calendar"></i> <?php echo ucfirst("$event->ename");?></h3>
          <p class="text-muted">{{$event->description}}</p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Event Address
                  <b class="d-block"><?php echo ucfirst("$event->eaddress");?></b>
                </p>
                <p class="text-sm">Event Creator                
                  <b class="d-block"><?php echo ucfirst("$event->creator_name");?></b>
                </p>
                <p class="text-sm">Event Date                
                  <b class="d-block">{{$event->date}}</b>
                </p>
              </div>

              <h5 class="mt-5 text-muted">Event Image</h5>
              <ul class="list-unstyled">
                <li>
                @if (!$event->eimage)
                 <img src="{{url('/images/'.'default.png')}}" class="img-circle" alt="No photo" style= "width:60px;height:60px;">
                 @else
                <img src="{{url('/images/'.$event->eimage)}}" class="img-circle" alt="user Image" style= "width:60px;height:60px;">
                @endif
                </li>
              </ul>
              <div class="text-left mt-5 mb-3">
                <a href="{{url('admin/Events-Edit/'.$event->id)}}" class="btn btn-sm btn-primary">Edit Event</a>
                <a href="{{url('admin/Events-List')}}" class="btn btn-sm btn-warning">Back</a>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-2">
              <div class="row">
                <div class="col-12 col-sm-2" >
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Attend Guest</span>
                      <span class="info-box-number text-center text-muted mb-0">{{$userAttemptStatus['attend']}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-2" style="margin-left: 18px">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Not Attend Guest</span>
                      <span class="info-box-number text-center text-muted mb-0" data-toggle="modal" data-target="#notAttendUser">{{$userAttemptStatus['not_attend']}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-2" style="margin-left: 18px">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total Guest</span>
                      <span class="info-box-number text-center text-muted mb-0" data-toggle="modal" data-target="#TotalUSerModal">{{$TotalGuset}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-2" style="margin-left: 18px">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Comments</span>
                      <span class="info-box-number text-center text-muted mb-0" data-toggle="modal" data-target="#EventCommentsModal">{{$CountAllComments}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-2" style="margin-left: 18px">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Likes</span>
                      <span class="info-box-number text-center text-muted mb-0" data-toggle="modal" data-target="#eventLikeUsers">{{$CountAlllikes}}</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Attend Guest List</h4>
                  <!-- ///////////////////////////// -->
                  <table class="table table-striped projects">
                      <thead>
                          <tr>
                              <th style="width: 8%">
                               Id
                              </th>
                              <th style="width: 12%">
                               Name
                              </th>
                              <th style="width: 12%">
                               Username
                              </th>
                              <th style="width: 10%">
                               Email
                              </th>
                              <th style="width: 8%">
                               User Image
                              </th>
                          </tr>
                      </thead>
                      @if(!empty($alleventUser) && $alleventUser->count())
                      @if(count($alleventUser))
                      @foreach($alleventUser as $users)
                    <tbody>
                      <tr>
                          <td>
                          {{$users->id}}
                          </td>
                          <td>
                          <?php echo ucfirst("$users->name");?>
                          </td>
                          <td>
                          <?php echo ucfirst("$users->username");?>
                          </td>
                          <td>
                          <?php echo ucfirst("$users->email");?>
                          </td>
                          <td>
                          @if (!$users->image)
                            <img src="{{url('/images/'.'default.png')}}" class="img-circle" alt="No photo" style= "width:60px;height:60px;">
                            @else
                            <img src="{{url('/images/'.$users->image)}}" class="img-circle" alt="user Image" style= "width:60px;height:60px;">
                            @endif
                          </td>
                        </tr>
                      </tbody>
                      @endforeach
                      @endif
                      @else
                        <tr>
                            <td colspan="10">There are no data.</td>
                        </tr>
                        @endif
                    </table >
                    {{$alleventUser->links("pagination::bootstrap-4")}}
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
<!-- /////////////////////////////////////////////////////////////////////////////////////// -->
 <!-- Total Comments in Events Modal Box -->
    <div class="container">
  <!-- The Modal -->
<div class="modal" id="EventCommentsModal">
  <div class="modal-dialog">
    <div class="modal-content" style = "width:700px">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Comments</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="height: 363px;overflow-y: scroll;">
          <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Username</th>
        <th>Comment</th>
        <th> Image</th>
      </tr>
    </thead>
    <?php $i=1 ?>
    @foreach($listUserComments as $comments)
    <tbody>
      <tr>
        <td>{{$i++}}</td>
        <td>{{$comments->name}}</td>
        <td>{{$comments->username}}</td>
        <td>{{$comments->comment}}</td>
        <td> 
          @if (!$comments->image)
            <img src="{{url('/images/'.'default.png')}}" class="img-circle" alt="No photo" style= "width:60px;height:60px;">
            @else
            <img src="{{url('/images/'.$comments->image)}}" class="img-circle" alt="user Image" style= "width:60px;height:60px;">
         @endif
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
  </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>
<!-- ////////////////////////// -->
  <!-- Total Event Users Modal Box -->
<div class="container">
  <!-- The Modal -->
<div class="modal" id="TotalUSerModal">
  <div class="modal-dialog">
    <div class="modal-content" style = "width:700px">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Total Guest</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="height: 363px;overflow-y: scroll;">
          <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Image</th>
      </tr>
    </thead>
    <?php $i=1 ?>
    @foreach($listTotalUsers as $eventUsers)
    <tbody>
      <tr>
        <td>{{$i++}}</td>
        <td>{{$eventUsers->name}}</td>
        <td>{{$eventUsers->username}}</td>
        <td>{{$eventUsers->email}}</td>
        <td> 
          @if (!$eventUsers->image)
            <img src="{{url('/images/'.'default.png')}}" class="img-circle" alt="No photo" style= "width:60px;height:60px;">
            @else
            <img src="{{url('/images/'.$eventUsers->image)}}" class="img-circle" alt="user Image" style= "width:60px;height:60px;">
         @endif
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
  </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>
<!-- ////////////////////////////////////////////////////////// -->
     <!-- Not Attend Users Modal -->
     <div class="container">
  <!-- The Modal -->
<div class="modal" id="notAttendUser">
  <div class="modal-dialog">
    <div class="modal-content" style = "width:700px">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Not Attend Guest</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="height: 363px;overflow-y: scroll;">
          <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Image</th>
      </tr>
    </thead>
    <?php $i=1 ?>
    @foreach($listNotAteendUser as $notAttendUser)
    <tbody>
      <tr>
        <td>{{$i++}}</td>
        <td>{{$notAttendUser->name}}</td>
        <td>{{$notAttendUser->username}}</td>
        <td>{{$notAttendUser->email}}</td>
        <td>
         @if (!$notAttendUser->image)
            <img src="{{url('/images/'.'default.png')}}" class="img-circle" alt="No photo" style= "width:60px;height:60px;">
            @else
            <img src="{{url('/images/'.$notAttendUser->image)}}" class="img-circle" alt="user Image" style= "width:60px;height:60px;">
          @endif
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
  </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>
<!-- /////////////////////////////////////////////////////////////// -->
       <!-- Event Likes Users Modal Box -->
       <div class="container">
  <!-- The Modal -->
<div class="modal" id="eventLikeUsers" >
  <div class="modal-dialog" >
    <div class="modal-content" style = "width:700px">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Event Likes</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="height: 363px;overflow-y: scroll;">
          <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Image</th>
      </tr>
    </thead>
    <?php $i=1 ?>
    @foreach($userLikeslist as $eventlikes)
    <tbody>
      <tr>
        <td>{{$i++}}</td>
        <td>{{$eventlikes->name}}</td>
        <td>{{$eventlikes->username}}</td>
        <td>{{$eventlikes->email}}</td>
        <td>
         @if (!$eventlikes->image)
            <img src="{{url('/images/'.'default.png')}}" class="img-circle" alt="No photo" style= "width:60px;height:60px;">
            @else
            <img src="{{url('/images/'.$eventlikes->image)}}" class="img-circle" alt="user Image" style= "width:60px;height:60px;">
          @endif
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
  </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>
  </div>
@endsection
