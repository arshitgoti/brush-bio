<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserCVRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use File;

class UserCVController extends Controller
{
    public function create()
    {
        return view('user_cv.ajax.create');
    }

    public function store(StoreUserCVRequest $request)
    {
        $user = User::find(Auth::user()->id);
        // $file_name_original = $request->cv->getClientOriginalName();
        // $file_name = pathinfo($file_name_original, PATHINFO_FILENAME);
        // $extension = pathinfo($file_name_original, PATHINFO_EXTENSION);
        // $file_name = Str::slug($file_name);
        // $file_name = $file_name . "." . $extension;
        // $directory = "user_cvs/" .  $user->id;
        // Storage::makeDirectory($directory);
        // $path = Storage::putFileAs($directory, $request->cv, $file_name);
        // if ($path) {
        //     Storage::delete([$user->cv]);
        // }
        // $user->cv = $path;
          if($request->hasFile('cv')){
        $image = $request->file('cv');
        $file_name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('user_cvs/');
        $image->move($destinationPath, $file_name);
         $user->cv = $file_name;
        }
        $user->save();

        return uniResponse(true, 'Your CV has been updated', $user, 200);
    }

    public function edit()
    {
        $user = User::find(Auth::user()->id);
        return view('user_cv.ajax.edit', compact('user'));
    }

    public function update(StoreUserCVRequest $request)
    {
        // $user = User::find(Auth::user()->id);
        // $file_name_original = $request->cv->getClientOriginalName();
        // $file_name = pathinfo($file_name_original, PATHINFO_FILENAME);
        // $extension = pathinfo($file_name_original, PATHINFO_EXTENSION);
        // $file_name = Str::slug($file_name);
        // $file_name = $file_name . "." . $extension;
        // $directory = "user_cvs/" .  $user->id;
        // Storage::makeDirectory($directory);
        // $path = Storage::putFileAs($directory, $request->cv, $file_name);
        // if ($path) {
        //     Storage::delete([$user->cv]);
        // }
        // $user->cv = $path;
        $user = User::find(Auth::user()->id);
        $cv_path= public_path('user_cvs/').$user->cv;

        if (File::exists($cv_path)) {
            File::delete($cv_path);
        }
         if($request->hasFile('cv')){
        $image = $request->file('cv');
        $file_name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('user_cvs/');
        $image->move($destinationPath, $file_name);
         $user->cv = $file_name;
        }
        $user->save();

        return uniResponse(true, 'Your CV has been updated', $user, 200);
    }
    public function delete()
    {
        $user = User::find(Auth::user()->id);
        $cv_path= public_path('user_cvs/').$user->cv;

        if (File::exists($cv_path)) {
            File::delete($cv_path);
        }
        $user->cv=null;
        $user->save();
    }
}
