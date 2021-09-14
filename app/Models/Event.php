<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'creator_name',
        'ename',
        'eaddress',
        'eprice',
        'description',
        'date',
        'eimage',
    ];

    
}
