<?php

namespace App\Http\Controllers;

use App\Models\CategoryCourese;
use App\Models\CategoryHolo360;
use App\Models\CategoryNew;
use App\Models\Course;
use App\Models\Holo360Project;
use App\Models\Languages;
use App\Models\News;
use App\Models\Page;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Persons;
use Inertia\Inertia;
class LandingPageController extends Controller
{
    public function index()
    {
        $page = Page::with(['sections.contents.images', 'sections.category_contents.contents.images', 'sections.theme', 'sections' => function ($q) {
            $q->where('active', 1);
        }])->first();
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $last_new  = News::with('languages', 'category', 'tags')->orderBy('created_at', 'desc')->take(2)->get();
        $courses = Course::all();
        $teachers = Persons::where('type','teacher')->take(10)->get();
        $students = Persons::where('type','student')->take(6)->get();
        $category_courses = CategoryCourese::all();
        return view('page.home', compact('page', 'pages', 'category_courses' ,'last_new','courses','teachers','students','category_courses'));
    }

    public function immersive()
    {
        $page = Page::with(['sections.contents.images', 'sections.category_contents.contents.images', 'sections.theme', 'sections' => function ($q) {
            $q->where('active', 1);
        }])->where('title', 'immersive')->first();
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $news = News::with('languages', 'category', 'tags')->orderBy('created_at', 'desc')->take(9)->get();
        $category_courses = CategoryCourese::all();
        return view('page.immersive', compact('page','category_courses' , 'pages', 'news'));
    }

    public function contact()
    {
        $page = Page::with(['sections.contents.images', 'sections.category_contents.contents.images', 'sections.theme', 'sections' => function ($q) {
            $q->where('active', 1);
        }])->where('title', 'contact')->first();
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $category_courses = CategoryCourese::all();
        return view('page.contact', compact('page','category_courses' , 'pages'));
    }

    public function news(){
        $page = Page::with(['sections.contents.images','sections.category_contents.contents.images', 'sections.theme', 'sections' => function ($q) {
            $q->where('active', 1);
        }])->where('title', 'news')->first();

        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $category_courses = CategoryCourese::all();
        $news_feature = News::whereHas('category', function ($q){
            $q->where('name','tin tuc');
        })->where('outstanding',1)->orderBy('created_at','desc')->paginate(3);


        $news= News::whereHas('category', function ($q){
            $q->where('name','tin tuc');
        })->orderBy('created_at','desc')->paginate(10);

        return view('page.default', compact('page', 'pages','news_feature','news','category_courses'));
    }

    public function chitiet_tintuc(Request $request, $slug)
    {
        $header = Page::with('sections.contents.images',  'sections.theme')->where('title', 'header')->first();
        $pages = Page::get();
        $number_all = News::count();
        $theloais = CategoryNew::withCount('news')->get();
        $category_courses = CategoryCourese::all();

        $news_feature = News::whereHas('category', function ($q){
            $q->where('name','tin tuc');
        })->where('outstanding',1)->orderBy('created_at','desc')->paginate(3);



        $language = Languages::where('en', $slug)->orWhere('vn', $slug)->first();
        if ($language) {
            $tintuc = News::with('category', 'tags')->findOrFail($language->languageable->id);
            $tintuc_lienquan =  News::with('category', 'tags')->where('category_id', $tintuc->category->id)->where('title', '!=', $tintuc->title)->take(3)->get();
            if ($tintuc) {
                return view('page.new_detail', compact('pages', 'category_courses' ,'tintuc', 'tintuc_lienquan', 'news_feature','number_all', 'theloais', 'header'));
            }
        } else {
            return view('landingpage.not-found', compact('pages', 'header'));
        }
    }


