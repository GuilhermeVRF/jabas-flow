<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recurrence extends Model
{
    protected $fillable = [
        'date',
        'times',
        'frequency',
        'counter'
    ];

    public function budget()
    {
        return $this->hasOne(Budget::class);
    }
}
