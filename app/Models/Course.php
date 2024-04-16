<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = ['id', 'title', 'sub_title', 'time','number_student','price','info','roadmap','open_schedule', 'created_at', 'updated_at'];
}
