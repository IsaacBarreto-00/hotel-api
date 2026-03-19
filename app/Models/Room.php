<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    protected $hidden = ['created_at', 'updated_at'];
    protected $keyType = 'int';
    public $incrementing = false;

    protected $fillable = [
        'id', 
        'hotel_id', 
        'name', 
        'inventory_count'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}
