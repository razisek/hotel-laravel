<?php

namespace App\Http\Controllers;

use App\Http\Resources\IndexCollection;
use App\Http\Resources\NotFoundResource;
use App\Http\Resources\ShowResource;
use App\Models\Property;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PropertyController extends Controller
{
    public function search(Request $request)
    {
        $properties = QueryBuilder::for(Property::class)
            ->allowedFilters([
                AllowedFilter::exact('star_rating'),
                'rating',
                'name',
            ])
            ->with(['media'])
            ->rating()
            ->reviewTotal()
            ->get();

        if ($properties->count() == 0) {
            return new NotFoundResource('No properties found');
        }

        $properties->each(function ($property) {
            $images = collect();
            $property->media->each(function ($media) use ($images) {
                $images->push($media->getFullUrl());
            });
            $property->images = $images;
            $property = $property->makeHidden(['media']);
        });

        return new IndexCollection($properties, true, 'properties successfully retrieved');
    }

    public function detail($id)
    {
        $property = QueryBuilder::for(Property::class)
            ->with(['media', 'reviews'])
            ->where('id', $id)
            ->rating()
            ->reviewTotal()
            ->bedType()
            ->first();

        if (!$property) {
            return new NotFoundResource('Property not found');
        }

        $images = collect();
        $property->media->each(function ($media) use ($images) {
            $images->push($media->getFullUrl());
        });
        $property->images = $images;
        $property = $property->makeHidden(['media', 'rooms']);

        $property->reviews = $property->reviews->map(function ($review) {
            $review->makeHidden(['room_id', 'user_id', 'laravel_through_key']);
            return $review;
        });

        $property->bed_type = $property->rooms->map(function ($room) {
            return $room->bedType->name;
        })->unique()->values();

        return new ShowResource($property, true, 'property successfully retrieved');
    }

    public function testIMage($id)
    {
        $property = Property::find($id);
        $property->addMediaFromRequest('image')->toMediaCollection('images');
    }
}
