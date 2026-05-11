<?php

namespace App\Http\Controllers;

use App\Models\CategoryContent;
use App\Models\CategoryHolo360;
use App\Models\CategoryNew;
use App\Models\Content;
use App\Models\Holo360Project;
use App\Models\Languages;
use App\Models\News;
use App\Models\Page;
use App\Models\Project;
use App\Models\Section;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LandingPageController extends Controller
{
    public function index()
    {
        $page = Page::with(['sections.contents.images', 'sections.category_contents.contents.images', 'sections.theme', 'sections' => function ($q) {
            $q->where('active', 1);
        }])->first();
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $last_new  = News::with('languages', 'category', 'tags')
            ->withCompleteTranslations()
            ->orderBy('created_at', 'desc')
            ->take(2)
            ->get()
            ->values();
        $projects = Project::where('link','!=',null)->get();
        $this->filterPageSectionsIncompleteLanguages($page);

        return view('page.home', compact('page', 'pages', 'last_new','projects'));
    }

    public function immersive()
    {
        $page = Page::with(['sections.contents.images', 'sections.category_contents.contents.images', 'sections.theme', 'sections' => function ($q) {
            $q->where('active', 1);
        }])->where('title', 'immersive')->first();
        $projects = Project::where('link','!=',null)->get();
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        // Đủ dịch: dùng News::withCompleteTranslations() (title + slug + content, en & vn đều có nội dung).
        // Khác với chitiet_tintuc: query Languages theo slug chỉ để khớp URL, không thay cho kiểm tra đủ dịch.
        $news = News::with('languages', 'category', 'tags')
            ->withCompleteTranslations()
            ->whereNotNull('image')
            ->where('outstanding',  1)
            ->orderBy('created_at', 'desc')
            ->take(9)
            ->get()
            ->filter(fn (News $item) => $item->detailSlug() !== '')
            ->values();
        $this->filterPageSectionsIncompleteLanguages($page);

        return view('page.immersive', compact('page', 'pages', 'news','projects'));
    }

    public function contact()
    {
        $page = Page::with(['sections.contents.images', 'sections.category_contents.contents.images', 'sections.theme', 'sections' => function ($q) {
            $q->where('active', 1);
        }])->where('title', 'contact')->first();
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $projects = Project::where('link','!=',null)->get();
        $this->filterPageSectionsIncompleteLanguages($page);

        return view('page.contact', compact('page', 'pages','projects'));
    }


    public function chitiet_tintuc(Request $request, $slug)
    {
        $header = Page::with([
            'sections.contents.images',
            'sections.category_contents.contents.images',
            'sections.theme',
        ])->where('title', 'header')->first();
        $this->filterPageSectionsIncompleteLanguages($header);
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $number_all = News::withCompleteTranslations()->count();
        $theloais = CategoryNew::withCount([
            'news' => function ($query) {
                $query->withCompleteTranslations();
            },
        ])->get();
        $projects = Project::where('link','!=',null)->get();
        $language = Languages::where('languageable_type', News::class)
            ->where('key', 'like', 'slug%')
            ->where(function ($query) use ($slug) {
                $query->where('en', $slug)->orWhere('vn', $slug);
            })
            ->first();


        if ($language) {
            $tintuc = News::with('languages', 'category', 'tags')->findOrFail($language->languageable->id);

            if (! News::withCompleteTranslations()->whereKey($tintuc->id)->exists()) {
                return response()->view('landingpage.not-found', compact('pages', 'header', 'projects'), 404);
            }

            $previousNews = News::withCompleteTranslations()
                ->with('languages')
                ->where('created_at', '<', $tintuc->created_at)
                ->where('outstanding',  1)
                ->orderBy('created_at', 'desc')
                ->orderBy('id', 'desc')
                ->first();
            $nextNews = News::withCompleteTranslations()
                ->with('languages')
                ->where('created_at', '>', $tintuc->created_at)
                ->where('outstanding',  1)
                ->orderBy('created_at', 'asc')
                ->orderBy('id', 'asc')
                ->first();

            $tintuc_lienquan = News::with('languages', 'category', 'tags')
                ->withCompleteTranslations()
                ->where('id', '!=', $tintuc->id)
                ->where('outstanding',  1)
                ->when($tintuc->category_id, function ($q) use ($tintuc) {
                    $q->where('category_id', $tintuc->category_id);
                })
                ->take(3)
                ->get();

            return view('page.new_detail', compact('pages', 'tintuc', 'tintuc_lienquan', 'number_all', 'theloais', 'header', 'projects', 'previousNews', 'nextNews'));
        }

        return response()->view('landingpage.not-found', compact('pages', 'header', 'projects'), 404);
    }


    public function project()
    {
        $projects = Project::where('link','!=',null)->get();
        $header = Page::with('sections.contents.images',  'sections.theme')->where('title', 'header')->first();
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        return view('page.project', compact('pages', 'header','projects'));
    }
    public function holo360(Request $request){
        // dd($request->category);
        $header = Page::with('sections.contents.images',  'sections.theme')->where('title', 'header')->first();
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $categories = CategoryHolo360::with('holo_projects')->orderBy('id_priority','asc')->get();
        $projects = Project::where('link','!=',null)->get();
        $category_current = CategoryHolo360::where('slug',$request->category)->first();
        if($category_current == null){
            // $projects= Holo360Project::get();
            // return $projects;
            $projects360= Holo360Project::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->paginate(9);


        }else{
            $projects360 = $category_current->holo_projects()->paginate(9)->appends(['category' => $request->category]);
        }

        //

        return view('page.project360', compact('pages', 'header','categories', 'projects360','projects','category_current'));
    }
    public function holo360_filter(Request $request){


    }

    /**
     * Ẩn section / content / category nội dung chưa đủ cặp EN+VN (theo scope model).
     */
    private function filterPageSectionsIncompleteLanguages(?Page $page): void
    {
        if (! $page || ! $page->relationLoaded('sections')) {
            return;
        }

        $sections = $page->sections->filter(function (Section $section) {
            return Section::withCompleteTranslations()->whereKey($section->id)->exists();
        })->values();

        foreach ($sections as $section) {
            if ($section->relationLoaded('contents') && $section->contents->isNotEmpty()) {
                $keepContentIds = Content::withCompleteTranslations()
                    ->whereIn('id', $section->contents->pluck('id'))
                    ->pluck('id');
                $section->setRelation('contents', $section->contents->whereIn('id', $keepContentIds)->values());
            }

            if ($section->relationLoaded('category_contents') && $section->category_contents->isNotEmpty()) {
                $keepCategoryIds = CategoryContent::withCompleteTranslations()
                    ->whereIn('id', $section->category_contents->pluck('id'))
                    ->pluck('id');
                $categories = $section->category_contents->whereIn('id', $keepCategoryIds)->values();
                foreach ($categories as $category) {
                    if ($category->relationLoaded('contents') && $category->contents->isNotEmpty()) {
                        $keepNestedIds = Content::withCompleteTranslations()
                            ->whereIn('id', $category->contents->pluck('id'))
                            ->pluck('id');
                        $category->setRelation('contents', $category->contents->whereIn('id', $keepNestedIds)->values());
                    }
                }
                $section->setRelation('category_contents', $categories);
            }
        }

        $page->setRelation('sections', $sections);
    }
}
