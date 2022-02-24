<?php

namespace App\Http\Controllers;

use App\Models\UserExhibition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserExhibitionController extends Controller
{
    public function index(Request $request)
    { 
        // if ($type != 'upcoming' && $type != 'past' && $type != 'current') {
        //     abort(404);
        // }

        $user_exhibitions = UserExhibition::where('user_id', Auth::user()->id)->get();

        if ($request->ajax()) {
            return view('user_exhibition.ajax.index', compact('user_exhibitions'));
        }
        return view('user_exhibition.index', compact('user_exhibitions'));
    }

    public function create()
    {
        return view('user_exhibition.ajax.create');
    }

    public function store(Request $request)
    { 
        $user_exhibition = new UserExhibition();
        $user_exhibition->user_id = Auth::user()->id;
        $user_exhibition->exhibition_name = $request->has('exhibition_name') ? $request->exhibition_name : '';
        $user_exhibition->gallery_name = $request->has('gallery_name') ? $request->gallery_name : '';
        $user_exhibition->address = $request->has('address') ? $request->address : '';
        $user_exhibition->start_date = $request->has('start_date') ? $request->start_date : null;
        $user_exhibition->end_date = $request->has('end_date') ? $request->end_date : null;
        $user_exhibition->website = $request->has('website') ? $request->website : '';
        $user_exhibition->type = $request->has('type') ? $request->type : '';
        $user_exhibition->save();

        return uniResponse(true, 'Your exhibition has been added', $user_exhibition, 200);
    }

    public function edit($id)
    {
        $user_exhibition = UserExhibition::find($id);
        return view('user_exhibition.ajax.edit', compact('user_exhibition'));
    }

    public function update(Request $request, $id)
    {
        $delete = true;
        $user_exhibition = UserExhibition::find($id);
        $user_exhibition->user_id = Auth::user()->id;
        $user_exhibition->exhibition_name = $request->has('exhibition_name') ? $request->exhibition_name : '';
        $user_exhibition->gallery_name = $request->has('gallery_name') ? $request->gallery_name : '';
        $user_exhibition->address = $request->has('address') ? $request->address : '';
        $user_exhibition->start_date = $request->has('start_date') ? $request->start_date : null;
        $user_exhibition->end_date = $request->has('end_date') ? $request->end_date : null;
        $user_exhibition->website = $request->has('website') ? $request->website : '';
        $user_exhibition->type = $request->has('type') ? $request->type : '';
        $user_exhibition->save();

        return uniResponse(true, 'Your exhibition has been updated', $user_exhibition, 200);
    }

    public function delete(Request $request, $id)
    {
        $user_exhibition = UserExhibition::find($id);
        $user_exhibition->delete();

        return uniResponse(true, 'Your exhibition has been deleted', null, 200);
    }
    public function saerchData(Request $request)
    { 
 $user_exhibitions = UserExhibition::where('user_id', Auth::user()->id)
    ->where('start_date', '>=',$request->s_start_date)
    ->where('end_date', '<=',$request->s_end_date)
    ->get();

        if ($request->ajax()) {
            return view('user_exhibition.ajax.index', compact('user_exhibitions'));
        }        
        return uniResponse(true, 'Your exhibition has been search', null, 200);
    }    
}
