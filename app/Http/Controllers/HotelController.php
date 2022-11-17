<?php

namespace App\Http\Controllers;

use App\Http\Resources\HotelCollection;
use App\Models\Hotel;
use App\Models\Order;
use Illuminate\Http\Request;
use Throwable;

class HotelController extends Controller
{
    public function index(Request $request)
    {
            return new HotelCollection(Hotel::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'image' => 'required|max:255',
            'travel_time' => 'required|max:255'

        ]);
        return Hotel::create($request->all());
    }

    public function show($id, Request $request)
    {
        if ($request->embed === "comments")
            return Hotel::with('comments')->find($id);
        return Hotel::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'image' => 'required|max:255',
            'travel_time' => 'required|max:255'

        ]);
        $Hotel = Hotel::find($id);
        $Hotel->update($request->all());
        return $Hotel;
    }

    public function destroy($id)
    {
        return Hotel::destroy($id) === 0
            ? response(["status" => "failure"], 404)
            : response(["status" => "success"], 200);
    }
    public function addOrder(Request $request)
    {
        try {
            $request->validate([
                // 'name' => 'required|max:250',
                // 'hotel_id' => 'required|max:250'
            ]);

        } catch (Throwable $e) {
            return response("Rating not added", 400);
        }
        return Order::create($request->all());
    }
}
