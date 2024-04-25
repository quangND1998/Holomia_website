<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCourese extends Model
{
    use HasFactory;
    protected $table = "category_coureses";
    protected $fillable = [
        "id",
        "name",
        "slug",
        "created_at",
        "updated_at"
    ];

    public function course()
    {
        return $this->hasMany(Course::class, 'category_id');
    }
}
