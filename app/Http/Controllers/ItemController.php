<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Models\Project;
use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Models\Item;

class ItemController extends InertiaController
{
    use FileUploadTrait;
    public function index($id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $project = Project::findOrFail($id);
            $items = Item::where('project_id', $id)->orderBy('id_priority','asc')->get();

            return Inertia::render('Project/Item/Index', compact('project', 'items'));
        } else {
            return $this->errors()->errors_403();
        }
    }


    public function store(Request $request, $id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'link' => 'nullable',
                    'thumb' => 'nullable|mimes:png,jpg,jpeg',
                ]
            );
            $project = Project::findOrFail($id);
            $destinationpath = 'Project/' . $project->id . '/item/';
            if (!file_exists($destinationpath)) {
                mkdir($destinationpath, 0777, true);
            }

            Item::create([
                'name' => $request->name,
                'link' => $request->link,
                'thumb' => $request->hasFile('thumb') ? $this->image($request->file('thumb'), $destinationpath) : null,
                'project_id' => $project->id
            ]);
            // $iteam->update([
            //     'name' => $request->name,
            //     'link' => $request->link,
            //     'thumb' => $request->hasFile('thumb') ? $this->update_image($request->file('thumb'), $name, $project_path, $project->thumb) : $project->image
            // ])
            return back()->with('success', 'create project successfully');
        } else {
            return $this->errors()->errors_403();
        }
    }

    public function update(Request $request, $id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {

            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'link' => 'nullable',
                    'thumb' => 'nullable|mimes:png,jpg,jpeg',
                ]
            );
            $item = Item::findOrFail($id);
            $project = $item->project;
            $destinationpath = 'Project/' . $project->id . '/item/';
            if (!file_exists($destinationpath)) {
                mkdir($destinationpath, 0777, true);
            }
            $name = time();
            $item->update([
                'name' => $request->name,
                'link' => $request->link,
                'thumb' => $request->hasFile('thumb') ? $this->update_image($request->file('thumb'), $name, $destinationpath, $project->thumb) : $project->image
            ]);

            return back()->with('success', 'update item successfully');
        } else {
            return $this->errors()->errors_403();
        }
    }

    public function delete($id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $item = Item::findOrFail($id);

            $extension = ' ';
            $this->DeleteFolder($item->thumb, $extension);
            $item->delete();
            return back()->with('success', 'create project successfully');
        } else {
            return $this->errors()->errors_403();
        }
    }
    public function priority(Request $request)
    {
            $data = $request->data;
            return $data;
            for ($i = 0; $i < count($data); $i++) {
                Item::findOrFail($data[$i]['id'])->update(['id_priority' => $i]);
            }
            return redirect()->back()->with('success', 'Sort  successfully');

    }
}
