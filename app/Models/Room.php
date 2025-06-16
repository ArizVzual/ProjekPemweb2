<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function reviews() {
    return $this->hasMany(Review::class);
}

    protected $table = 'ruangan'; // karena nama tabelnya bukan default 'rooms'

    protected $fillable = [
        'nama', 'kapasitas', 'deskripsi', 'latitude', 'longitude', 'gedung'
    ];

}
