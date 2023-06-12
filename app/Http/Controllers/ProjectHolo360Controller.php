<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectHolo360Request;
use App\Models\CategoryHolo360;
use App\Models\Holo360Project;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Requests\UpdateProjectHolo360Request;

class ProjectHolo360Controller extends Controller
{
    use FileUploadTrait;
    public function index(){
        $categories = CategoryHolo360::get();
        // sắp xếp orderBy('id_priority','asc')->get();
        $projects =Holo360Project::with('category_project')->orderBy('id_priority','asc')->paginate(10);
        return Inertia::render('CategoryHolo360/ProjectHolo',compact('projects','categories'));
    }
    public function store(StoreProjectHolo360Request $request){
        // dd($request);
        $name = time();
        $destinationpath = 'images/projects/';
        if (!file_exists($destinationpath)) {
            mkdir($destinationpath, 0777, true);
        }
        Holo360Project::create([
            'title'=> $request->title,
            'slug'=>  Str::slug($request->title),
            'link' => $request->link,
            'image' =>  $request->hasFile('image') ? $this->image($request->file('image'), $destinationpath) : null,
            'category_holo360_id' => $request->category_holo360_id,
        ]);
        return back() -> with('success', 'Create successfully');
    }
    public function update(UpdateProjectHolo360Request $request, Holo360Project $project){
        $name = time();
        $destinationpath = 'images/contents/';
        if (!file_exists($destinationpath)) {
            mkdir($destinationpath, 0777, true);
        }
        $project ->update([
            'title'=> $request->title,
            'slug'=>  Str::slug($request->title),
            'link' => $request->link,
            'image' =>  $request->hasFile('image') ? $this->update_image($request->file('image'), $name, $destinationpath, $project->image) : $project->image,
            'category_holo360_id' => $request->category_holo360_id,
        ]);
        return back() -> with('success', 'Update successfully');
    }
    public function delete($id){
        $project = Holo360Project::findOrFail($id);
        $extension = " ";
        $this->DeleteFolder($project->image, $extension);
       $project->delete();
       return back()->with('success', 'Delete successfully');
    }
    // sắp xếp
    public function priorityProject(Request $request)
    {
        
            $data = $request->data;
            for ($i = 0; $i < count($data); $i++) {
                Holo360Project::findOrFail($data[$i]['id'])->update(['id_priority' => $i]);
            }
            return redirect()->back()->with('success', 'Sort  successfully');
     
    }
}
