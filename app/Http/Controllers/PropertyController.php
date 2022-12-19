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
            ->with(['thumbnail'])
            ->get();

        if ($properties->count() == 0) {
            return new NotFoundResource('No properties found');
        }

        return new IndexCollection($properties, true, 'properties successfully retrieved');
    }

    public function detail($id)
    {
        $property = QueryBuilder::for(Property::class)
            ->with(['media'])
            ->where('id', $id)
            ->first();

        if (!$property) {
            return new NotFoundResource('Property not found');
        }

        $images = collect();
        $property->media->each(function ($media) use ($images) {
            $images->push($media->getFullUrl());
        });
        $property->images = $images;
        $property = collect($property);
        $property->forget('media');

        return new ShowResource($property, true, 'property successfully retrieved');
    }

    public function testIMage()
    {
        $property = Property::find(1);
        $property->addMediaFromRequest('image')->toMediaCollection('images');
    }
}
