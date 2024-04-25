<?php

namespace App\Http\Controllers;

use App\Models\CategoryCourese;
use App\Repositories\CategoryCourseRepository;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryCourseController extends Controller
{
    protected $category;
    public function __construct(CategoryCourseRepository $categoryNewRepository)
    {
        $this->category = $categoryNewRepository;
    }

    public function index()
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $categories = $this->category->get();

            return Inertia::render('Category_Course', compact('categories'));
        } else {
            return $this->errors()->errors_403();
        }
    }

    public function store(Request $request)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $category = CategoryCourese::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);
            return back()->with('success', 'Create successfully');
        } else {
            return $this->errors()->errors_403();
        }
    }

    public function update(Request $request, $id)
    {

        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $category = CategoryCourese::findOrFail($id);
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);
            return back()->with('success', 'Create successfully');
        } else {
            return $this->errors()->errors_403();
        }
    }

    public function delete($id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $category = CategoryCourese::findOrFail($id);

            $category->delete();
            return back()->with('success', 'Delete successfully');
        } else {
            return $this->errors()->errors_403();
        }
    }
}
