<?php

namespace App\Console\Commands;
use App\Notifications\Eventnotification;
use Illuminate\Support\Facades\Notification;
use DB;
use App\Models\User;
use Illuminate\Console\Command;

class ReminderNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guest:ReminderNotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Notification to Guest';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try{
            date_default_timezone_set("Asia/Kolkata");
            $currentTime = date("H:i");
            $currentDate = date("Y-m-d");
            // dd($currentTime);
            $results = DB::table('events_booking')->join('users', 'users.id', '=', 'events_booking.guest_id')
            ->join('events', 'events.id', '=', 'events_booking.event_id')
            ->whereDate('events_booking.reminder_date', $currentDate)->whereTime('events_booking.reminder_date', $currentTime)->select('users.*', 'events.ename')->get();
          $data = $results->toArray();
          //dd( $data );
          if(count($data)){
            foreach($data as $result){     
                //dd($result); 
                $userData = User::where('id',$result->id)->first();
            $user_data = ['user_name'=>$userData['name'], 'user_image'=>$userData['image']];
            //dd($user_data);
        
            Notification::send( $userData, new Eventnotification($userData['name'].' '.'Your event has started',$user_data, "USER_SET_EVENT_REMINDER"));
               }
          }
            
          }catch(Exception $e){
            info('error a occurred'.$e->getMessage());
           } 
    }
}
