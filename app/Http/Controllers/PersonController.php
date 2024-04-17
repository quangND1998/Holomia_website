<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\LanguageTrait;
use App\Models\Persons;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;
class PersonController extends Controller
{
    use FileUploadTrait,LanguageTrait;
    public function index()
    {
        $persons = Persons::with('languages')->paginate(10);
        // return $persons;
        return Inertia::render('Person', compact('persons'));
    }
    public function save(Request $request)
    {
            $destinationpath = 'images/persons/';
            if (!file_exists($destinationpath)) {
                mkdir($destinationpath, 777, true);
            }
            $name = time();
            $person = Persons::create([
                'name' => $request->name,
                'description' => 'description' . $name,
                'type' => $request->type,
                'image' => $request->hasFile('image') ? $this->image($request->file('image'), $destinationpath) : null,

            ]);
            $this->CreateLanguage($person->description, $request->description_en, $request->description_vn, $person);

            $person->save();

        return back()->with('success', 'Create successfully');
    }
    public function update(Request $request,$id)
    {
        $person = Persons::findOrFail($id);
        if($person){
            $destinationpath = 'images/persons/';
            if (!file_exists($destinationpath)) {
                mkdir($destinationpath, 777, true);
            }
            $name = time();
            $person->update([
                'name' => $request->name,
                'type' => $request->type,
                'image' =>  $request->hasFile('image') ? $this->update_image($request->file('image'), $name, $destinationpath, $person->image) : $person->image,

            ]);
            $this->updateLanguage($person->description, $request->description_en, $request->description_vn, $person);
            $person->save();
        }
        return back()->with('success', 'Create successfully');
    }
    public function delete($id){
        $person = Persons::findOrFail($id);
        $imagePath = public_path($person->image);

        // Check if the image file exists
        if (File::exists($imagePath)) {
            // Delete the image file
            File::delete($imagePath);
            return "Image deleted successfully.";
        }
        $person->delete();
        return back()->with('success', 'Delete successfully');
    }
}
