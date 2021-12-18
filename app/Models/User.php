<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dob',
        'phone',
        'department',
        'role',
        'designation',
        'address',
        'employeeimage',
        'citizenship',
        'pannumber',
        'dateofjoining',
        'salary',
        'shift',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*public function hasDepartment(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Department::class, 'id', 'department');
    }

    public function hasShift(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Shift::class, 'shift', 'id');
    }*/

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}
