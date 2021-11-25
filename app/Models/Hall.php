<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Hall extends Model
{
    use HasFactory;
    protected $table= 'halls';
        protected $fillable=[
        'name',
        'description',
        'childoccupancy','adultoccupancy','floor','baseprice','highprice','doc','amenities_id'
        ];
}
