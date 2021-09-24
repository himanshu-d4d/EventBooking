<?php

namespace App\Http\Controllers\Event;
use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use App\Models\EventsBooking;
use App\Models\UserNotification;
use App\Models\User;
use App\Models\Userlike;
use App\Models\UserComment;
use App\Notifications\Eventnotification;
use Validator;
use Exception;
use File;
use DB;


class EventController extends Controller
/////////////////EVENT CREATE CODE //////////////////////////////
{
    public function EventCreate(Request $request){
        $validator = Validator::make($request->all(),[
            'ename' => 'required',
            'eaddress' => 'required',
            'eprice' => 'required',
            'description' => 'required', 
            'date' => 'required',
     ]);
     if ($validator->fails()) {
       return response()->json($validator->errors(),HTTP_SERVER_ERROR,);
     }
    try{
           $user = Auth::user();
           //$userid = $user['id'];
            //$userId = User::find('id');
            //dd($user['image']);
            $event = $request->all();
            //dd($event);
                //$event = $event['user_id'];
               // dd($event);
               $event['user_id'] = $user['id'];
               $event['creator_name'] = $user['name'];
               
                $file = $request->file('eimage');
                if($file){
                $imageName = time().'.'.$request->eimage->extension();  
                //dd( $imageName);
                // image upload in public/upload folder.
                    $file->move('images', $imageName); 
                    $event['eimage'] = $imageName;
                }
                   $result = Event::Create($event);
                   $user_data = ['user_name'=>$user['name'], 'user_image'=>$user['image']];
                   //dd($user_data);
                   Notification::send($user, new Eventnotification($user['name'].' '.'created the event '.' '.$event['ename'],$user_data, "Event_create"));
                    if($result){
                        return response()->json(['status' => 'success', 'message' => 'Event Created Successfully','data'=>$result],  HTTP_OK,);
                    }else{
                        return response()->json(['status' => 'error', 'message' => 'Event Not Created'],  HTTP_SERVER_ERROR,);
                    }
            
           
              }catch(Exception $e)
                {
                    return response()->json(['status' => 'error', 'message' => $e->getMessage()],  HTTP_BED_REQUESTED,);
                }
                 
      }
     ////////////////////// EVENT SINGAL GUEST ADD ////////////////////////////

    public function EventBooking(Request $request ){
        try{
            $user = Auth::user();
            $guest = $request->all();
            
            if (Event::where('id', $guest['event_id'])->first() && User::where('id', $guest['guest_id'])->first()) {
                $eventName = Event::where('id', $guest['event_id'])->first();
                $UserID = User::where('id', $guest['guest_id'])->first();
                //dd($eventName);
                //echo $eventName['is_attend']; die;
                // $Status = [];
                // // if($eventName['is_attend']==2){
                // //     $UserAttendStatus = 'no_response';
                // // }
                // if($eventName['is_attend']==1){
                //     $Status = 'attend';
                // }
                // else {
                //     $Status = 'not_attend';
                // }
                //dd($UserAttendStatus);
                $guest = new EventsBooking;
               $guest->event_id = $request->event_id;
               $guest->guest_id = $request->guest_id;
               //dd($guest);
                $guest->save();
                $user_data = ['user_name'=>$user['name'], 'user_image'=>$user['image']];
                Notification::send($UserID, new Eventnotification($user['name'].' '.'invited you to his event   '.' '.$eventName['ename'],$user_data, "USER_EVENT_GUEST_ADD"));
                return response()->json(['status' => 'success', 'message' => 'Event Booked'],  HTTP_OK,);
            }else{
                return response()->json(['status' => 'error', 'message' => 'Event Or Guest Does Not Exits'],  HTTP_NOT_FOUND,);
            }
          }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);
        }
        
        //dd( $guest);
        
    } 
    /////////// GUEST STATUS UPDATE //////////////////////

    public function UpdateGuestStatus(Request $request){
        try{
               $user = Auth::user();
            //    echo "<pre>";
            //    print_r($user);

                $guestStatus = $request->all();
                $GuestStatus = [];
            
                //dd($guestStatus);
                $result = EventsBooking::where('id', $guestStatus['id'])->first();
                $event =Event::where('id', $result['event_id'])->select('user_id','ename')->first();
                // dd($event);
                $eventUser =User::where('id', $event['user_id'])->first();
                // dd($eventUser);
            if(!$result){
                return response()->json(['status' => 'error', 'message' => 'Event Not Exits'],  HTTP_NOT_FOUND,);
            }else{
                EventsBooking::where('id', $guestStatus['id'])
                 ->update(['status' => $guestStatus['status']]);
                 $user_data = ['user_name'=>$user['name'], 'user_image'=>$user['image']];
                 $response = Notification::send($eventUser, new Eventnotification($user['name'].' '.'response the event'.' '.$event['ename'],$user_data, "Guest_response")); 
                 //dd($response);
                 return response()->json(['status' => 'success', 'message' => 'Status Updated'],  HTTP_OK,);
                }
            }catch(Exception $e ){
                return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);
        }
      
    }
    ////////////////// EVENT UPDATE CODE //////////////////////////////////

    public function EventUpdate(Request $request, $id){
        
        try{
              $user = Auth::user();
                $Event = Event::find($id);
                //dd($Event)
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
               'is_attend' => $result['is_attend'],
               'eimage' => $imageName]);

               //dd($UpdateEvent);
                $imagename = ['eimage'=>$imageName];
               $data = array_merge($result,$imagename);
              // dd($data);
              $user_data = ['user_name'=>$user['name'], 'user_image'=>$user['image']];
              Notification::send($user, new Eventnotification($user['name'].' '.'updated the event '.' '.$result['ename'],$user_data, "Event_update"));
               if($UpdateEvent){
                  return response()->json(['status' => 'success', 'message' =>'Event Update Successfully'],  HTTP_OK,);
               }else{
                  return response()->json(['status' => 'error', 'message' =>'Event Not Updated'],  HTTP_SERVER_ERROR,);
               } 
            }catch(Exception $e){
                  return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);
              }
        } 
