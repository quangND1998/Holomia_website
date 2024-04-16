<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(10);
        return Inertia::render('Course', compact('courses'));
    }
    public function update(Request $request,$id)
    {
        $setting = Course::findOrFail($id);
        if($setting){
            $setting->update($request->all());
        }else{
            $setting = Course::created($request->all());
        }
        return back()->with('success', 'Create successfully');
    }
}
