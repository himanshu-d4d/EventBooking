<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventsBooking;
use File;

class EventController extends Controller
{
  public function EventList(Request $request, Event $event ){
      try{
        $records = $event;
        if($request->query('search')){
          $records = $records->where(function($q) use ($request) {
               $q->orWhere('creator_name', 'like', '%'.$request->query('search').'%');
               $q->orWhere('ename', 'like', '%'.$request->query('search').'%');
               $q->orWhere('date', 'like', '%'.$request->query('search').'%');
     });
   }
          $Events = $records->paginate(10);
          //dd($Events);
          return view('admin.events.Event_list')->with(compact('Events'));
      } catch(Exception $e){
        echo 'Message: ' .$e->getMessage();   
     }
  }
  public function EventCreate(){
    return view('admin.Events.event_create');
} 
 public function EventStore(Request $request){
    $validated = $request->validate([
        'ename' => 'required',
        'eaddress' => 'required',
        'eprice' => 'required',
        'date' => 'required',
        'description' => 'required',
        //'image' => 'required', 
 ]);
      try{
           $data = $request->all();
           $file = $request->file('image');
           if($file){
            $imageName = time().'.'.$request->image->extension(); 
            //dd($imageName);
            $file->move('images', $imageName);
              $data['eimage'] = $imageName;
           }
           $user = Event::Create($data);
           return redirect('admin/Events-List');
      } catch(Exception $e){
        echo 'Message: ' .$e->getMessage();   
     }
    //return view('admin.Events.event_create');
   } 
   public function EditEvent($id){
      try{
          $Events = Event::find($id);
          //dd($Events);
          return view('admin.Events.event_edit')->with(compact('Events'));
      }catch(Exception $e){
        echo 'Message: ' .$e->getMessage();   
     } 
    
}  
   public function UpdateEvent(Request $request){
       try{
           $data = $request->all();
           $OldImage = $data['old_image'];
           //dd($OldImage);
           $file = $request->file('image');
           if($file){
            $imageName = time().'.'.$request->image->extension();
            $file->move('images', $imageName);
            File::delete(public_path("images/$OldImage"));
            $EventImage = $imageName;
           }else{
            $EventImage = $OldImage;
           }
           //dd($EventImage);
            Event::where('id',$data['id'])
               ->update(['ename'=>$data['ename'],
               'eaddress'=>$data['eaddress'],
               'eprice'=>$data['eprice'],
               'date'=>$data['date'],
               'description'=>$data['description'],
               'eimage'=>$EventImage]);
               return redirect('admin/Events-List');
       }catch(Exception $e){
        echo 'Message: ' .$e->getMessage();   
     } 
   }
   public function SingalEventDetails($id){
       $event = Event::find($id);
       //dd($events);
       $TotalGuset = EventsBooking::groupBy('event_id')
            ->where('event_id',$event['id'])
            ->count();
            $Gueststatus = EventsBooking::groupBy('status')
            ->where('event_id',$event['id'])
            ->selectRaw('count(*) as total ,status,guest_id')
            ->get();
            $userAttemptStatus = ['attend'=>0, 'not_attend'=>0, 'totalGuest'=>0];
        if($Gueststatus){
           $data = $Gueststatus->toArray();
           foreach($data as $value){
            if($value['status']==1){
                $userAttemptStatus[ "attend"] = $value["total"];
            }
            if($value['status']==2){
                $userAttemptStatus[ "not_attend"] = $value["total"];
            }
           }
        }
        //dd($userAttemptStatus);
      return view('admin.Events.singal_event_details')->with(compact('event','userAttemptStatus','TotalGuset')); 
   }
   public function EventDelete($id){
      try{
          $event = Event::find($id);
          $imagePath = $event['eimage'];
          if($imagePath){
            File::delete(public_path("/images/$imagePath"));
          }
          $event->delete();
          return redirect('admin/Events-List');
      }catch(Exception $e){
        echo 'Message: ' .$e->getMessage();   
     } 
   }
   public function GetExpiredEvent(){
     $expiredEvent = Event::where('date','<',$today = date("Y-m-d"))->paginate(10);
     return view('admin.Events.expired_event')->with(compact("expiredEvent"));
   }
   public function listUsercomments($id){
    //echo $id; die;
    dd($id);
   $Usercomments = DB::table('user_comment')
   ->select('user_comment.comment','users.name','users.username')
   ->join('users', 'user_comment.guest_id','=','users.id')
   ->where('event_id',$id)
   ->paginate(5);
   dd($Usercomments);
   return redirect('admin.Events.singal_event_details')->with(compact('Usercomments'));
}
}  
    

