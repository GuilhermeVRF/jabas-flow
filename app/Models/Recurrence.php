<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recurrence extends Model
{
    protected $fillable = [
        'day',
        'times',
        'frequency',
    ];
}
