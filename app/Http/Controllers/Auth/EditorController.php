<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    public function Editor(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads'), $filename);

            $url = asset('uploads/' . $filename);
            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }

        return response()->json([
            'uploaded' => false,
            'error' => [
                'message' => 'Failed to upload the image.'
            ]
        ]);
    }
}
