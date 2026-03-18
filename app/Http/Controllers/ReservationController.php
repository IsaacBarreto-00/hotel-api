<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservation = Reservation::all();
        return response()->json($reservation);
    }

    public function store(Request $request)
    {
        $reservation = Reservation::create([
            'id' =>$request->id,
            'hotel_id' => $request->hotel_id,
            'room_id' => $request->room_id,
            'customer_first_name' => $request->customer_first_name,
            'customer_last_name' => $request->customer_last_name,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_price' => $request->totalprice
        ]);

        return response()->json($reservation);

    } 

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return response()->json($reservation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update([
            'hotel_id' => $request->hotel_id,
            'room_id' => $request->room_id,
            'customer_first_name' => $request->customer_first_name,
            'customer_last_name' => $request->customer_last_name,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'totalprice' => $request->totalprice,
        ]);

        return response()->json($reservation);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return response()->json('Reservation Deleted Successfully');
    }
}
