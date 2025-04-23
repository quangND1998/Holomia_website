<?php

namespace App\Http\Controllers\Scan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GroupScan;
use App\Models\Scan;

class GroupScanController extends Controller
{
    //
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required',
                'expired_date' =>  'required|date|after:now',
            ]
        );
        $group = new GroupScan;
        $group->title = $request->title;
        $group->expired_date = $request->expired_date;
        $group->save();
        $scans = Scan::whereIn('id', $request->scans_list)->get();
        foreach ($scans as $scan) {
            $group->scans()->save($scan);
        }
        return back()->with('success', 'create successful');
    }
    public function update(Request $request, $id){
        $this->validate(
            $request,
            [
                'title' => 'required',
                'expired_date' =>  'required|date',
            ]
        );
        $groupscans = GroupScan::find($id);
        if($groupscans){
            $groupscans->title = $request->title;
            $groupscans->expired_date = $request->expired_date;
            $groupscans->save();
            foreach($groupscans->scans as $scan){
                $scan->group_id = null;
                $scan->save();
            }

            $scans = Scan::whereIn('id', $request->scans_list)->get();
            foreach ($scans as $scan) {
                $scan->expired_date = $request->expired_date;
                $groupscans->scans()->save($scan);
            }
            return back()->with('success', 'Update successful');
        }
        return back()->with('erorr', 'Not found Group');
    }
}
