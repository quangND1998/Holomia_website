<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EditorController extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => ['required', 'image', 'max:5120'],
        ]);

        $file = $request->file('file');
        $folder = public_path('uploads/editor');

        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        $filename = time() . '-' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        $extension = $file->getClientOriginalExtension();
        $fullName = $filename . '.' . $extension;

        $file->move($folder, $fullName);

        return response()->json([
            'location' => asset('uploads/editor/' . $fullName),
        ]);
    }
}
