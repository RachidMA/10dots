<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';

    protected $fillable = [
        'customer_name',
        'customer_number',
        'customer_email',
        'job_id',
        'pending',
        'created_at',
        'updated_at'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
