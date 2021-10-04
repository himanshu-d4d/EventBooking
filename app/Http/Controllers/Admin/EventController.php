<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventsBooking;
use File;

class EventController extends Controller
{
  public function EventList(){
      try{
          $Events = Event::paginate(10);
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
           }
            Event::where('id',$data['id'])
               ->update(['ename'=>$data['ename'],
               'eaddress'=>$data['eaddress'],
               'eprice'=>$data['eprice'],
               'date'=>$data['date'],
               'description'=>$data['description'],
               'eimage'=>$imageName]);
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
            ->selectRaw('count(*) as total ,status')
            ->get();
            $userAttemptStatus = ['attend'=>0, 'not_attend'=>0];
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
        //dd($userAttemptStatus['attend']);
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
}  
    