/////////////////////// DELETE GUEST CODE ///////////////////////

        public function DeleteGuest($id){
            $Eventguest = EventsBooking::find($id);
            //dd($Event);
            $Eventguest->delete();
            return response()->json(['status' => 'success', 'message' =>'Guest Delete Successfully'],  HTTP_OK,);
        }
        
        public function AddGuest(Request $request){
          try{
            $guest = $request->all();
           // dd( $guest);
            $eventId = $guest['event_id'];
            // dd($guest);
            
            if(!(Event::where('id',$guest['event_id'])->exists()) || !(User::where('id',$guest['guest_id'])->exists())) {
                return response()->json(['status' => 'error', 'message' =>'Guest Or Event Not Exits'],  HTTP_NOT_FOUND,);
                
            }elseif(EventsBooking::where('guest_id',$guest['guest_id'])->where('event_id',$guest['event_id'])->exists()){
                return response()->json(['status' => 'error', 'message' =>'Guest Already Exits'],  HTTP_SERVER_ERROR,);
            }else{
                $Alldata = array_unique($guest['guest_id']);
                //dd($Alldata);
                foreach($Alldata as $allGuest){
                    $data = [
                              'event_id'=> $eventId,
                              'guest_id'=>$allGuest,
                              ];
                              //dd($data);
                          
                           //dd( $Alldata) ;
                       $result = EventsBooking::Create($data);
                      }
                      return response()->json(['status' => 'success', 'message' =>'Guest Add Successfully'],  HTTP_OK,);
            }
            
             
            
           //$Event = Event::find($id);
        }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);
        }   
    }
///////////////////////// GUEST STATUS COUNT HELPER FUNCTION //////////////////////////////

    function getGuestCount($eventId=null){
        $guestStatus = EventsBooking::groupBy('status')
        ->where('event_id',$eventId)
        ->selectRaw('count(*) as total, status')
        ->get();
       // dd($guestStatus->toArray());
       $userAttemptStatus = [ "attend"=> 0 , "non_attend"=> 0 , "not_respond_users"=> 0];
        if($guestStatus){
            $data = $guestStatus->toArray();
            foreach($data as $value){
                if($value['status']==0){
                    $userAttemptStatus[ "non_attend"] = $value["total"];
                }
                if($value['status']==1){
                    $userAttemptStatus[ "attend"] = $value["total"];
                }
                if($value['status']==2){
                    $userAttemptStatus[ "not_respond_users"] = $value["total"];
                }
            }
        }
        return $userAttemptStatus;
    }
