<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doer_contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id', 
        'job_title', 
        'name',
        'email',
        'phone', 
        'date', 
        'message'
    ];
}
