<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use App\Models\Page;
use App\Repositories\ContactRepository;

class ContactController extends InertiaController
{

    protected $contact;
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contact = $contactRepository;
    }

    public function index(Request $request)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $contacts = $this->contact->query($request);
            return Inertia::render('Contact', compact('contacts'));
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
                'email' => 'required|email|unique:contacts,email',
                'phone' => 'required|unique:contacts,phone|max:15',

            ]
        );
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ]);
        $header = Page::with('sections.contents.images',  'sections.theme')->where('title', 'header')->first();
        $pages = Page::get();

        return back()->with('success', 'Thank for send contact with us');
    }

    public function success()
    {
        $header = Page::with('sections.contents.images',  'sections.theme')->where('title', 'header')->first();
        $pages = Page::get();

        return view('landingpage.contact-success', compact('header', 'pages'));
    }
}
