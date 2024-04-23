<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    use HasFactory;
    protected $table = 'persons';
    protected $fillable = ['id', 'name', 'description', 'type','image','score','created_at', 'updated_at'];
    public function languages()
    {
        return $this->morphMany(Languages::class, 'languageable');
    }
}
