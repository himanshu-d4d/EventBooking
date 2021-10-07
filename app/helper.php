<?php
use App\Models\User;
use App\Models\EventsBooking;
use App\Models\UserComment;
use App\Models\Userlike;


function AuthData(){
    return Auth::user();
}
function listAllUsers(){
    return User::all();
}
function listAllEventUser($id){
    //echo $id; die;
    $AllUser = DB::table('events_booking')
    ->select('users.*')
    ->join('users','events_booking.guest_id','=', 'users.id')
    ->where('event_id',$id)
    ->where('status',1)
    ->paginate(5);
    return $AllUser;
}
function listNotAttendEventUser($id){
    //echo $id; die;
    $AllUser = DB::table('events_booking')
    ->select('users.*')
    ->join('users','events_booking.guest_id','=', 'users.id')
    ->where('event_id',$id)
    ->where('status','!=',1)
    ->paginate(5);
    return $AllUser;
}
function CountEventComments($id){
    //echo $id; die;
   $comments = UserComment::groupBy('event_id')
   ->where('event_id',$id)
   ->count();
   return $comments;
}
function CountEventlikes($id){
    //echo $id; die;
   $Likes = Userlike::groupBy('event_id')
   ->where('event_id',$id)
   ->where('like_flag',1)
   ->count();
   return $Likes;
}
function listUsercomments($id){
    //echo $id; die;
   $Usercomments = DB::table('user_comment')
   ->select('user_comment.comment','users.name','users.username','users.image')
   ->join('users', 'user_comment.guest_id','=','users.id')
   ->where('event_id',$id)
   ->get();
   return $Usercomments;
}
function listTotalUsers($id){
    //echo $id; die;
    $AllUser = DB::table('events_booking')
    ->select('users.*')
    ->join('users','events_booking.guest_id','=', 'users.id')
    ->where('event_id',$id)
    ->get();
    return $AllUser;
}
function listlikesEventUser($id){
    //echo $id; die;
   $Usercomments = DB::table('user_likes')
   ->join('users', 'user_likes.guest_id','=','users.id')
   ->where('event_id',$id)
   ->where('like_flag',1)
   ->get();
   return $Usercomments;
}
