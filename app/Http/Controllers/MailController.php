<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailDefault;
use App\Models\Mail;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use App\Models\Contact;
use Carbon\Carbon;

class MailController extends InertiaController
{
    public function index(Request $request)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $mails = Mail::paginate(10);
            $contacts = Contact::get();
            return Inertia::render('Mail/Mail', compact('mails', 'contacts'));
        } else {
            $erros = 403;
            return Inertia::render('Erros', ['status' => $erros]);
        }
    }

    public function store(Request $request)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {

            $this->validate(
                $request,
                [
                    'title' => 'required',
                    'content' => 'required',

                ]
            );
            Mail::create([
                'title' => $request->title,
                'content' => $request->content
            ]);
            return back()->with('success', 'Create successfully');
        } else {
            $erros = 403;
            return Inertia::render('Erros', ['status' => $erros]);
        }
    }
    public function update(Request $request, $id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $mail = Mail::findOrFail($id);
            $this->validate(
                $request,
                [
                    'title' => 'required',
                    'content' => 'required',

                ]
            );
            $mail->update([
                'title' => $request->title,
                'content' => $request->content
            ]);
            return back()->with('success', 'Update successfully');
        } else {
            $erros = 403;
            return Inertia::render('Erros', ['status' => $erros]);
        }
    }
    public function delete($id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $mail = Mail::findOrFail($id);
            $mail->delete();
            return back()->with('success', 'Delete successfully');
        } else {
            return $this->errors()->errors_403();
        }
    }
    public function sendMail(Request $request, $id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $this->validate(
                $request,
                [
                    'contacts' => 'required',

                ]
            );
            $mail = Mail::find($id);
            $contacts = Contact::find($request->contacts);
            $job = (new SendMailDefault($contacts, $mail))->delay(Carbon::now()->addSecond(2));
            dispatch($job);
            return back()->with('success', "Send mail successfully");
        } else {
            return $this->errors()->errors_403();
        }
    }
    public function previewMail($id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $mail = Mail::findOrFail($id);


            return view('preview-mail.preview_default', compact('mail'));
        } else {
          return $this->errors()->errors_403();
        }
    }
}
