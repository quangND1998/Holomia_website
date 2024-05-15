<?php

namespace App\Http\Controllers;

use App\Models\Advise;
use App\Repositories\AdviseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use App\Models\Page;

class AdviseController extends Controller
{
    protected $advise;
    public function __construct(AdviseRepository $adviseRepository)
    {
        $this->advise = $adviseRepository;
    }

    public function index(Request $request)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $advises = $this->advise->query($request);
            // dd($advises);
            return Inertia::render('Advise', compact('advises'));
        } else {
           return $this->errors()->errors_403();
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'old' => 'required',
                'phone' => 'required',

            ]
        );
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Advise::create([
            'name' => $request->name,
            'old' => $request->old,
            'phone' => $request->phone,
            'message' => $request->message
        ]);

        // dd($data);
        $header = Page::with('sections.contents.images',  'sections.theme')->where('title', 'header')->first();
        $pages = Page::get();

        return redirect('/thanks_register')->with('success', 'Thank for send contact with us');
        // return back()->with('success', 'Thank for send contact with us');
    }

    public function success()
    {
        $header = Page::with('sections.contents.images',  'sections.theme')->where('title', 'header')->first();
        $pages = Page::get();

        return view('landingpage.contact-success', compact('header', 'pages'));
    }
}
