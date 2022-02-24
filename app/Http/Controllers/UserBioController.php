<?php

namespace App\Http\Controllers;

use App\Models\UserBio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBioController extends Controller
{
    public function create()
    {
        return view('user_bio.ajax.create');
    }

    public function store(Request $request)
    {
        $user_bio = new UserBio();
        $user_bio->user_id = Auth::user()->id;
        $user_bio->bio_content = $request->bio_content;
        $user_bio->save();

        return uniResponse(true, 'Your bio has been updated', $user_bio, 200);
    }

    public function edit($id)
    {
        $user_bio = UserBio::find($id);
        return view('user_bio.ajax.edit', compact('user_bio'));
    }

    public function update(Request $request, $id)
    {
        $delete = true;
        $user_bio = UserBio::find($id);
        if (
            $request->filled('bio_content')
        ) {
            $delete = false;
        }

        if ($delete) {
            $user_bio->delete();
            return uniResponse(true, 'Your bio has been updated', $user_bio, 200);
        }

        $user_bio->user_id = Auth::user()->id;
        $user_bio->bio_content = $request->bio_content;
        $user_bio->save();

        return uniResponse(true, 'Your bio has been updated', $user_bio, 200);
    }
}
