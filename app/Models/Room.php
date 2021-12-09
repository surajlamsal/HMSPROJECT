<?php

namespace App\Models;

use App\Http\Controllers\ReservationController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table= 'room';

    protected $fillable =[
        'roomno',
        'floor_id',
        'description',
        'roomtype_id'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
