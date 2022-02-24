<?php

namespace App\Http\Controllers;

use App\Models\UserGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserGalleryController extends Controller
{
    public function index(Request $request)
    {
        $user_galleries = UserGallery::where('user_id', Auth::user()->id)->orderBy('position_id','ASC')->get();

        if ($request->ajax()) {
            return view('user_gallery.ajax.index', compact('user_galleries'));
        }
        return view('user_gallery.index', compact('user_galleries'));
    }

    public function create()
    {
        return view('user_gallery.ajax.create');
    }

    public function store(Request $request)
    {
        $user_gallery = new UserGallery();
        $user_gallery->user_id = Auth::user()->id;
        $user_gallery->name = $request->has('name') ? $request->name : '';
        $user_gallery->link = '';
        $user_gallery->address = $request->has('address') ? $request->address : '';
        $user_gallery->postal_code = $request->has('postal_code') ? $request->postal_code : '';
        $user_gallery->city = $request->has('city') ? $request->city : '';
        $user_gallery->country = $request->has('country') ? $request->country : '';
        $user_gallery->email = $request->has('email') ? $request->email : '';
        $user_gallery->phone = $request->has('phone_code') ? $request->phone_code : '';
        $user_gallery->website = $request->has('website') ? $request->website : '';
        $user_gallery->instagram = $request->has('instagram') ? $request->instagram : '';
        $user_gallery->save();

        return uniResponse(true, 'Your gallery has been added', $user_gallery, 200);
    }

    public function edit($id)
    {
        $user_gallery = UserGallery::find($id);
        return view('user_gallery.ajax.edit', compact('user_gallery'));
    }

    public function update(Request $request, $id)
    {
        $delete = true;
        $user_gallery = UserGallery::find($id);
        $user_gallery->user_id = Auth::user()->id;
        $user_gallery->name = $request->has('name') ? $request->name : '';
        $user_gallery->link = '';
        $user_gallery->address = $request->has('address') ? $request->address : '';
        $user_gallery->postal_code = $request->has('postal_code') ? $request->postal_code : '';
        $user_gallery->city = $request->has('city') ? $request->city : '';
        $user_gallery->country = $request->has('country') ? $request->country : '';
        $user_gallery->email = $request->has('email') ? $request->email : '';
        $user_gallery->phone = $request->has('phone_code') ? $request->phone_code : '';
        $user_gallery->website = $request->has('website') ? $request->website : '';
        $user_gallery->instagram = $request->has('instagram') ? $request->instagram : '';
        $user_gallery->save();

        return uniResponse(true, 'Your gallery has been updated', $user_gallery, 200);
    }

    public function delete(Request $request, $id)
    {
        $user_gallery = UserGallery::find($id);
        $user_gallery->delete();

        return uniResponse(true, 'Your gallery has been deleted', null, 200);
    }
    public function position(Request $request)
    { 
        $user_gallery=UserGallery::where('user_id',Auth::user()->id)->get();
        foreach ($user_gallery as $key => $user) {
                UserGallery::where('id',$request->sortData[$key])->update(['position_id'=>$key]);
        }
        
    }
}
