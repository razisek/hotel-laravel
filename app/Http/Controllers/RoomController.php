<?php

namespace App\Http\Controllers;

use App\Models\BedType;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\QueryBuilder;

class RoomController extends Controller
{
    public function index()
    {
        $manager = auth()->guard('manager')->user();
        $rooms = QueryBuilder::for(Room::class)
            ->allowedFilters(['name', 'description'])
            ->allowedSorts(['name', 'description'])
            ->allowedIncludes(['users'])
            ->whereHas('property.manager', function ($query) use ($manager) {
                $query->where('manager_id', $manager->id);
            })
            ->paginate(10);

        return view('dashboard.room.list', compact('rooms'));
    }

    public function create()
    {
        $bedTypes = BedType::all();
        return view('dashboard.room.create', compact('bedTypes'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'capacity' => 'required',
            'room_size' => 'required',
            'bed_type_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $breakfast = $request->has('breakfast') ? 1 : 0;
        $wifi = $request->has('wifi') ? 1 : 0;

        $roomData = array_merge($request->all(), [
            'property_id' => 1,
            'with_breakfast' => $breakfast,
            'has_wifi' => $wifi,
        ]);

        Room::create($roomData);

        return redirect()->route('rooms')
            ->with('success', 'Room created successfully.');
    }

    public function edit(Room $room)
    {
        $bedTypes = BedType::all();
        return view('dashboard.room.edit', compact('room', 'bedTypes'));
    }

    public function update(Request $request, Room $room)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'capacity' => 'required',
            'room_size' => 'required',
            'bed_type_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $breakfast = $request->has('breakfast') ? 1 : 0;
        $wifi = $request->has('wifi') ? 1 : 0;

        $roomData = array_merge($request->all(), [
            'property_id' => 1,
            'with_breakfast' => $breakfast,
            'has_wifi' => $wifi,
        ]);

        $room->update($roomData);

        return redirect()->route('rooms')
            ->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('rooms')
            ->with('success', 'Room deleted successfully');
    }
}
