<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table= 'employees';
        protected $fillable=[
        'firstname',
        'lastname',
        'email','password','dob','phone','department','role','designation','address','employeeimage','citizenship','pannumber','dateofjoining','salary','shift'
    ];
}
