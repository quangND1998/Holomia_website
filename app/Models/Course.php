<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Course extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = ['id', 'title', 'sub_title', 'time','number_student','price','info','roadmap','open_schedule', 'image','created_at', 'updated_at'];
    public function course_related_images()
    {
        return $this->media()->where('collection_name', 'course_related_images');
    }
    public function languages()
    {
        return $this->morphMany(Languages::class, 'languageable');
    }
}
