<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Models\Images;
use Illuminate\Http\Response;

class ImageController extends InertiaController
{
    use FileUploadTrait;
    public function store(Request $request, $id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $content = Content::findOrFail($id);

            $this->validate(
                $request,
                [
                    'images.*' => 'required|mimes:png,jpg,jpeg',
                ]
            );
            $destinationpath = 'images/contents/';
            if (!file_exists($destinationpath)) {
                mkdir($destinationpath, 0777, true);
            }
            if ($request->hasFile('images')) {
                $files = $request->images;

                foreach ($files as $file) {
                    Images::create([
                        'name' => $file->getClientOriginalName(),
                        'image' => $this->image($file, $destinationpath),
                        'content_id' => $content->id
                    ]);
                }
            }
            return back()->with('success', 'Create successfully');
        } else {
            $erros = 403;
            return Inertia::render('Erros', ['status' => $erros]);
        }
    }

    public function list_image(Request $request, $id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $content = Content::findOrFail($id);

            $section = $content->contentable;

            $page = $section->page;
            $theme = $section->theme;
            if ($content == null) {
                return $this->errors()->errors_404();
            }
            $list_image = Images::where('content_id', $id)->orderBy('id_priority', 'asc')->orderBy('id', 'asc')->get();
            return Inertia::render('Image/ListImage', compact('content', 'list_image', 'section', 'page'));
        } else {
            $erros = 403;
            return Inertia::render('Erros', ['status' => $erros]);
        }
    }


    public function update(Request $request, $id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $image = Images::findOrFail($id);

            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'images' => 'nullable|mimes:png,jpg,jpeg',
                ]
            );
            $name = time();
            $destinationpath = 'images/contents/';
            if (!file_exists($destinationpath)) {
                mkdir($destinationpath, 0777, true);
            }
            $image->update([
                'name' => $request->name,
                'image' =>  $request->hasFile('images') ? $this->update_image($request->file('images'), $name, $destinationpath, $image->image) : $image->image,
            ]);

            return back()->with('success', 'Update successfully');
        } else {
            $erros = 403;
            return Inertia::render('Erros', ['status' => $erros]);
        }
    }

    public function delete($id)
    {
        if (Gate::allows(config('constants.USER_PERMISSION')) || Gate::allows(config('constants.CREATE_VIRTUAL'))) {
            $image = Images::findOrFail($id);
            $extension = " ";
            $this->DeleteFolder($image->image, $extension);
            $image->delete();
            return redirect()->back()->with('success', 'Delete  successfully');
        } else {
            $erros = 403;
            return Inertia::render('Erros', ['status' => $erros]);
        }
    }


    public function priorityImage(Request $request)
    {
        if (Gate::allows(config('constants.USER_PERMISSION'))) {
            $data = $request->data;
            for ($i = 0; $i < count($data); $i++) {
                Images::findOrFail($data[$i]['id'])->update(['id_priority' => $i]);
            }
            return redirect()->back()->with('success', 'Sort  successfully');
        } else {
            $erros = 403;
            return Inertia::render('Erros', ['status' => $erros]);
        }
    }

    public function selectElement(Request $request)
    {

        if (Gate::allows(config('constants.USER_PERMISSION'))) {

            Images::find($request->id)->update(['element' => $request->element]);
            return response()->json('Change successfully', Response::HTTP_OK);
        } else {
            $erros = 403;
            return Inertia::render('Erros', ['status' => $erros]);
        }
    }

    public function selectEmbed(Request $request)
    {

        if (Gate::allows(config('constants.USER_PERMISSION'))) {

            Images::find($request->id)->update(['embed' => $request->embed]);
            return response()->json('Change successfully', Response::HTTP_OK);
        } else {
            $erros = 403;
            return Inertia::render('Erros', ['status' => $erros]);
        }
    }
}
