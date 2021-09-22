<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserComment extends Model
{
    use HasFactory;

    protected $table = 'user_comment';
    protected $fillable = [
        'event_id',
        'guest_id',
        'comment',
       
    ];
}
