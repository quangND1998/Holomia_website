<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $fillable = ['id', 'name', 'thumb', 'link', 'project_id',  'created_at', 'updated_at', 'id_priority'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
