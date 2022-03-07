<?php

namespace App\Http\Controllers;

use App\Models\UserSocialUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSocialUrlController extends Controller
{
    public function create()
    {
        return view('user_social_url.ajax.create');
    }

    public function store(Request $request)
    {
        $user_social_url = new UserSocialUrl();
        $user_social_url->user_id = Auth::user()->id;
        $user_social_url->facebook = $request->facebook;
        $user_social_url->messenger = $request->messenger;
        $user_social_url->twitter = $request->twitter;
        $user_social_url->linkedin = $request->linkedin;
        $user_social_url->instagram = $request->instagram;
        $user_social_url->snapchat = $request->snapchat;
        $user_social_url->youtube = $request->youtube;
        $user_social_url->behance = $request->behance;
        $user_social_url->known = $request->known;
        $user_social_url->open = $request->open;
        $user_social_url->whatsapp = $request->whatsapp_number_code;
        $user_social_url->skype = $request->skype;
        $user_social_url->fb_l = $request->fb_l ? $request->fb_l : 0;
        $user_social_url->tw_l = $request->tw_l ? $request->tw_l : 1;
        $user_social_url->ln_l = $request->ln_l ? $request->ln_l : 2;
        $user_social_url->in_l = $request->in_l ? $request->in_l :3 ;
        //$user_social_url->snapchat = $request->snapchat;
        $user_social_url->yu_l = $request->yu_l ? $request->yu_l : 4;
        $user_social_url->wt_l = $request->wt_l ? $request->wt_l : 5;
        $user_social_url->be_l = $request->be_l ? $request->be_l : 6;
        $user_social_url->skp_l = $request->skp_l ? $request->skp_l : 7;
        $user_social_url->skp_l = $request->skp_l ? $request->open_l : 8;
        $user_social_url->skp_l = $request->skp_l ? $request->known_l : 9;
        $user_social_url->msng_l = $request->msng_l ? $request->msng_l : 11;

        $user_social_url->facebook_is_featured = $request->has('facebook_is_featured') ? 1 : 0;
        $user_social_url->messenger_is_featured = $request->has('messenger_is_featured') ? 1 : 0;
        $user_social_url->twitter_is_featured = $request->has('twitter_is_featured') ? 1 : 0;
        $user_social_url->linkedin_is_featured = $request->has('linkedin_is_featured') ? 1 : 0;
        $user_social_url->instagram_is_featured = $request->has('instagram_is_featured') ? 1 : 0;
        $user_social_url->snapchat_is_featured = $request->has('snapchat_is_featured') ? 1 : 0;
        $user_social_url->youtube_is_featured = $request->has('youtube_is_featured') ? 1 : 0;
        $user_social_url->behance_is_featured = $request->has('behance_is_featured') ? 1 : 0;
        $user_social_url->whatsapp_is_featured = $request->has('whatsapp_is_featured') ? 1 : 0;
        $user_social_url->skype_is_featured = $request->has('skype_is_featured') ? 1 : 0;
        $user_social_url->save();

        return uniResponse(true, 'Your social urls are updated', $user_social_url, 200);
    }

    public function edit($id)
    {
        $user_social_url = UserSocialUrl::find($id);
        $user_social_url->max_val=max(array($user_social_url->fb_l,$user_social_url->msng_l,$user_social_url->tw_l,$user_social_url->in_l,$user_social_url->ln_l,$user_social_url->yu_l,$user_social_url->be_l,$user_social_url->wt_l,$user_social_url->skp_l,$user_social_url->known_l,$user_social_url->open_l));
        $user_social_url->min_val=min(array($user_social_url->fb_l,$user_social_url->msng_l,$user_social_url->tw_l,$user_social_url->in_l,$user_social_url->ln_l,$user_social_url->yu_l,$user_social_url->be_l,$user_social_url->wt_l,$user_social_url->skp_l));
        return view('user_social_url.ajax.edit', compact('user_social_url'));
    }

    public function update(Request $request, $id)
    {
        $user_social_url = UserSocialUrl::find($id);
        $delete = true;
        if (
            $request->filled('facebook') ||
            $request->filled('messenger') ||
            $request->filled('twitter') ||
            $request->filled('linkedin') ||
            $request->filled('instagram') ||
            $request->filled('snapchat') ||
            $request->filled('whatsapp') ||
            $request->filled('youtube') ||
            $request->filled('skype')
        ) {
            $delete = false;
        }

        if ($delete) {
            $user_social_url->delete();
            return uniResponse(true, 'Your social urls are updated', $user_social_url, 200);
        }

        $user_social_url->user_id = Auth::user()->id;
        $user_social_url->facebook = $request->facebook;
        $user_social_url->messenger = $request->messenger;
        $user_social_url->twitter = $request->twitter;
        $user_social_url->linkedin = $request->linkedin;
        $user_social_url->instagram = $request->instagram;
        $user_social_url->snapchat = $request->snapchat;
        $user_social_url->youtube = $request->youtube;
        $user_social_url->whatsapp = $request->whatsapp_number_code;
        $user_social_url->behance = $request->behance;
        $user_social_url->skype = $request->skype;
        $user_social_url->fb_l = $request->fb_l;
        $user_social_url->tw_l = $request->tw_l;
        $user_social_url->ln_l = $request->ln_l;
        $user_social_url->in_l = $request->in_l;
        //$user_social_url->snapchat = $request->snapchat;
        $user_social_url->yu_l = $request->yu_l;
        $user_social_url->wt_l = $request->wt_l;
        $user_social_url->be_l = $request->be_l;
        $user_social_url->skp_l = $request->skp_l;
        $user_social_url->msng_l = $request->msng_l ? $request->msng_l : 11;

        $user_social_url->facebook_is_featured = $request->has('facebook_is_featured') ? 1 : 0;
        $user_social_url->messenger_is_featured = $request->has('messenger_is_featured') ? 1 : 0;
        $user_social_url->twitter_is_featured = $request->has('twitter_is_featured') ? 1 : 0;
        $user_social_url->linkedin_is_featured = $request->has('linkedin_is_featured') ? 1 : 0;
        $user_social_url->instagram_is_featured = $request->has('instagram_is_featured') ? 1 : 0;
        $user_social_url->snapchat_is_featured = $request->has('snapchat_is_featured') ? 1 : 0;
        $user_social_url->youtube_is_featured = $request->has('youtube_is_featured') ? 1 : 0;
        $user_social_url->whatsapp_is_featured = $request->has('whatsapp_is_featured') ? 1 : 0;
        $user_social_url->skype_is_featured = $request->has('skype_is_featured') ? 1 : 0;

        $user_social_url->save();

        return uniResponse(true, 'Your social urls are updated', $user_social_url, 200);
    }
}
