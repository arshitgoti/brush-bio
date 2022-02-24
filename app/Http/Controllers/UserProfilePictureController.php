<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserProfilePictureRequest;
use App\Models\User;
use App\Models\UserProfilePicture;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class UserProfilePictureController extends Controller
{
    public function create()
    {
        return view('user_profile_picture.ajax.create');
    }

    public function store(StoreUserProfilePictureRequest $request)
    {

    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user_profile_picture.ajax.edit', compact('user'));
    }

    public function update(StoreUserProfilePictureRequest $request, $id)
    {

        $user = User::find($id);

        // $file_name_original = $request->user_profile_picture->getClientOriginalName();
        // $file_name = pathinfo($file_name_original, PATHINFO_FILENAME);
        // $extension = pathinfo($file_name_original, PATHINFO_EXTENSION);
        // $file_name = Str::slug($file_name);
        // $file_name = $file_name . "." . $extension;
        // $directory = "user_profile_pics/" . Auth::user()->id;
        // Storage::makeDirectory($directory);
        // $path = Storage::putFileAs($directory, $request->user_profile_picture, $file_name);
        // if ($path) {
        //     Storage::delete([$user->profile_pic]);
        // }
        // $user->profile_pic = $path;
         $image = $request->file('profile_pic');
        $imageSize = getimagesize($image);
        $width = $imageSize[0]/2;
        $height = $imageSize[1]/2;
        $file_name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('user_profile_pics/');
        $image = Image::make($image->getRealPath());
        $image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$file_name);
        //$image->move($destinationPath, $file_name);
         $user->profile_pic = $file_name;
        $user->save();

        return uniResponse(true, 'Your profile picture has been updated', $user, 200);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        Storage::delete([$user->profile_pic]);
        $user->profile_pic = "";
        $user->save();
        return uniResponse(true, 'Your profile picture has been removed', $user, 200);
    }
}
