<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RateAllotmentController extends Controller
{
    public function index(Room $room)
    {
        return view('dashboard.room.rate-allotment', compact('room'));
    }

    public function getAllRate(Request $request, Room $room)
    {
        $start = $request->date_start;
        $end = $request->date_end;
        $days = $request->days ?? [];

        $rates = $room->rates()
            ->whereBetween('date', [$start, $end])
            ->when($days, fn ($query) => $query->whereIn(DB::raw('DAYNAME(date)'), $days))
            ->orderBy('date', 'desc')
            ->get();

        $rates = $rates->map(fn ($rate) => [
            'date' => Carbon::parse($rate->date)->format('l, d F Y'),
            'dateVal' => Carbon::parse($rate->date)->format('Y-m-d'),
            'price' => $rate->price,
            'rate_id' => $rate->id,
        ]);

        return response()->json($rates);
    }

    public function saveRates(Request $request, Room $room)
    {
        $rates = $request->all();

        $data = [];

        foreach ($rates as $key => $value) {
            $keyArr = explode('-', $key);
            $id = $keyArr[1];
            $data[$id][$keyArr[0]] = $value;
            $data[$id]['room_id'] = $room->id;
        }

        $data = array_values($data);

        $room->rates()->upsert(
            $data,
            ['date'],
            ['price', 'room_id']
        );

        return response()->json(['message' => 'Rates updated successfully']);
    }

    public function getAllAllotment(Request $request, Room $room)
    {
        $start = $request->date_start;
        $end = $request->date_end;
        $days = $request->days ?? [];

        $allotments = $room->allotments()
            ->whereBetween('date', [$start, $end])
            ->when($days, fn ($query) => $query->whereIn(DB::raw('DAYNAME(date)'), $days))
            ->orderBy('date', 'desc')
            ->get();

        $allotments = $allotments->map(fn ($allotment) => [
            'date' => Carbon::parse($allotment->date)->format('l, d F Y'),
            'dateVal' => Carbon::parse($allotment->date)->format('Y-m-d'),
            'available' => $allotment->available,
            'used' => $allotment->used,
            'allotment_id' => $allotment->id,
        ]);

        return response()->json($allotments);
    }
}
