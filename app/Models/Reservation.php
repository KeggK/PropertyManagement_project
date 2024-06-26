<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['tour_type', 'date', 'time', 'fullname', 'phone', 'email', 'message','property_id'];

    public function property(){
        return $this->belongsTo(Property::class);
    }
}
