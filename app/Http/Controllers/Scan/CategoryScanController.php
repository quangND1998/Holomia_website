<?php

namespace App\Http\Controllers\Scan;

use App\Http\Controllers\Controller;
use App\Models\CategoryScan;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Traits\FileUploadTrait;
class CategoryScanController extends Controller
{
    use FileUploadTrait;
    function __construct()
    {
        // $this->middleware('permission:users-manager', ['only' => ['index', 'store', 'update', 'delete']]);
    }
    public function index()
    {
        $category_scans = CategoryScan::get();
        return Inertia::render('Scan/CategoryScan', compact('category_scans'));
    }
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|unique:category_scans',

            ]
        );
        $destinationpath = 'scans/';
        if (!file_exists($destinationpath)) {
            mkdir($destinationpath, 0777, true);
        }

        $category_scan = new CategoryScan();
        $category_scan->name = $request->name;
        $category_scan->logo_pc = $request->hasFile('logo_pc') ? $this->image($request->file('logo_pc'), $destinationpath) : null;
        $category_scan->logo_mb = $request->hasFile('logo_mb') ? $this->image($request->file('logo_mb'), $destinationpath) : null;
        $category_scan->save();
        return back()->with('success', 'Create successfully');
    }

    public function update(Request $request, $id)
    {

        $category_scan = CategoryScan::findOrFail($id);
        $this->validate(
            $request,
            [
                'name' => 'required|unique:category_scans,name,' . $category_scan->id,
            ]
        );
        $destinationpath = 'scans/';
        if (!file_exists($destinationpath)) {
            mkdir($destinationpath, 0777, true);
        }
        $name = time();
        $category_scan->name = $request->name;
        $category_scan->logo_pc =  $request->hasFile('logo_pc') ? $this->update_image($request->file('logo_pc'),$name, $destinationpath, $category_scan->logo_pc) :  $category_scan->logo_pc;
        $category_scan->logo_mb =  $request->hasFile('logo_mb') ? $this->update_image($request->file('logo_mb'), $name, $destinationpath, $category_scan->logo_mb) :  $category_scan->logo_mb;
        $category_scan->save();
        return back()->with('success', 'Update successfully');
    }

    public function delete($id)
    {

        $category_scan = CategoryScan::findOrFail($id);

        $category_scan->delete();
        return back()->with('success', 'Delete successfully');
    }
}
