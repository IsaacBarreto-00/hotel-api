<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{

    protected $keyType = 'int';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

}
