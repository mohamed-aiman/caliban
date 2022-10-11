<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function __construct(Photo $photo)
    {
        $this->photo = $photo;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "reference" => "required|max:255",
            "image" => "required|image|max:6000"
        ]);

        if($request->hasFile('image')) {
            //get filename with extension
            $fileNameWithExtension = $request->file('image')->getClientOriginalName();
            //get filename without extension
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();
            $folder = config('filesystems.disks.s3.folder');
            //filename to store
            $fileNameToStore = $folder .'/'. $fileName.'_'.time().'.'.$extension;
            //Upload File to s3
            // $r = Storage::disk('s3')->put($fileNameToStore, fopen($request->file('image'), 'r+'), 'public');
            $isUploaded = Storage::cloud()->put($fileNameToStore, fopen($request->file('image'), 'r+'), 'public');

            if ($isUploaded) {
                $image = $this->image->create([
                    "reference" => $request->reference,
                    "key" => $fileNameToStore,
                    "url" => Storage::cloud()->url($fileNameToStore),
                    "profile_id" => $request->user()->acting_profile_id,
                ]);

                return $image;
            }
        }

        return response()->json([
            "message" => "Image upload failed"
        ], 500);
    }
}
