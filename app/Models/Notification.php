<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'message',
        'user_id',
        'status',
        'created_at',
        'updated_at'
    ];

    //Notifications belongs to user
    public function User()
    {
        return $this->belongs(User::class);
    }
}
