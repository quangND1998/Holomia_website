<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = ['id', 'title','slug', 'sub_title', 'time','number_student','price','info','roadmap','open_schedule', 'image','category_id','created_at', 'updated_at'];
    public function languages()
    {
        return $this->morphMany(Languages::class, 'languageable');
    }
    public function category()
    {
        return $this->belongsTo(CategoryCourese::class, 'category_id');
    }
}
