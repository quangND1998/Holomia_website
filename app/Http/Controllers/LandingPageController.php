<?php

namespace App\Http\Controllers;

use App\Models\CategoryHolo360;
use App\Models\CategoryNew;
use App\Models\Holo360Project;
use App\Models\Languages;
use App\Models\News;
use App\Models\Page;
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
        $last_new  = News::with('languages', 'category', 'tags')->orderBy('created_at', 'desc')->take(2)->get();
        return view('page.home', compact('page', 'pages', 'last_new'));
    }

    public function immersive()
    {
        $page = Page::with(['sections.contents.images', 'sections.category_contents.contents.images', 'sections.theme', 'sections' => function ($q) {
            $q->where('active', 1);
        }])->where('title', 'immersive')->first();
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $news = News::with('languages', 'category', 'tags')->orderBy('created_at', 'desc')->take(9)->get();
        return view('page.immersive', compact('page', 'pages', 'news'));
    }

    public function contact()
    {
        $page = Page::with(['sections.contents.images', 'sections.category_contents.contents.images', 'sections.theme', 'sections' => function ($q) {
            $q->where('active', 1);
        }])->where('title', 'contact')->first();
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        return view('page.contact', compact('page', 'pages'));
    }


    public function chitiet_tintuc(Request $request, $slug)
    {
        $header = Page::with('sections.contents.images',  'sections.theme')->where('title', 'header')->first();
        $pages = Page::get();
        $number_all = News::count();
        $theloais = CategoryNew::withCount('news')->get();

        $language = Languages::where('en', $slug)->orWhere('vn', $slug)->first();
        if ($language) {
            $tintuc = News::with('category', 'tags')->findOrFail($language->languageable->id);

            $tintuc_lienquan =  News::with('category', 'tags')->where('category_id', $tintuc->category->id)->where('title', '!=', $tintuc->title)->take(3)->get();
            if ($tintuc) {
                return view('page.new_detail', compact('pages', 'tintuc', 'tintuc_lienquan', 'number_all', 'theloais', 'header'));
            }
        } else {
            return view('landingpage.not-found', compact('pages', 'header'));
        }
    }


    public function project()
    {
        $header = Page::with('sections.contents.images',  'sections.theme')->where('title', 'header')->first();
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        return view('page.project', compact('pages', 'header'));
    }
    public function holo360(Request $request){
        // dd($request->category);
        $header = Page::with('sections.contents.images',  'sections.theme')->where('title', 'header')->first();
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $categories = CategoryHolo360::with('holo_projects')->orderBy('id_priority','asc')->get();
        $category_current = CategoryHolo360::where('slug',$request->category)->first();
        if($category_current == null){
            $projects= Holo360Project::orderBy('id_priority','asc')->paginate(9);
        }else{
            $projects = $category_current->holo_projects()->paginate(9)->appends(['category' => $request->category]);
        }
        
        // 

        return view('page.project360', compact('pages', 'header','categories', 'projects','category_current'));
    }
    public function holo360_filter(Request $request){
       

    }
}
