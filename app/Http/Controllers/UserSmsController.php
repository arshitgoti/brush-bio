<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserSmsRequest;
use App\Http\Requests\UpdateUserSmsRequest;
use App\Models\UserSms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSmsController extends Controller
{
    public function create()
    {
        return view('user_sms.ajax.create');
    }

    public function store(StoreUserSmsRequest $request)
    {
        $user_sms = new UserSms();
        $user_sms->user_id = Auth::user()->id;
        $user_sms->sms = $request->sms;
        $user_sms->save();

        return uniResponse(true, 'Your SMS number has been updated', $user_sms, 200);
    }

    public function edit($id)
    {
        $user_sms = UserSms::find($id);
        return view('user_sms.ajax.edit', compact('user_sms'));
    }

    public function update(UpdateUserSmsRequest $request, $id)
    {
        $user_sms = UserSms::find($id);
        $user_sms->user_id = Auth::user()->id;
        $user_sms->sms = $request->sms;
        $user_sms->save();

        if (!$user_sms->hasData()) {
            $user_sms->delete();
        }

        return uniResponse(true, 'Your SMS number has been updated', $user_sms, 200);
    }
}
