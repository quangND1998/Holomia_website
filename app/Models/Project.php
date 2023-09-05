<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = ['id', 'name', 'slug','image',  'created_at', 'updated_at', 'id_priority'];

    public function items()
    {
        return $this->hasMany(Item::class, 'project_id')->orderBy('id','asc')->orderBy('id_priority','asc');
    }
}
