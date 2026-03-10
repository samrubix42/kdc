<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
 protected $fillable = [
        'name',
        'client_info',
        'message',
        'is_active'
    ];
}
