<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scan extends Model
{
    use HasFactory;

    protected $table = 'scans';

    protected $fillable = ['id', 'name', 'favicon',  'model_code', 'slug', 'active', 'code', 'category_scan_id', 'user_id', 'logo', 'expired_date', 'created_at', 'update_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category_scan()
    {
        return $this->belongsTo(CategoryScan::class, 'category_scan_id');
    }

    public function history_mail()
    {
        return $this->hasOne(HistoryMailNoti::class, 'scan_id');
    }
    public function group()
    {
        return $this->belongsTo(GroupScan::class, 'group_id');
    }
}
