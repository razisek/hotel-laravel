@extends('layouts.app')

@section('title', 'Edit Room')

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Room</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="col-span-12 mt-8">
        @error('name')
            <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert"> <i
                    data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> Room Name : {{ $message }} <button
                    type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-feather="x"
                        class="w-4 h-4"></i> </button> </div>
        @enderror
        @error('description')
            <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert"> <i
                    data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> Description : {{ $message }} <button
                    type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-feather="x"
                        class="w-4 h-4"></i> </button> </div>
        @enderror
        @error('capacity')
            <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert"> <i
                    data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> Capacity : {{ $message }} <button type="button"
                    class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-feather="x"
                        class="w-4 h-4"></i> </button> </div>
        @enderror
        @error('room_size')
            <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert"> <i
                    data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> Room Size : {{ $message }} <button
                    type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-feather="x"
                        class="w-4 h-4"></i> </button> </div>
        @enderror
        @error('bed_type_id')
            <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert"> <i
                    data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> Bed Type : {{ $message }} <button type="button"
                    class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-feather="x"
                        class="w-4 h-4"></i> </button> </div>
        @enderror
        <form class="intro-y box p-5" action="{{ route('rooms.update', $room->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="crud-form-1" class="form-label">Room Name</label>
                <input id="crud-form-1" type="text" class="form-control w-full" name="name" value="{{ $room->name }}"
                    placeholder="Input room name">
            </div>
            <div class="mt-3">
                <label for="crud-form-3" class="form-label">Room Description</label>
                <textarea id="crud-form-3" name="description" class="form-control w-full" placeholder="Description" rows="6">{{ $room->description }}</textarea>
            </div>
            <div class="mt-3">
                <label for="crud-form-4" class="form-label">Capacity (people)</label>
                <div class="input-group">
                    <input id="crud-form-4" type="number" name="capacity" class="form-control"
                        placeholder="Input capacity room" value="{{ $room->capacity }}" aria-describedby="input-group-2">
                </div>
            </div>
            <div class="mt-3">
                <label for="crud-form-4" class="form-label">Room Size (m<sup>2</sup>)</label>
                <div class="input-group">
                    <input id="crud-form-4" type="number" name="room_size" class="form-control"
                        placeholder="Input room size" value="{{ $room->room_size }}" aria-describedby="input-group-2">
                </div>
            </div>
            <div class="mt-3">
                <label for="crud-form-3" class="form-label">Bed Type</label>
                <select data-placeholder="Select Bed Type" name="bed_type_id" class="tom-select w-full">
                    <option value="" selected disabled>-- Select Bed Type --</option>
                    @foreach ($bedTypes as $bedType)
                        <option value="{{ $bedType->id }}" {{ $room->bed_type_id == $bedType->id ? 'selected' : '' }}>{{ $bedType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <label>Has Breakfast</label>
                <div class="form-switch mt-2">
                    <input type="checkbox" name="breakfast" {{ $room->with_breakfast == 1 ? 'checked' : '' }} class="form-check-input">
                </div>
            </div>
            <div class="mt-3">
                <label>Has WiFi</label>
                <div class="form-switch mt-2">
                    <input type="checkbox" name="wifi" {{ $room->has_wifi == 1 ? 'checked' : '' }} class="form-check-input">
                </div>
            </div>
            <div class="text-right mt-5">
                <a href="{{ url()->previous() }}">
                    <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                </a>
                <button type="submit" class="btn btn-primary w-24">Edit</button>
            </div>
        </form>
    </div>
@endsection
