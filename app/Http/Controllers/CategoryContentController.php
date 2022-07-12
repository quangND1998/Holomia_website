<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Page;
use Illuminate\Support\Facades\Gate;
use App\Models\Section;
use Inertia\Inertia;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\LanguageTrait;
use App\Http\Requests\CategoryContent\PostRequest;
use App\Http\Requests\CategoryContent\UpdateRequest;
use App\Models\CategoryContent;
use App\Models\Languages;
use App\Jobs\DeleteLanguage;
use Illuminate\Support\Str;

class CategoryContentController extends InertiaController
{
    use FileUploadTrait, LanguageTrait;
    public function category(Request $request, $slug)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $section = Section::with('category_contents.languages', 'page', 'theme', 'languages')->where('title', $slug)->first();
            if ($section == null) {
                return $this->errors()->errors_404();
            }
            $page = $section->page;
            return Inertia::render('Category/Category', compact('section', 'page'));
        } else {
            return $this->errors()->errors_403();
        }
    }


    public function category_getContent(Request $request, $slug)
    {

        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $category = CategoryContent::with('contents.languages', 'languages', 'section.page', 'contents.images')->where('title', $slug)->first();



            if ($category == null) {
                $erros = 404;
                return Inertia::render('Error', ['status' => $erros]);
            }
            $section = $category->section;
            $page = $section->page;


            return Inertia::render('Category/Content', compact('category', 'section', 'page'));
        } else {
            return $this->errors()->errors_403();
        }
    }


    public function createContentCategory($slug)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $category = CategoryContent::with('contents.languages',  'languages', 'section.page', 'section.theme')->where('title', $slug)->first();



            if ($category == null) {
                $erros = 404;
                return Inertia::render('Error', ['status' => $erros]);
            }
            $section = $category->section;
            $page = $section->page;

            return Inertia::render('Category/CreateContent', compact('category', 'section', 'page'));
        } else {
            return $this->errors()->errors_403();
        }
    }

    public function editContentCategory($id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $content = Content::with('languages', 'contentable', 'images')->findOrFail($id);

            $category = $content->contentable;
            $section = $category->section;
            $theme = $section->theme;
            $page = $section->page;
            if ($content == null) {
                $erros = 404;
                return Inertia::render('Error', ['status' => $erros]);
            }
            return Inertia::render('Category/UpdateContent',  compact('category', 'section', 'page', 'content', 'theme'));
        } else {
            return $this->errors()->errors_403();
        }
    }
    public function store(PostRequest $request, $id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {

            $name = time();
            $section = Section::findOrFail($id);
            $category = CategoryContent::create([
                'title' => 'title' . $name,
                'section_id' => $section->id
            ]);
            $this->CreateLanguage($category->title, $request->title_en, $request->title_vn, $category);
            return back()->with('success', 'Create successfully');
        } else {
            return $this->errors()->errors_403();
        }
    }

    public function update(UpdateRequest $request, $id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $category = CategoryContent::with('languages')->findOrFail($id);

            $this->updateLanguage($category->title, $request->title_en, $request->title_vn, $category);
            return back()->with('success', 'Create successfully');
        } else {
            return $this->errors()->errors_403();
        }
    }
    public function delete($id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $category = CategoryContent::with('languages')->findOrFail($id);

            foreach ($category->languages as $language) {
                dispatch(new DeleteLanguage($language->key, 'en.json'));
                dispatch(new DeleteLanguage($language->key, 'vn.json'));
            }
            foreach ($category->contents as $content) {
                $extension = " ";
                $this->DeleteFolder($content->image, $extension);
                foreach ($content->languages as $language) {
                    dispatch(new DeleteLanguage($language->key, 'en.json'));
                    dispatch(new DeleteLanguage($language->key, 'vn.json'));
                }
            }
            $category->contents()->delete();
            $category->delete();
            return back()->with('success', 'Delete successfully');
        } else {
            return $this->errors()->errors_403();
        }
    }
}
