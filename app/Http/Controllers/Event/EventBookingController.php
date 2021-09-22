<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventsBooking;
use App\Models\User;
use Exception;

class EventBookingController extends Controller
{
    public function EventList(){
        $eventList = Event::all();
        return response()->json(['status' => 'success', 'message' => $eventList],  HTTP_OK,);
       
    }
     public function EventUpdate(Request $request, $id){
        
        try{
          $Event = Event::find($id);

           $result = $request->all();
           $oldimage = $Event['eimage']; 
           //dd($oldimage);
           $image = $request->file('eimage');
           $imageName = time().'.'.$request->eimage->extension(); 
            $image->move('images', $imageName);
            File::delete(public_path("images/$oldimage")); 

          $UpdateEvent = Event::where('id', $result['id'])
               ->update(['ename' => $result['ename'],
               'eaddress' => $result['eaddress'],
               'eprice' => $result['eprice'],
               'description' => $result['description'],
               'date' => $result['date'],
               'eimage' => $imageName]);
               if($UpdateEvent){
                  return response()->json(['status' => 'success', 'message' =>'Event Update Successfully'],  HTTP_OK,);
               }else{
                  return response()->json(['status' => 'error', 'message' =>'Event Not Updated'],  HTTP_SERVER_ERROR,);
               } 
              }catch(Exception $e){
                  return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);
              }
     } 

     public function DeleteEvent($id){
          try{
              $Event = Event::find($id);
             $imagePath = $Event['eimage'];
              //dd($image_path);
              if($imagePath){
                  File::delete(public_path("/images/$imagePath"));
                 // unlink('image_path');
              }
              //dd( $Event);
              $Event->delete();
              if($Event){
                  return response()->json(['status' => 'success', 'message' =>'Event Delete Successfully'],  HTTP_OK,);
              }
          } catch(Exception $e) {
              return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);
      }   
          
  }
  public function ReminderNotification(){
    //       try{
    //         date_default_timezone_set("Asia/Kolkata");
    //         $currentTime = date("17:50");
    //         $currentDate = date("Y-m-d");
    //         // dd($currentTime);
    //         $results = DB::table('events_booking')->join('users', 'users.id', '=', 'events_booking.guest_id')
    //         ->join('events', 'events.id', '=', 'events_booking.event_id')
    //         ->whereDate('events_booking.reminder_date', $currentDate)->whereTime('events_booking.reminder_date', $currentTime)->select('users.*', 'events.ename')->get();
    //       $data = $results->toArray();
    //       //dd( $data );
    //       if(count($data)){
    //         foreach($data as $result){     
    //             //dd($result); 
    //             $userData = User::where('id',$result->id)->first();
    //         $user_data = ['user_name'=>$userData['name'], 'user_image'=>$userData['image']];
    //         //dd($user_data);
        
    //         Notification::send( $userData, new Eventnotification('your reminder start',$user_data, "USER_SET_EVENT_REMINDER"));
    //            }
    //       }  
            
    //       }catch(Exception $e){
    //         return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);  
    //        }  
    // }
  }
}
