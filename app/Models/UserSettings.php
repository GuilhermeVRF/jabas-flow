<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model
{
    use HasFactory;

    protected $table = 'user_settings';

    protected $fillable = [
        'user_id',
        'email_notifications',
    ];

    /**
     * Relação com o usuário.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
