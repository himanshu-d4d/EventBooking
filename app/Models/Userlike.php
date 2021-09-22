<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userlike extends Model
{
    use HasFactory;

    protected $table = 'user_likes';
    protected $fillable = [
        'event_id',
        'guest_id',
        'like_flag',
       
    ];

}
