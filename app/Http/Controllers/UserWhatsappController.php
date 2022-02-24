<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserWhatsappRequest;
use App\Http\Requests\UpdateUserWhatsappRequest;
use App\Models\UserWhatsapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserWhatsappController extends Controller
{
    public function create()
    {
        return view('user_whatsapp.ajax.create');
    }

    public function store(StoreUserWhatsappRequest $request)
    {
        $user_whatsapp = new UserWhatsapp();
        $user_whatsapp->user_id = Auth::user()->id;
        $user_whatsapp->whatsapp = $request->whatsapp;
        $user_whatsapp->save();

        return uniResponse(true, 'Your whatsapp number has been updated', $user_whatsapp, 200);
    }

    public function edit($id)
    {
        $user_whatsapp = UserWhatsapp::find($id);
        return view('user_whatsapp.ajax.edit', compact('user_whatsapp'));
    }

    public function update(UpdateUserWhatsappRequest $request, $id)
    {
        $user_whatsapp = UserWhatsapp::find($id);
        $user_whatsapp->user_id = Auth::user()->id;
        $user_whatsapp->whatsapp = $request->whatsapp;
        $user_whatsapp->save();

        if (!$user_whatsapp->hasData()) {
            $user_whatsapp->delete();
        }


        return uniResponse(true, 'Your whatsapp number has been updated', $user_whatsapp, 200);
    }
}
