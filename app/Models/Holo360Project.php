<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holo360Project extends Model
{
    use HasFactory;
    protected $table = "holo360_project";
    protected $fillable = [
        "id",
        "title",
        "slug",
        "link",
        "image",
        "category_holo360_id",
        "type",
        "id_priority"
    ];
    public function category_project(){
        return $this->belongsTo(CategoryHolo360::class, 'category_holo360_id')->orderBy('id','asc')->orderBy('id_priority','asc');
    }
}
