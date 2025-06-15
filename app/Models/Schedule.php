<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

}
