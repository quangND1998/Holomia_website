<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Tag;
use Illuminate\Support\Str;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\LanguageTrait;
use App\Http\Requests\News\PostNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Models\CategoryNew;
use App\Models\News;
use App\Repositories\NewRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Languages;

class NewController extends InertiaController
{
    use FileUploadTrait, LanguageTrait;

    protected $new;
    public function __construct(NewRepository $newRepository)
    {
        $this->new = $newRepository;
    }

    public function index(Request $request)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $news = $this->new->query($request);
            $category_news = CategoryNew::get();
            $tags = Tag::get();
            return Inertia::render('Blog/Tintuc', compact('news', 'category_news', 'tags'));
        } else {
            return $this->errors()->errors_403();
        }
    }

    public function create()
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $category_news = CategoryNew::get();
            $tags = Tag::get();

            return Inertia::render('Blog/CreateNew', compact('category_news', 'tags'));
        } else {
            return $this->errors()->errors_403();
        }
    }

    public function edit($id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $new = News::with('languages', 'tags')->findOrFail($id);
            $category_news = CategoryNew::get();
            $tags = Tag::get();

            return Inertia::render('Blog/UpdateNew', compact('category_news', 'tags', 'new'));
        } else {
            return $this->errors()->errors_403();
        }
    }
    public function store(PostNewsRequest $request)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $destinationpath = 'images/tintuc/';
            $destinationpathFull = public_path($destinationpath);
            if (!is_dir($destinationpathFull)) {
                mkdir($destinationpathFull, 0755, true);
            }
            $name = time();
            $tintuc = News::create([
                'title' => 'title' . $name,
                'slug' => 'slug' . $name,
                'content' => 'content' . $name,
                'image' => $request->hasFile('image') ? $this->image($request->file('image'), $destinationpath) : null,
                'category_id' => $request->category_id,
                'outstanding' => $request->outstanding,

            ]);
            $tags = Tag::find($request->tags);
            $tintuc->tags()->sync($tags);
            $slugEn = $this->generateUniqueNewsSlug($request->title_en, 'en');
            $slugVn = $this->generateUniqueNewsSlug($request->title_vn, 'vn');
            $this->CreateLanguage($tintuc->title, $request->title_en, $request->title_vn, $tintuc);
            $this->CreateLanguage($tintuc->content, $request->content_en, $request->content_vn, $tintuc);
            $this->CreateLanguage($tintuc->slug, $slugEn, $slugVn, $tintuc);
            return redirect('/admin/blogs/tintuc')->with('success', 'Create successfully');
        } else {
            return $this->errors()->errors_403();
        }
    }

    public function update(Request $request, $id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $tintuc = News::with('languages')->findOrFail($id);
            $language_title = Languages::where('key', $tintuc->title)->first();
            $language_sub_title = Languages::where('key', $tintuc->slug)->first();

            $this->validate(
                $request,
                [
                    'title_en' => 'required',
                    'title_vn' => 'required',
                    'content_en' => 'required_with:NoiDung',
                    'content_vn' => 'required_with:NoiDung',
                    'image' => 'nullable|mimes:png,jpg,jpeg',
                    'outstanding' => 'required',
                    'tags' => 'required',
                    'category_id' => 'required'
                ],
                [
                    'title_en.required' => __('Hãy nhập tiêu đề Tiếng Anh'),
                    'title_vn.required' => __('Hãy nhập tiêu đề  Tiếng Việt'),
                    'content_en.required' => __('Hãy nhập nội dung tin tức Tiếng Anh'),
                    'content_vn.required' => __('Hãy nhập nội dung tin tức  Tiếng Việt'),
                    'category_id.required' => __('Hãy chọn Thể loại cho tin tức'),
                    'outstanding.required' => __('Hãy chọn tin tức có nổi bật hay không?'),
                    'tags.required' => __('Hãy chọn tags cho tin tức'),
                ]
            );
            $destinationpath = 'images/tintuc/';
            $destinationpathFull = public_path($destinationpath);
            if (!is_dir($destinationpathFull)) {
                mkdir($destinationpathFull, 0755, true);
            }
            $name = time();
            $tintuc->update([
                'image' =>  $request->hasFile('image') ? $this->update_image($request->file('image'), $name, $destinationpath, $tintuc->image) : $tintuc->image,
                'category_id' => $request->category_id,
                'outstanding' => $request->outstanding,

            ]);

            $tags = Tag::find($request->tags);
            $tintuc->tags()->sync($tags);
            $tintuc->save();
            $slugEn = $this->generateUniqueNewsSlug($request->title_en, 'en', $language_sub_title ? $language_sub_title->id : null);
            $slugVn = $this->generateUniqueNewsSlug($request->title_vn, 'vn', $language_sub_title ? $language_sub_title->id : null);
            $this->updateLanguage($tintuc->title, $request->title_en, $request->title_vn, $tintuc);
            $this->updateLanguage($tintuc->slug, $slugEn, $slugVn, $tintuc);
            $this->updateLanguage($tintuc->content, $request->content_en, $request->content_vn, $tintuc);

            return redirect('/admin/blogs/tintuc')->with('success', 'Update successfully');
        } else {
            return $this->errors()->errors_403();
        }
    }
    public function delete($id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $tintuc = News::with('languages')->findOrFail($id);
            $extension = " ";
            $this->DeleteFolder($tintuc->image, $extension);
            foreach ($tintuc->languages as $language) {
                $this->deleteLanguage($language->key, 'en.json');
                $this->deleteLanguage($language->key, 'vn.json');
            }
            $tintuc->languages()->delete();
            $tintuc->delete();
            return back()->with('success', 'Delete sucussefully');
        } else {
            return $this->errors()->errors_403();
        }
    }

    public function preview(Request $request, $slug)
    {
        $language = Languages::where('languageable_type', News::class)
            ->where('key', 'like', 'slug%')
            ->where(function ($query) use ($slug) {
                $query->where('en', $slug)->orWhere('vn', $slug);
            })
            ->first();
        if ($language) {
            $tintuc = News::with('category', 'tags')->findOrFail($language->languageable->id);
            if (! News::withCompleteTranslations()->whereKey($tintuc->id)->exists()) {
                return $this->errors()->errors_404();
            }
            if ($tintuc) {
                return view('preview.index', compact( 'tintuc'));
            }
        } else {

            return $this->errors()->errors_404();
        }
    }

    private function generateUniqueNewsSlug(string $title, string $languageColumn, ?int $ignoreLanguageId = null): string
    {
        $baseSlug = Str::slug($title);
        if ($baseSlug === '') {
            $baseSlug = 'news';
        }

        $slug = $baseSlug;
        $suffix = 2;

        while ($this->newsSlugExists($slug, $languageColumn, $ignoreLanguageId)) {
            $slug = $baseSlug . '-' . $suffix;
            $suffix++;
        }

        return $slug;
    }

    private function newsSlugExists(string $slug, string $languageColumn, ?int $ignoreLanguageId = null): bool
    {
        $query = Languages::where('languageable_type', News::class)
            ->where('key', 'like', 'slug%')
            ->where($languageColumn, $slug);

        if ($ignoreLanguageId) {
            $query->where('id', '!=', $ignoreLanguageId);
        }

        return $query->exists();
    }
}
