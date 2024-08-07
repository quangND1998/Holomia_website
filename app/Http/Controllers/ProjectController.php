<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Models\Page;
use App\Models\Project;
use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Models\Item;
class ProjectController extends InertiaController
{
    use FileUploadTrait;
    public function index()
    {

        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $projects = Project::get();
            return Inertia::render('Project/Index', compact('projects'));
        } else {
            return $this->errors()->errors_403();
        }
    }
    public function preview_project($slug, Request $request)
    {
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $projects = Project::where('link','!=',null)->get();
        $project = Project::with('items')->where('slug', $slug)->first();
        if ($project) {
            $items = $project->items()->orderBy('id_priority','asc')->paginate(12);
        } else {
            $items = null;
        }
        return view('project', compact('project', 'items', 'pages','projects'));
    }
    public function preview_project_html($slug, Request $request)
    {
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $project = Project::with('items')->where('slug', $slug)->first();
        $projects = Project::all();
        if ($project) {
            $items = $project->items()->paginate(12);
        } else {
            $items = null;
        }
        return view('project_iframe', compact('project', 'items', 'pages','projects'));
    }

    public function saveView( Request $request){
        $item = Item::findOrfail($request->id);
        $item->view += 1;
        $item->save();
        return $item->view;
    }

    public function store(Request $request)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'image' => 'nullable|mimes:png,jpg,jpeg',
                ]
            );
            $destinationpath = 'Project/';
            if (!file_exists($destinationpath)) {
                mkdir($destinationpath, 0777, true);
            }
            $project = Project::create([
                'name' => $request->name,
                'link' => $request->link,
                'slug' => Str::slug($request->name),

            ]);
            $project_path = $destinationpath . $project->id . '/';
            if (!file_exists($project_path)) {
                mkdir($project_path, 0777, true);
            }
            $project->image = $request->hasFile('image') ? $this->image($request->file('image'), $project_path) : null;
            $project->save();
            return back()->with('success', 'create project successfully');
        } else {
            return $this->errors()->errors_403();
        }
    }

    public function update(Request $request, $id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $project = Project::findOrFail($id);
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'image' => 'nullable|mimes:png,jpg,jpeg',
                ]
            );
            $destinationpath = 'Project/';
            if (!file_exists($destinationpath)) {
                mkdir($destinationpath, 0777, true);
            }
            $project_path = $destinationpath . $project->id . '/';
            if (!file_exists($project_path)) {
                mkdir($project_path, 0777, true);
            }
            $name = time();
            $project->update([
                'name' => $request->name,
                'link' => $request->link,
                'slug' => Str::slug($request->name),
                'image' => $request->hasFile('image') ? $this->update_image($request->file('image'), $name, $project_path, $project->image) : $project->image

            ]);


            $project->save();
            return back()->with('success', 'create project successfully');
        } else {
            return $this->errors()->errors_403();
        }
    }

    public function delete($id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $project = Project::findOrFail($id);
            $project_path = 'Project/' . $project->id;
            if (!file_exists($project_path)) {
                mkdir($project_path, 0777, true);
            }
            $extension = ' ';
            $this->DeleteFolder($project_path, $extension);
            $project->delete();
            return back()->with('success', 'create project successfully');
        } else {
            return $this->errors()->errors_403();
        }
    }
}
