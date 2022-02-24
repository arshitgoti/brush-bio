<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserEmailRequest;
use App\Models\UserEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserEmailController extends Controller
{
    public function create()
    {
        return view('user_email.ajax.create');
    }

    public function store(StoreUserEmailRequest $request)
    {
        $user_email = new UserEmail();
        $user_email->user_id = Auth::user()->id;
        $user_email->email = $request->email;
        $user_email->save();

        return uniResponse(true, 'Your e-mail has been updated', $user_email, 200);
    }

    public function edit($id)
    {
        $user_email = UserEmail::find($id);
        return view('user_email.ajax.edit', compact('user_email'));
    }

    public function update(StoreUserEmailRequest $request, $id)
    {
        $user_email = UserEmail::find($id);
        $user_email->user_id = Auth::user()->id;
        $user_email->email = $request->email;
        $user_email->save();

        if (!$user_email->hasData()) {
            $user_email->delete();
        }

        return uniResponse(true, 'Your email details has been updated', $user_email, 200);
    }
}
