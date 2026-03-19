<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{

    protected $hidden = ['created_at', 'updated_at'];
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
