<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'photo', 'description', 'no_rooms', 'no_toilets', 'dimensions', 'tag', 'price', 'user_id', 'city_id'];

    public function favourite(){
        return $this->hasMany(Favourite::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
