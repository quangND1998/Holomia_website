<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\LanguageTrait;
use App\Models\CategoryCourese;
use App\Models\Languages;
use Carbon\Language;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class CourseController extends Controller
{
    use FileUploadTrait,LanguageTrait;
    public function index()
    {
        $courses = Course::with('languages','category')->paginate(10);
        $category_courses = CategoryCourese::get();
        // return $courses;
        return Inertia::render('Course', compact('courses','category_courses'));
    }
    public function save(Request $request)
    {
        // $this->validate(
        //     $request,
        //     [
        //         'title' => 'required',
        //         'sub_title' => 'nullable',
        //     ]
        // );

            $destinationpath = 'images/course/';
            if (!file_exists($destinationpath)) {
                mkdir($destinationpath, 777, true);
            }
            $name = time();
            $course = Course::create([
                'title' => 'title' . $name,
                'slug' => 'slug' . $name,
                'sub_title' => 'sub_title' . $name,
                'info' => 'info' . $name,
                'roadmap' => 'roadmap' . $name,
                'open_schedule' => 'open_schedule' . $name,
                'image' => $request->hasFile('image') ? $this->image($request->file('image'), $destinationpath) : null,
                'time' => $request->time,
                'number_student' => $request->number_student,
                'price' => $request->price,
                'category_id' => $request->category_id,

            ]);
            $this->CreateLanguage($course->title, $request->title_en, $request->title_vn, $course);
            $this->CreateLanguage($course->sub_title, $request->sub_title_en, $request->sub_title_vn, $course);
            $this->CreateLanguage($course->info, $request->info_en, $request->info_vn, $course);
            $this->CreateLanguage($course->roadmap, $request->roadmap_en, $request->roadmap_vn, $course);
            $this->CreateLanguage($course->open_schedule, $request->open_schedule_en, $request->open_schedule_vn, $course);
            $this->CreateLanguage($course->slug, Str::slug($request->title_en), Str::slug($request->title_vn), $course);
            $course->save();

        return back()->with('success', 'Create successfully');
    }
    public function update(Request $request,$id)
    {
        // dd($request);
        $course = Course::findOrFail($id);
        if($course){
            $destinationpath = 'images/course/';
            if (!file_exists($destinationpath)) {
                mkdir($destinationpath, 777, true);
            }
            $name = time();
            $course->update([
                'image' =>  $request->hasFile('image') ? $this->update_image($request->file('image'), $name, $destinationpath, $course->image) : $course->image,
                'time' => $request->time,
                'number_student' => $request->number_student,
                'price' => $request->price,
                'category_id' => $request->category_id,

            ]);
            $this->updateLanguage($course->slug, Str::slug($request->title_en), Str::slug($request->title_vn), $course);
            $this->updateLanguage($course->title, $request->title_en, $request->title_vn, $course);
            $this->updateLanguage($course->sub_title, $request->sub_title_en, $request->sub_title_vn, $course);
            $this->updateLanguage($course->info, $request->info_en, $request->info_vn, $course);
            $this->updateLanguage($course->roadmap, $request->roadmap_en, $request->roadmap_vn, $course);
            $this->updateLanguage($course->open_schedule, $request->open_schedule_en, $request->open_schedule_vn, $course);
            $course->save();
        }
        return back()->with('success', 'Create successfully');
    }
    public function delete($id){
        $course = Course::findOrFail($id);
        // dd($person);
        $imagePath = public_path($course->image);

        if (File::exists($imagePath)) {
            // Delete the image file
            File::delete($imagePath);
            // return "Image deleted successfully.";
        }
        $course->delete();
        return back()->with('success', 'Delete successfully');
    }

}