    public function project()
    {
        $header = Page::with('sections.contents.images',  'sections.theme')->where('title', 'header')->first();
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $category_courses = CategoryCourese::all();
        return view('page.project', compact('pages', 'header','category_courses' ));
    }
    public function holo360(Request $request){
        // dd($request->category);
        $header = Page::with('sections.contents.images',  'sections.theme')->where('title', 'header')->first();
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $categories = CategoryHolo360::with('holo_projects')->orderBy('id_priority','asc')->get();

        $category_current = CategoryHolo360::where('slug',$request->category)->first();
        $category_courses = CategoryCourese::all();
        if($category_current == null){
            // $projects= Holo360Project::get();
            // return $projects;
            $projects= Holo360Project::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->paginate(9);


        }else{
            $projects = $category_current->holo_projects()->paginate(9)->appends(['category' => $request->category]);
        }

        //

        return view('page.project360', compact('pages','category_courses' , 'header','categories', 'projects','category_current'));
    }
    public function holo360_filter(Request $request){

    }
    public function homepage(){
        $persons = Persons::with('languages')->paginate(10);
        $category_courses = CategoryCourese::all();
        return Inertia::render('Home', compact('persons','category_courses' ));
    }
    public function about_cammbridge()
    {
        $page = Page::with(['sections.contents.images', 'sections.category_contents.contents.images', 'sections.theme', 'sections' => function ($q) {
            $q->where('active', 1);
        }])->where('title', 'about_cammbridge')->first();
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $courses = Course::all();
        $category_courses = CategoryCourese::all();

        return view('page.about_cammbridge', compact('page','category_courses' , 'pages','courses'));
    }
    public function teacher_cammbridge(){
        $page = Page::with(['sections.contents.images', 'sections.category_contents.contents.images', 'sections.theme', 'sections' => function ($q) {
            $q->where('active', 1);
        }])->where('title', 'teacher_cammbridge')->first();
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $courses = Course::all();
        $teachers = Persons::where('type','teacher')->paginate(8);
        $category_courses = CategoryCourese::all();
        return view('page.teacher_cammbridge', compact('page','category_courses' , 'pages','courses','teachers'));
    }
    public function student_cammbridge(){
        $page = Page::with(['sections.contents.images', 'sections.category_contents.contents.images', 'sections.theme', 'sections' => function ($q) {
            $q->where('active', 1);
        }])->where('title', 'student')->first();
        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $courses = Course::all();
        $students = Persons::where('type','student')->paginate(8);
        $category_courses = CategoryCourese::all();
        return view('page.student_cammbridge', compact('page', 'category_courses' ,'pages','courses','students'));
    }
    public function activity()
    {
        $page = Page::with(['sections.contents.images','sections.category_contents.contents.images', 'sections.theme', 'sections' => function ($q) {
            $q->where('active', 1);
        }])->where('title', 'activity')->first();

        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $category_courses = CategoryCourese::all();
        $activity = News::whereHas('category', function ($q){
            $q->where('name','activity');
        })->paginate(8);
        return view('page.student_cammbridge', compact('page', 'pages','activity','category_courses'));
    }
    public function activity_detail(Request $request,$slug){
        $header = Page::with('sections.contents.images',  'sections.theme')->where('title', 'header')->first();
        $pages = Page::get();
        $number_all = News::count();
        $theloais = CategoryNew::withCount('news')->get();
        $category_courses = CategoryCourese::all();

        $language = Languages::where('en', $slug)->orWhere('vn', $slug)->first();
        if ($language) {
            $tintuc = News::with('category', 'tags')->findOrFail($language->languageable->id);

            $tintuc_lienquan =  News::with('category', 'tags')->where('category_id', $tintuc->category->id)->where('title', '!=', $tintuc->title)->take(3)->get();
            if ($tintuc) {
                return view('page.activity_detail', compact('pages', 'category_courses' ,'tintuc', 'tintuc_lienquan', 'number_all', 'theloais', 'header'));
            }
        } else {
            return view('landingpage.not-found', compact('pages', 'header'));
        }
    }
    public function course(Request $request)
    {
        $page = Page::with(['sections.contents.images','sections.category_contents.contents.images', 'sections.theme', 'sections' => function ($q) {
            $q->where('active', 1);
        }])->where('title', 'course')->first();

        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $category_courses = CategoryCourese::all();
        if($request->category_name == 'all' || $request->category_name == null ){
            $courses = Course::with('category')->paginate(8);
        }else{
            $courses = Course::whereHas('category', function ($q) use($request){
                $q->where('slug',$request->category_name);
            })->paginate(8);
        }

        return view('page.default', compact('page', 'pages','courses','category_courses'));
    }
    public function course_detail(Request $request,$name)
    {
        $page = Page::with(['sections.contents.images','sections.category_contents.contents.images', 'sections.theme', 'sections' => function ($q) {
            $q->where('active', 1);
        }])->where('title', 'course')->first();

        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $category_courses = CategoryCourese::all();
        $language = Languages::where('en', $name)->orWhere('vn', $name)->first();
        if ($language && $language->languageable != null) {
            $course = Course::with('category')->findOrFail($language->languageable->id);

            $course_lienquan =  Course::with('category')->where('title', '!=', $course->title)->take(3)->get();
            if ($course) {
                return view('page.course_detail', compact('pages', 'category_courses' ,'course', 'course_lienquan'));
            }
        } else {
            return view('landingpage.not-found', compact('pages'));
        }
    }

