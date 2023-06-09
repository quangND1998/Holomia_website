<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryHolo360;
use App\Http\Requests\UpdateCategoryHolo360Request;
use App\Models\CategoryHolo360;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Http\Controllers\Traits\FileUploadTrait;
class CategoryHolo360Controller extends Controller
{
    use FileUploadTrait;
    public function index(){
        $categories =CategoryHolo360::with('holo_projects')->orderBy('id_priority','asc')->get();
        return Inertia::render('CategoryHolo360/Index',compact('categories'));
    }
    public function store(StoreCategoryHolo360 $request){
    // Kiểu 1
        // $this->validate(
        //     $request,
        //     [
        //         'key' => 'required|unique:languages,key',
        //         // 'vn' => 'required',
        //         // 'en' => 'required',
        //     ]
        // );
        CategoryHolo360::create([
            'name'=> $request->name,
            'slug'=>  Str::slug($request->name),
            'content' => $request->content
        ]);
        return back()->with('success', 'Create successfully');
        // $category = new CategoryHolo360();
        // $category->name = $request->name
    }
    public function delete( $id){
        // xóa category thi project bị xóa
        $category = CategoryHolo360::with('holo_projects')->findOrFail($id);
        foreach($category->holo_projects as $project){
            $extension = " ";
            $this->DeleteFolder($project->image, $extension);
        }
       $category->delete();
       return back()->with('success', 'Delete successfully');
    }
    public function update( UpdateCategoryHolo360Request $request , CategoryHolo360 $category){


        $category->update([
            'name'=> $request->name,
            'slug'=>  Str::slug($request->name),
            'content' => $request->content
        ]);
        return back()->with('success', 'Create successfully');
    }
     // sắp xếp
     public function priorityCategory(Request $request)
     {
         
             $data = $request->data;
             for ($i = 0; $i < count($data); $i++) {
                CategoryHolo360::findOrFail($data[$i]['id'])->update(['id_priority' => $i]);
             }
             return redirect()->back()->with('success', 'Sort  successfully');
      
     }
}
