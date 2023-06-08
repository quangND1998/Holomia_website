<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryHolo360;
use App\Http\Requests\UpdateCategoryHolo360Request;
use App\Models\CategoryHolo360;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
class CategoryHolo360Controller extends Controller
{
    public function index(){
        $categories =CategoryHolo360::get();
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
        $category = CategoryHolo360::findOrFail($id);
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
}
