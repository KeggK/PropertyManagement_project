<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insertion extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'photo', 'description', 'no_rooms', 'no_toilets', 'dimensions', 'tag'];
}
