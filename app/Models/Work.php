<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    protected $table = "works";

    protected $fillable = [
        "worksCount",
        "user_id",
        "created_at",
        "updated_at"
    ];

    //WORKS BELONGS TO ONE USER , WHICH HOLDS THE COUNT TO HOW MANY WORKS THE DOER HAS FINISHED THAT WERE BOOKED
    //FROM CUSTOMER, THIS COUNT WILL BE ADDED 1 WHEN CUSTOMER CONFIRMS THE EMAIL
    public function Doer()
    {
        return $this->belongsTo(User::class);
    }
}
