<?php
    /** @noinspection ALL */

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Floor extends Model
    {
        use HasFactory;

        protected $table = 'floors';

        protected $fillable = [
            'floorname',
            'floornumber',
            'floordescription',
        ];
    }
