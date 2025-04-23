<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryMailNoti extends Model
{
    use HasFactory;

    protected $table = 'history_mail_notis';

    protected $fillable = ['id', 'name', 'time_send',  'scan_id', 'created_at', 'update_at'];
    public function scan()
    {
        return $this->belongsTo(Scan::class, 'scan_id');
    }
    public function groupScan()
    {
        return $this->belongsTo(GroupScan::class, 'group_id');
    }
}
