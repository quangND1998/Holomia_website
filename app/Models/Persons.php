<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    use HasFactory;
    protected $table = 'persons';
    protected $fillable = ['id', 'name', 'description', 'type','created_at', 'updated_at'];
}
