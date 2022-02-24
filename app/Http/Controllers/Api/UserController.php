<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function addNewSlug(Request $request)
    {
        $slug = Str::slug($request->slug);
        $user = User::where('slug', $slug)->first();

        if ($user) {
            return uniResponse('error', __('message.user_with_slug_exists'), null, 500);
        }

        if ($request->slug == "") {
            return uniResponse('error', __('message.invalid_slug'), null, 500);
        }
        $user = new User();
        $user->first_name = '';
        $user->last_name = '';
        $user->last_name = '';
        $user->email = $slug."@digivcardnewuser.com";
        $user->password = "";
        $user->slug = $slug;
        $user->cv = '';
        $user->phone_number = '';
        $user->website = '';
        $user->instagram = '';
        $user->type_of_artist = '';
        $user->address_work = '';
        $user->country = '';
        $user->save();

        return uniResponse('success', __('message.user_slug_updated'), $user, 200);
    }
}