    public function study_abroad(){
        $page = Page::with(['sections.contents.images','sections.category_contents.contents.images', 'sections.theme', 'sections' => function ($q) {
            $q->where('active', 1);
        }])->where('title', 'page_tuyensinhduhoc')->first();

        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $category_courses = CategoryCourese::all();
        $news_feature = News::whereHas('category', function ($q){
            $q->where('slug', 'du-hoc');
        })->where('outstanding',1)->orderBy('created_at','desc')->paginate(3);


        $activity = News::whereHas('category', function ($q){
            $q->where('slug', 'du-hoc');
        })->orderBy('created_at','desc')->paginate(10);

        // dd($activity);

        return view('page.default', compact('page', 'pages','news_feature','activity','category_courses'));
    }

    public function study_abroad_detail(Request $request, $slug)
    {
        $header = Page::with('sections.contents.images',  'sections.theme')->where('title', 'header')->first();
        $pages = Page::get();
        $number_all = News::count();
        $theloais = CategoryNew::withCount('news')->get();
        $category_courses = CategoryCourese::all();

        $news_feature = News::whereHas('category', function ($q){
            $q->where('slug', 'du-hoc');
        })->where('outstanding',1)->orderBy('created_at','desc')->paginate(3);



        $language = Languages::where('en', $slug)->orWhere('vn', $slug)->first();
        if ($language) {
            $tintuc = News::with('category', 'tags')->findOrFail($language->languageable->id);
            $tintuc_lienquan =  News::with('category', 'tags')->where('category_id', $tintuc->category->id)->where('title', '!=', $tintuc->title)->take(3)->get();
            if ($tintuc) {
                return view('page.new_detail', compact('pages', 'category_courses' ,'tintuc', 'tintuc_lienquan', 'news_feature','number_all', 'theloais', 'header'));
            }
        } else {
            return view('landingpage.not-found', compact('pages', 'header'));
        }
    }
    //
    public function course_search(Request $request){

        $keyword = $request->value;
        $page = Page::with(['sections.contents.images','sections.category_contents.contents.images', 'sections.theme', 'sections' => function ($q) {
            $q->where('active', 1);
        }])->where('title', 'course')->first();

        $pages = Page::orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
        $category_courses = CategoryCourese::all();
        $courses = Course::with('languages')->whereHas('languages', function ($q) use ($keyword){
            $q->where('en', 'LIKE', '%' . $keyword . '%')->orWhere('vn', 'LIKE', '%' . $keyword . '%');
        })->paginate(20);

        // dd($courses);


        return view('page.default', compact('page', 'pages','courses','category_courses','keyword'));
    }
    public function thanks_register(){
        $category_courses = CategoryCourese::all();
        return view('landingpage.thanks', compact('category_courses'));
    }
}
