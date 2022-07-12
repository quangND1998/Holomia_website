<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $page = Page::with('sections.contents.images', 'sections.category_contents.contents.images', 'sections.theme')->first();

        return view('page.home', compact('page'));
    }

    public function immersive()
    {
        $page = Page::with('sections.contents.images', 'sections.category_contents.contents.images', 'sections.theme')->where('title', 'immersive')->first();
        return view('page.immersive', compact('page'));
    }
}
