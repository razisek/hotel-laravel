{{-- {{ dd($property) }} --}}
@extends('layouts.app')

@section('title', 'Property' . ' | ' . $property->name)

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Property</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="col-span-12 mt-8">
        <div class="intro-y box p-5">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                <h2 class="font-medium text-base mr-auto">
                    Hotel Information
                </h2>
            </div>
            <div class="mt-8 flex">
                <img src="https://via.placeholder.com/400x300" class="rounded" alt="properties">
                <div class="m-4">
                    <p class="font-bold text-base">Hotel Name</p>
                    <p class="text-gray-600">{{ $property->name }}</p>
                    <div class="mt-2"></div>
                    <p class="font-bold text-base">Hotel Address</p>
                    <p class="text-gray-600">{{ $property->address }}</p>
                    <div class="mt-2"></div>
                    <p class="font-bold text-base">City</p>
                    <p class="text-gray-600">{{ $property->city }}</p>
                    <div class="mt-2"></div>
                    <p class="font-bold text-base">Star Rating</p>
                    <p class="text-gray-600">{{ $property->star_rating }}</p>
                    <div class="mt-2"></div>
                    <p class="font-bold text-base">Rating</p>
                    <p class="text-gray-600">{{ $property->rating ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
