<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    use HasFactory;
    protected $table= 'roomtype';
        protected $fillable=[
        'roomtypename',
        'description',
        'occupancy','roomtypeimage','baseoccupancy','higheroccupancy','extrabed','baseprice','additionalprice','extrabedprice','amenities_id'
    ];
}
