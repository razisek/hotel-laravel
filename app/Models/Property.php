<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Property extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = ['id'];

    protected $appends = ['price'];

    protected $casts = [
        'check_in_time' => 'datetime:H:i',
        'check_out_time' => 'datetime:H:i',
    ];

    public function getPriceAttribute()
    {
        $rooms = $this->rooms();
        
        $listPrice = $rooms->get()->map(function ($room) {
            return $room->roomRates->first()->price;
        });

        return $listPrice->min() ?? 0;
    }

    public function thumbnail()
    {
        return $this->morphOne(config('media-library.media_model'), 'model');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
