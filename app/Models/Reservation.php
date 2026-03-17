<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    protected $keyType = 'int';
    public $incrementing = false;
    
    protected $fillable = [
        'id',
        'hotel_id',
        'room_id',
        'customer_first_name',
        'customer_last_name',
        'check_in',
        'check_out',
        'total_price',
        'created_at'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
