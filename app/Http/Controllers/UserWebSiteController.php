<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserWebsiteRequest;
use App\Http\Requests\UpdateUserWebsiteRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserWebSiteController extends Controller
{
    public function create()
    {
        return view('user_website.ajax.create');
    }

    public function store(StoreUserWebsiteRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $user->website = $request->website;
        $user->save();

        return uniResponse(true, 'Your website has been updated', $user, 200);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user_website.ajax.edit', compact('user'));
    }

    public function update(UpdateUserWebsiteRequest $request, $id)
    {
        $user = User::find($id);
        $user->website = $request->website;
        $user->save();

        return uniResponse(true, 'Your website has been updated', $user, 200);
    }
}
