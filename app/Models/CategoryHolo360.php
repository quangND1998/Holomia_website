<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryHolo360 extends Model
{
    use HasFactory;
    protected $table = "category_holo360";
    protected $fillable = [
        "id",
        "name",
        "slug",
        "content",
        "image",
        "id_priority"

    ];
    public function holo_projects(){
        return $this->hasMany(Holo360Project::class, 'category_holo360_id')->orderBy('id','asc')->orderBy('id_priority','asc');
    }
}
