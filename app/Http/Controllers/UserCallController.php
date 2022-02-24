<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserCallRequest;
use App\Http\Requests\UpdateUserCallRequest;
use App\Models\UserCall;
use App\Models\UserWebSite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCallController extends Controller
{
    public function create()
    {
        return view('user_call.ajax.create');
    }

    public function store(StoreUserCallRequest $request)
    {
        $user_call = new UserCall();
        $user_call->user_id = Auth::user()->id;
        $user_call->call = $request->call;
        $user_call->save();

        return uniResponse(true, 'Your call details has been updated', $user_call, 200);
    }

    public function edit($id)
    {
        $user_call = UserCall::find($id);
        return view('user_call.ajax.edit', compact('user_call'));
    }

    public function update(UpdateUserCallRequest $request, $id)
    {
        $user_call = UserCall::find($id);
        $user_call->user_id = Auth::user()->id;
        $user_call->call = $request->call;
        $user_call->save();

        if (!$user_call->hasData()) {
            $user_call->delete();
        }


        return uniResponse(true, 'Your call details has been updated', $user_call, 200);
    }
}
