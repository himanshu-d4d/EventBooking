<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsBooking extends Model
{
    use HasFactory;
    protected $table = 'events_booking';
    protected $fillable = [
        'guest_id',
        'event_id',
        'status',
    ];
    public function userdata(){
        return $this->hasOne('App\Models\User', 'guest_id', 'id');
    }
}
