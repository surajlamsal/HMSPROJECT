<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodOrder extends Model
{
    use HasFactory;

    protected $fillable = ['guest_id', 'food_id', 'quantity'];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}
