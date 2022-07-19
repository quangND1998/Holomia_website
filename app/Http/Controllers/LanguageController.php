<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Languages;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Traits\LanguageTrait;
use App\Repositories\LanguageRepository;
use Illuminate\Support\Str;

class LanguageController extends InertiaController
{
    use LanguageTrait;
    protected $language;
    public function __construct(LanguageRepository $languageRepository)
    {
        $this->language = $languageRepository;
    }

    
    public function index(Request $request)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $languages =$this->language->query($request);
            $locales = config('app.locales');
            return Inertia::render('Language', compact('languages', 'locales'));
        } else {
            return $this->errors()->errors_403();
        }
    }

    public function store(Request $request)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $this->validate(
                $request,
                [
                    'key' => 'required|unique:languages,key',
                    // 'vn' => 'required',
                    // 'en' => 'required',
                ]
            );
            $name = time();
            $language = new Languages();
            $language->key = $request->key;
            $language->vn = $request->vn;
            $language->en = $request->en;
            $language->save();
            $this->saveLanguage($language->key, $language->en, $language->vn);
            return back()->with('success', 'Create successfully');
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
                    // 'vn' => 'required',
                    // 'en' => 'required',
                ]
            );
            $language = Languages::findOrFail($id);
            $language->vn = $request->vn;
            $language->en = $request->en;
            $language->save();
            $this->saveLanguage($language->key, $language->en, $language->vn);
            return back()->with('success', 'Update successfully');
        } else {
            return $this->errors()->errors_403();
        }
    }

    public function delete($id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $language = Languages::findOrFail($id);
            $this->deleteLanguage($language->key, 'en.json');
            $this->deleteLanguage($language->key, 'vn.json');
            $language->delete();
            return back()->with('success', 'Delete successfully');
        } else {
            return $this->errors()->errors_403();
        }
    }
}
