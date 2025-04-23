<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupScan extends Model
{
    use HasFactory;
    public function scans()
    {
        return $this->hasMany(Scan::class, 'group_id');
    }
    public function history_mail()
    {
        return $this->hasOne(HistoryMailNoti::class, 'scan_id');
    }
}
