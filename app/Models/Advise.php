<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advise extends Model
{
    use HasFactory;
    protected $table = 'advises';
    protected $fillable = ['id', 'name', 'email', 'phone', 'old', 'created_at', 'updated_at'];
}
