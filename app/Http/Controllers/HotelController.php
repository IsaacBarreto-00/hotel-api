<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    
    public function index(){
        $hotel = Hotel::all();
        return response()->json($hotel);
    }

    public function store(Request $request){
        $hotel = Hotel::create([
            'id' => $request->id,
            'name' => $request->name
        ]);

        return response()->json($hotel);

    }

    public function show($id){
        $hotel = Hotel::findOrFail($id);
        return response()->json($hotel);
    }

    public function update(Request $request, $id){
        $hotel = Hotel::findOrFail($id);
        $hotel->update([
            'name' => $request->name
        ]);

        return response()->json($hotel);

    }

    public function destroy($id){
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return response()->json('Hotel Deleted Successfully');

    }

}
