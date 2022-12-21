<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
        'rating' => 'float',
    ];

    public function getPriceAttribute()
    {
        $rooms = $this->rooms();

        $listPrice = $rooms->get()->map(function ($room) {
            return $room->roomRates->first()->price ?? 0;
        });

        $listPrice = $listPrice->filter(function ($price) {
            return $price > 0;
        });

        if ($listPrice->count() == 0) {
            return 0;
        }

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

    public function reviews()
    {
        return $this->hasManyThrough(Review::class, Room::class);
    }

    public function scopeRating($query)
    {
        return $query->withCount(['reviews as rating' => function ($query) {
            $query->select(DB::raw('avg(rating)'));
        }]);
    }

    public function scopeReviewTotal($query)
    {
        return $query->withCount(['reviews as total_review' => function ($query) {
            $query->select(DB::raw('count(rating)'));
        }]);
    }

    public function scopeRatingFilter($query, $rating)
    {
        return $query->whereHas('rooms.reviews', function ($query) use ($rating) {
            $query->havingRaw('round(avg(rating), 0) = ?', [$rating]);
        });
    }

    public function scopeBedType($query)
    {
        return $query->with('rooms.bedType');
    }
}
