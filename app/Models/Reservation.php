<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'guest_id',
        'room_id',
        'start',
        'end',
        'numberofguests',
        'price',
        'checkOutFlag',
    ];

    public function reservation_guest()
    {
        return $this->belongsTo(Guest::class, 'guest_id', 'id');
    }

    public function reservation_room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

}