////////////////////// EVENT GUEST LIST CODE //////////////////////

    public function EventGuestList(Request $request){
       try{
            $data = $request->all();
            //  dd($data);
            $guestList = DB::table('events_booking')
        //     ->join('events','events.id' ,'=' ,'eventsbooking.event_id')
            ->join('users', 'users.id', '=', 'events_booking.guest_id')
            ->where('events_booking.event_id',$data['event_id'])
            ->select('users.*','events_booking.guest_id')
            ->get();
            $eventDetail = Event::where('id', $data['event_id'])->first();
            $count = DB::table('User_likes')
            ->groupBy('event_id')
            ->where('like_flag',1)
            ->where('event_id',$data['event_id'])
            //->selectRaw('count(like_flag) as total_likes')
            ->count();
            $EventDetails = $eventDetail->toArray();
            $EventLikeDetails =['total_likes'=>$count];
            $AllGuest =[ 'guestList'=>$guestList];
            $result[] = array_merge($EventDetails,$EventLikeDetails,$AllGuest);
            if($result){
                return response()->json(['status' => 'success', 'message' =>'Guest fetch Successfully', 'data'=>$result],  HTTP_OK,);
            }else{
                return response()->json(['status' => 'error', 'message' =>'Event Does Not Match'],  HTTP_NOT_FOUND,);
            }
           
            //dd($eventDetail);
       } catch(Exception $e){
        return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);
     }         
       
                 
}
///////////////// LOGIN USER EVENTS CODE /////////////////////////////

      public function myEventList(Request $request){
      try{
          $user = Auth::user();
        //   dd($user);
        $input = $request->all();
        $today = date("Y-m-d");
        //dd($today);
        $input['user_id'] = $user['id'];
        $EventList = Event::where('user_id', $user['id'])->get();
        // $Eventdate = Event::where('user_id', $user['id'])->select('date')->get();
        // //dd($Eventdate);
       
    //    }
    //    dd($EventExpired);
        /// Guest List ///////
          ////// Guest Status///////
        $data = [];
        foreach($EventList as $value){
            // dd($value);
            $count = DB::table('User_likes')
            ->groupBy('event_id')
            ->where('like_flag',1)
            ->where('event_id',$value['id'])
            //->selectRaw('count(like_flag) as total_likes')
            ->count();
            if(date("Y-m-d", strtotime($value['date']))< $today){
                $EventExpired = true;
            }else{
                $EventExpired = false;
            }
            //dd($EventExpired);
            $EventExpireDetails = ["event_expired" => $EventExpired];
           // dd($EventExpireDetails);
           $EventLikeDetails =['total_likes'=>$count];
            $EventAttendDetails = ["event_attend_details"=>$this->getGuestCount($value['id'])];
            $data[] = array_merge($value->toArray(), $EventExpireDetails,$EventLikeDetails, $EventAttendDetails);
        //    $data[$value['id']]["event_attend_details"] = $this->getGuestCount($value['id']); 
           
        }
        // dd( $data);
        if($EventList){
            return response()->json(['status' => 'success', 'message' =>'List Fetch Successfully',
            'myevent'=>$data],  HTTP_OK,);
        } else{
            return response()->json(['status' => 'error', 'message' =>'Somthing Went Wrong'],  HTTP_NOT_FOUND,);
        }              
      } catch(Exception $e){
        return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);  
      }
  }
