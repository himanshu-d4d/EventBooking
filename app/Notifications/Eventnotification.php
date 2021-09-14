<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class Eventnotification extends Notification
{
   
    use Queueable;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $notification_type;
    public function __construct($ename,$user_data,$notification_type,$UserAttendStatus)
    {
        // echo $notification_type; die;
        $this->name = $ename;
        $this->notification_type = $notification_type;
        $this->data = $user_data;
        $this->UserAttendStatus = $UserAttendStatus;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message'=> $this->name,
            'user_data'=> $this->data,
            'notification_type' => $this->notification_type,
            'user_attend_status'=>$this->UserAttendStatus
        ];
        
    }
   
    // public function toDatabase($notifiable)
    // {
    //     return [
    //          'notification_type' => $this->notification_type
    //     ];
    // }
    
}
