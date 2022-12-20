<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function roomRates()
    {
        return $this->hasMany(RoomRate::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function bedType()
    {
        return $this->belongsTo(BedType::class);
    }
}
