<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'name',
        'email',
        'rating',
        'comment',
        'job_id',
        'created_at',
        'updated_at'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
