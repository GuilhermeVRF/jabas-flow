<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'billing_date',
        'type',
        'status',
        'description',
        'user_id',
        'category_id',
        'recurrence_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function recurrence()
    {
        return $this->belongsTo(Recurrence::class);
    }

    public function scopeFilterByDateAndType($query, $userId, $type, $start, $end)
    {
        return $query->where('user_id', $userId)
            ->where('type', $type)
            ->whereBetween('billing_date', [$start, $end]);
    }

}
