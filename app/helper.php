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
   ->count();
   return $Likes;
}