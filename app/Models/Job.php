<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'address',
        'country',
        'city',
        'job_title ',
        'description',
        'price',
        'image_url',
        'user_id',
        'category_id',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
