<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Auth;

class PhotoController extends Controller
{
    public function __construct(Photo $photo)
    {
        $this->photo = $photo;
    }

    /**
     * this method is not used
     */
    protected function store(Request $request)
    {
        Auth::loginUsingId(1);
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //get filename with extension
        // $fileNameWithExtension = $request->file('image')->getClientOriginalName();
        //get filename without extension
        // $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
        //get file extension
        $extension = $request->file('image')->getClientOriginalExtension();
        $folder = config('filesystems.disks.s3.folder');
        //filename to store
        // $generatedFileName = $fileName.'_'.time().'.'.$extension;
        $generatedFileName = $request->user()->id.random_int(10000, 99999).'_'.time().'.'.$extension;
        $fileNameToStore = $folder .'/'. $generatedFileName;
        //Upload File to s3
        // $r = Storage::disk('s3')->put($fileNameToStore, fopen($request->file('image'), 'r+'), 'public');
        $isUploaded = Storage::cloud()->put($fileNameToStore, fopen($request->file('image'), 'r+'), 'public');


        if ($isUploaded) {
            $image = $this->photo->create([
                'file_name' => $generatedFileName,
                'url' => Storage::cloud()->url($fileNameToStore),
                'user_id' => $request->user()->id,
                // 'large_url' => null,
                // 'medium_url' => null,
                // 'thumbnail_url' => null,
            ]);

            $image = $this->createSizes($request, $image);

            return $image;
        }

        return null;
    }

    protected function createSizes(Request $request, Photo $image)
    {
        $sizes = [
            'thumbnail' => '250x150',
            'medium' => '600x360',
            // 'large_url' => null,
        ];

        foreach ($sizes as $key => $size) {
            $wh = explode('x', $size);
            $resized = Image::make($request->file('image'))->fit($wh[0], $wh[1]);
            $folder = config('filesystems.disks.s3.folder');
            $croppedImageS3Path = $fileNameToStore = $folder .'/' . $key. '/'. $image->file_name;
            $isUploaded = Storage::cloud()->put($croppedImageS3Path, $resized->stream('jpg', 60), 'public');

            if ($isUploaded) {
                $column = $key . '_url';
                $image->{$column} = Storage::cloud()->url($croppedImageS3Path);
                $image->save();
            }
        }


        return $image->fresh();
    }


}
