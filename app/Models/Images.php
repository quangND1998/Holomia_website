<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = ['id', 'id_priority', 'name', 'embed', 'element', 'image', 'content_id', 'created_at', 'updated_at'];
    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
