<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Http\Resources\RoomResource;

class RoomController extends Controller
{
    // CRUD - Create, Read, Update, Delete

    public function index(){
        $room = Room::all();
        return response()->json($room);
    }

    // Create
    public function store(Request $request){
        $room = Room::create([
            'id' => $request->id,
            'hotel_id' => $request->hotel_id,
            'name' => $request->name,
            'inventory_count' => $request->inventory_count
        ]);

        return response()->json($room);
    
    }

    // Read

    public function show($id){
        $room = Room::findOrFail($id);
        return response()->json($room);
    }

    public function update(Request $request, $id){
        $room = Room::findOrFail($id);
        $room->update([
            'hotel_id' => $request->hotel_id,
            'name' => $request->name,
            'inventory_count' => $request->inventory_count
        ]);

        return response()->json($room);

    }

    public function destroy($id){
        $room = Room::findOrFail($id);
        $room->delete();

        return response()->json('Room Deleted Successfully');

    }

}