/////////////////////// OTHER USER EVENTS /////////////////////////////////

      public function OtherUserEvents(Request $request){
      try{
        $user = Auth::user();
        $today = date("Y-m-d");
        $input = $request->all();
        $input['user_id'] = $user['id'];
        $EventList = Event::where('user_id','!=', $input['user_id'])->get();
        //dd($EventList);
        
        $data = [];
        foreach($EventList as $value){
            $count = DB::table('User_likes')
            ->groupBy('event_id')
            ->where('like_flag',1)
            ->where('event_id',$value['id'])
            //->selectRaw('count(like_flag) as total_likes')
            ->count();
            //dd( $count);
            if(date("Y-m-d", strtotime($value['date']))< $today){
                $EventExpired = true;
            }else{
                $EventExpired = false;
            }
            $EventLikeDetails =['total_likes'=>$count];
            $EventExpireDetails = ["event_expired" => $EventExpired];
            $EventAttendDetails = ["event_attend_details"=>$this->getGuestCount($value['id'])];
            $data[] = array_merge($value->toArray(),$EventExpireDetails,$EventLikeDetails, $EventAttendDetails);
        }
        if($EventList){                
        return response()->json(['status' => 'success', 'message' =>'List Fetch Successfully','otheruser-events'=>$data],  HTTP_OK,);
        }else{
            return response()->json(['status' => 'error', 'message' =>'Somthing Went Wrong'],  HTTP_NOT_FOUND,);
        }
      } catch(Exception $e){
        return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);  
      }   
       
      }
      ///////////////////// SINGAL EVENT AND GUEST GET ///////////////////////////////////

      public function SingleEvent(Request $request){
           try{

            $input = $request->all();
            $EventDetails = Event::where('id', $input['event_id'])->first();
         //dd($EventDetails);
         if($EventDetails){
            $count = DB::table('User_likes')
            ->groupBy('event_id')
            ->where('like_flag',1)
            ->where('event_id',$EventDetails['id'])
            //->selectRaw('count(like_flag) as total_likes')
            ->count();
            //dd($count);
            $guestList = DB::table('events_booking')
                ->join('users', 'users.id', '=', 'events_booking.guest_id')
                ->where('events_booking.event_id',$EventDetails['id'])
                ->where('status',1)
                ->select('users.id','users.name','users.image','events_booking.status')
                ->get();
               // dd( $guestList);
            $guestStatus = EventsBooking::groupBy('status')
            ->where('event_id',$EventDetails['id'])
            ->selectRaw('count(*) as total, status')
            ->get();
           // dd($guestStatus->toArray());
           $userAttemptStatus = [ "attend"=> 0 , "non_attend"=> 0 , "not_respond_users"=> 0];
            if($guestStatus){
                $data = $guestStatus->toArray();
                foreach($data as $value){
                    if($value['status']==0){
                        $userAttemptStatus[ "non_attend"] = $value["total"];
                    }
                    if($value['status']==1){
                        $userAttemptStatus[ "attend"] = $value["total"];
                    }
                    if($value['status']==2){
                        $userAttemptStatus[ "not_respond_users"] = $value["total"];
                    }
                }
            }
           // dd($userAttemptStatus);
           $EventLikeDetails =['total_likes'=>$count];
            $event = $EventDetails->toArray();
            $allguest = ["guestlist"=>$guestList->toArray()];
            $gueststatus = ['event_attend_details'=>$userAttemptStatus];
               $result = array_merge($event,$EventLikeDetails,$gueststatus,$allguest);
               //dd($result);
               
                return response()->json(['status' => 'success', 'message' =>'Event Fetch Successfully','event'=>$result], HTTP_OK,);
         
            }else{
                return response()->json(['status' => 'error', 'message' =>'Event Does Not Exits'],  HTTP_NOT_FOUND,);
            }
           }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);  
          }  
      }
      //////////////////////// USER NOTIFICATION CODE ///////////////////////////
      
      public function notificationList(){
      try{
        $user = Auth::user();
       //dd($user);
        $data = [];
         foreach ($user->notifications as $notification) {
                $result = $notification->all()->toArray();
                $data = $result;
               
          }
          //dd($data);
          if(count($data)){
            return response()->json(['status' => 'success', 'message' =>'Notifications Get successfully','notifications'=>$data], HTTP_OK,);
           }else{
            return response()->json(['status' => 'success', 'message' =>'you dont have any notifications','notifications'=>[]], HTTP_OK,);
           }
       }catch(Exception $e){
         return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);  
        }  
       
      }
      public function DeleteNotification($id){
        try{
            $NotificationID = UserNotification::find($id);
           // dd($NotificationID);
            $NotificationID->delete();
            return response()->json(['status' => 'success', 'message' =>'Notifications Move to tresh '], HTTP_OK,);
        }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);  
           }      
      }

      public function FilterNotification(Request $request){
        try{
            $user = Auth::user();
            $allNotificationsEnums = ["Event_create","Event_update", "Guest_response", "USER_EVENT_GUEST_ADD"];
            $value = $request->notification;
            $Notifications = [];
            if(in_array($value,$allNotificationsEnums))
           {
                
               // 
                //$results = $user->Notifications->first()->where('data', 'LIKE', "%{$value}%")->get();
                // dd($results);
                
                $results = DB::table('notifications')->where('data', 'LIKE', "%{$value}%")->get();
                foreach($results as $value){
                   $Notifications[] = $value;
                }
                if(count($Notifications)){
                    return response()->json(['status' => 'success', 'message' =>'notification find successfully','notification'=> $Notifications], HTTP_OK,);
                }
                    
                return response()->json(['status' => 'error', 'message' =>'notification not found','notification'=> $Notifications], HTTP_NOT_FOUND,);
            }
            else
            {
                // die("Hii");
                return response()->json(['status' => 'error', 'message' =>'Invalid Filter','notification'=> $Notifications], HTTP_NOT_FOUND,);
            }
              
        }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);  
           }      
        
      }

      public function FilterNotificationMultiple(Request $request){
        try{
            $user = Auth::user();
            $allNotificationsEnums = ["Event_create","Event_update", "Guest_response", "USER_EVENT_GUEST_ADD"];
            $Notifications = [];
            // echo "<pre>";
            // print_r($request->notification); die;
            // $intersectResutl = array_intersect($request->notification, $allNotificationsEnums);
            // dd($intersectResutl);
            $containsSearch = count(array_intersect($request->notification, $allNotificationsEnums)) === count($request->notification);
            // dd($containsSearch);
            if($containsSearch)
           {

                $allFilterData = $request->notification; 
                // dd($request->all());  
                foreach($allFilterData as $value){
                    //echo $value;
                    $results = DB::table('notifications')->where('data', 'LIKE', "%{$value}%")->get();
                    foreach($results as $value){
                        $Notifications[] = $value;
                     }
                } 
               
                
                if(count($Notifications)){
                    return response()->json(['status' => 'success', 'message' =>'notification find successfully','notification'=> $Notifications], HTTP_OK,);
                }
                    
                return response()->json(['status' => 'error', 'message' =>'notification not found','notification'=> $Notifications], HTTP_NOT_FOUND,);
            }
            else
            {
                // die("Hii");
                return response()->json(['status' => 'error', 'message' =>'Invalid Filter','notification'=> $Notifications], HTTP_NOT_FOUND,);
            }
              
        }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);  
           }      
        
      }
        public function getExpiredEvents(){
               try{
                $today = date("Y-m-d");
                   $AllEvents = Event::where('date','<',$today )->get();
                  // dd($AllEvents);
                   $data = [];
                   foreach($AllEvents as $value){
                    $count = DB::table('User_likes')
                    ->groupBy('event_id')
                    ->where('like_flag',1)
                    ->where('event_id',$value['id'])
                    ->count();
                    //dd($count);
                    $totalLikes = ['total_likes'=> $count];
                    //$totalEvents = $EventsDetails->toArray();
                    $data[] = array_merge($value->toArray(),$totalLikes);
                   }
            return response()->json(['status' => 'success', 'message' =>'list get successfully','expired-events'=> $data ], HTTP_OK,);
               }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);  
           } 
        }
        public function GetLimitEvents(){
            try{
                $user = Auth::user();
                $result = DB::table('events_booking')
                ->select('status','events.*',DB::raw('COUNT(events_booking.event_id) as total_attending_guest'))
                ->join('events', 'events.id', '=', 'events_booking.event_id')
                ->where('status',1 )
                //->orWhere('events_booking.event_id','>=',10 )
                ->groupBy('events_booking.event_id')
                ->havingRaw('total_attending_guest >= 10 ')
                ->get();
                //dd($result);
                // $result = DB::select('SELECT COUNT(events_booking.event_id) as total_attending_guest,events_booking.event_id, events_booking.status, events.* FROM events_booking JOIN events ON events.id =events_booking.event_id
                //  WHERE events_booking.status = :status GROUP BY events_booking.event_id HAVING COUNT(events_booking.event_id) >= :event_count', ['status' => 1,'event_count'=>10]);
                return response()->json(['status' => 'success', 'message' =>'list get successfully','data'=> $result], HTTP_OK);
                // dd($result);
            }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);  
           } 
        }
        public function SetReminder(Request $request){
            $user = Auth::user();
            $validator = Validator::make($request->all(),[
                'reminder_date' => 'required',
               
         ]);
         if ($validator->fails()) {
           return response()->json($validator->errors(),HTTP_SERVER_ERROR,);
         }
          try{
            date_default_timezone_set("Asia/Kolkata");
            $currentTime = date("Y-m-d H:i");
             $date = $request->reminder_date;
             //dd($date);
             $dateTime = strtotime($date);
             //dd($dateTime);
              $reminder_date =  date("Y-m-d H:i", $dateTime);
             $data = $request->id;
             $evntId  = EventsBooking::where('id',$data)->first();
             //dd($evntId);
             $EventDetails  = Event::where('id',$evntId["event_id"])->first();
             $event_User_id  = User::where('id',$EventDetails["user_id"])->first();
             //dd($event_User_id);
             if($reminder_date >= $currentTime){
                $result = EventsBooking::where('id',$data)
                ->update(['reminder_date' => $reminder_date]);
                $user_data = ['guest_name'=>$user["name"], 'guest_image'=>$user["image"] ,'time'=>$reminder_date];
                //dd($GuestDetails);
                Notification::send($event_User_id, new Eventnotification($user['name'].' '.'set a reminder your event'.' '.$EventDetails['ename'],$user_data, "USER_SET_EVENT_REMINDER"));
                return response()->json(['status' => 'success', 'message' =>'reminder add successfully'], HTTP_OK);
             }else{
                return response()->json(['status' => 'error', 'message' =>'please enter the correct date'], HTTP_SERVER_ERROR);

             }
            
          }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);  
           } 
       }
      public function EventLike(Request $request){
          try{
            $user = Auth::user();
            $EventId = $request->event_id;
            $LikeActivity = $request->like;
            $userId = $user['id'];
            //dd($data);
            if(!(Userlike::where('guest_id',$userId)->where('event_id',$EventId)->exists())){
                 $data['event_id'] = $EventId;
                 $data['guest_id'] = $userId;
                 $data['like_flag'] = $LikeActivity;
                 //dd($data);
                 $EventUser = Event::where('id',$EventId)->first();
                 //dd($EventUser);
                 $UserDetails = User::where('id',$EventUser['user_id'])->get();
                 $result = UserLike::Create($data);
                 $user_data = ['guest_name'=>$user["name"], 'guest_image'=>$user["image"]];
                Notification::send($UserDetails, new Eventnotification($user['name'].' '.'liked on your event'.' '.$EventUser['ename'],$user_data, "USER_EVENT_LIKE"));
                 return response()->json(['status' => 'success', 'message' =>'like succesfully','data'=> $result], HTTP_OK);
            }else{
                $likeId = Userlike::where('guest_id',$userId)->orWhere('event_id',$EventId)->select('id')->first();
                //dd($likeId);
                  $updateResult = Userlike::where('id',$likeId['id'])
                 ->update(['like_flag' => $LikeActivity]);
                 return response()->json(['status' => 'success', 'message' =>'like Update successfully'], HTTP_OK);
            }
            //dd($eventId);
          }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);  
           } 
      } 
      public function EventComment(Request $request){
          try{
            $user = Auth::user();
            $EventId = $request->event_id;
            $userId = $user['id'];
            $comment = $request->comment;
            $data['event_id'] = $EventId;
            $data['guest_id'] = $userId;
            $data['comment'] = $comment;
            $EventUser = Event::where('id',$EventId)->first();
               //dd($EventUser);
            $UserDetails = User::where('id',$EventUser['user_id'])->get();
               //dd($UserDetails);
            $result = UserComment::Create($data);
            $user_data = ['guest_name'=>$user["name"], 'guest_image'=>$user["image"]];
            Notification::send($UserDetails, new Eventnotification($user['name'].' '.'commented on your event'.' '.$EventUser['ename'],$user_data, "USER_EVENT_COMMENT"));
            return response()->json(['status' => 'success', 'message' =>'comment add successfully', 'data'=>$result], HTTP_OK);
            //dd( $result);
          }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);  
           } 
      } 
    //   public function EventLikeCount(){
    //      try{
    //         $count = DB::table('User_likes')
    //         ->select('events.*')
    //         ->join("events", "user_likes.event_id", '=', "events.id")
    //         ->groupBy('event_id')
    //         ->where('like_flag',1)
    //         ->selectRaw('count(like_flag) as total_likes, like_flag')
    //         ->get();
    //        //dd($count);
    //        return response()->json(['status' => 'success', 'message' =>'list get successfully', 'data'=>$count], HTTP_OK);

    //        //dd($result);
    //      }catch(Exception $e){
    //         return response()->json(['status' => 'error', 'message' =>$e->getMessage()],  HTTP_BED_REQUESTED,);  
    //        }  
            
         
    //   } 
}
