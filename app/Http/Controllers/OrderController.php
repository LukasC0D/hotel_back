<?php

namespace App\Http\Controllers;

use App\Http\Resources\HotelCollection;
use App\Models\Hotel;
use App\Models\Order;
use Illuminate\Http\Request;
use Throwable;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // if ($request->search === "name")
        //     return Order::all();
        return Order::all();
    }
    public function show($id, Request $request)
    {
        // if ($request->embed === "comments")
        //     return Order::with('comments')->find($id);
        return Order::find($id);
    }
    // public function returnHotel(Request $request)
    // {
    //         return new HotelCollection(Hotel::all());
    // }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:250',
                'hotel_id' => 'required|max:250'
            ]);

        } catch (Throwable $e) {
            return response("Order not added", 400);
        }
        return Order::create($request->all());
    }
    public function update(Request $request, $id)
    {
        $Order = Order::find($id);
        if ($Order->update(['approved', 1]))
            return response()->json([
                'success' => true,
                'message' => 'Užsakymas sėkmingai patvirtintas'
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Nepavyko patvirtinti užsakymo'
            ], 500);
    }

}
