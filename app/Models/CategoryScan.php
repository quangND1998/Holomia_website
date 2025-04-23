<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryScan extends Model
{
    use HasFactory;
    protected $table = 'category_scans';
    protected $fillable = ['id', 'name', 'logo_pc','logo_mb',  'created_at', 'update_at'];


    public function scans()
    {
        return $this->hasMany(Scan::class, 'category_scan_id');
    }

}
