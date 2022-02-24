<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserVcardRequest;
use App\Models\User;
use App\Models\UserBio;
use App\Models\UserVcard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;
class UserVcardController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        return view('user_vcard.ajax.create', compact('user'));
    }

    public function store(Request $request)
    {

        $user_vcard = new UserVcard();
        $user_vcard->user_id = Auth::user()->id;
        $user_vcard->first_name = $request->first_name;
        $user_vcard->last_name =  $request->last_name;
        $user_vcard->type_of_artist =  $request->type_of_artist;
        $user_vcard->embend_link=  $request->embend_link;
        $user_vcard->organization =  $request->organization;
        $user_vcard->title =  $request->title;
        $user_vcard->note =  $request->note;
        $user_vcard->telephone_home =  $request->telephone_home;
        $user_vcard->telephone_mobile =  $request->telephone_mobile;
        $user_vcard->telephone_work =  $request->telephone_work;
        $user_vcard->other_url =  $request->other_url;
        $user_vcard->email_home =  $request->email_home;
        $user_vcard->email_work =  $request->email_work;
        $user_vcard->dob =  $request->filled('dob') ? Carbon::parse($request->dob)->format('Y-m-d') : '';

        $address_home = "Home:;;". $request->addr_home_street .";". $request->addr_home_city .";" . $request->addr_home_state .";". $request->addr_home_postal_code .";" . $request->addr_home_country;

        $address_work = "Work:;;". $request->addr_work_street .";". $request->addr_work_city .";" . $request->addr_work_state .";". $request->addr_work_postal_code .";" . $request->addr_work_country;

        $user_vcard->address_home = $address_home;
        $user_vcard->address_work = $address_work;

        if ($request->hasFile('photo')) {
            // $file_name_original = $request->photo->getClientOriginalName();
            // $file_name = pathinfo($file_name_original, PATHINFO_FILENAME);
            // $extension = pathinfo($file_name_original, PATHINFO_EXTENSION);
            // $file_name = Str::slug($file_name);
            // $file_name = $file_name . "." . $extension;
            // $directory = "user_vcard_photos/" . Auth::user()->id;
            // Storage::makeDirectory($directory);
            // $path = Storage::putFileAs($directory, $request->photo, $file_name);
            // $user_vcard->photo = $path;


        $image = $request->file('photo');
        $file_name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('user_vcard_photos/');
        $image->move($destinationPath, $file_name);
        $user_vcard->photo  = $file_name;
        }
                if ($request->hasFile('cv')) {
            // $file_name_original = $request->photo->getClientOriginalName();
            // $file_name = pathinfo($file_name_original, PATHINFO_FILENAME);
            // $extension = pathinfo($file_name_original, PATHINFO_EXTENSION);
            // $file_name = Str::slug($file_name);
            // $file_name = $file_name . "." . $extension;
            // $directory = "user_vcard_photos/" . Auth::user()->id;
            // Storage::makeDirectory($directory);
            // $path = Storage::putFileAs($directory, $request->photo, $file_name);
            // $user_vcard->photo = $path;


        $image = $request->file('cv');
        $file_name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('user_cvs/');
        $image->move($destinationPath, $file_name);
        $user_vcard->cv  = $file_name;
        }
        $user_bio=UserBio::find(Auth::user()->id);
        $user_bio->bio_content=$request->bio_content;
        $user_bio->save();
        $user_vcard->save();


        return uniResponse(true, 'Your changes have been saved', $user_vcard, 200);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $address_work = $user->address_parts();
        return view('user_vcard.ajax.edit', compact('user', 'address_work'));
    }

    public function update(StoreUserVcardRequest $request, $id)
    {
        //echo '<pre>'; print_r($request->all()); exit;

        $request->validate([
                    'cv'=>"mimetypes:application/pdf"
        ]);
        $user = User::find($id);

        $user->first_name = $request->first_name;
        $user->last_name =  $request->last_name;
        $user->email =  $request->email;
        $user->phone_number =  $request->phone_code;
        $user->website =  $request->website;
        $user->dob =  $request->filled('dob') ? Carbon::parse($request->dob)->format('Y-m-d') : NULL;

        $address_work = "Work:;;". $request->addr_work_street .";". $request->addr_work_city .";" . $request->addr_work_state .";". $request->addr_work_postal_code .";" . $request->addr_work_country;

        $user->address_work = $address_work;
        $user->type_of_artist = $request->type_of_artist;
        $user->embend_link=  $request->embend_link;
        $user->country = $request->addr_work_country;
        if( isset($request->is_email) && $request->is_email == 'on'){
            $user->is_email='hide';
        }else{
            $user->is_email='show';
        }
        if(isset($request->is_phone) && $request->is_phone == 'on'){
            $user->is_phone='hide';
        }else{
            $user->is_phone='show';
        }
        if(isset($request->is_contact) && $request->is_contact == 'on'){
            $user->is_contact='hide';
        }else{
            $user->is_contact='show';
        }
        // $user->is_phone=$request->is_phone ? 'hide' : 'show';
        // $user->is_contact=$request->is_contact ? 'hide' : 'show';
        if(isset($request->website) && !empty($request->website) && str_contains($request->website,"www.brush.bio/")){

            $user->slug= str_replace("www.brush.bio/","",$request->website);
        }
        if ($request->hasFile('profile_pic')) {
            // $file_name_original = $request->profile_pic->getClientOriginalName();
            // $file_name = pathinfo($file_name_original, PATHINFO_FILENAME);
            // $extension = pathinfo($file_name_original, PATHINFO_EXTENSION);
            // $file_name = Str::slug($file_name);
            // $file_name = $file_name . "." . $extension;
            // $directory = "user_profile_pics/" . Auth::user()->id;
            // Storage::makeDirectory($directory);
            // $path = Storage::putFileAs($directory, $request->profile_pic, $file_name);
            // if ($path) {
            //     Storage::delete([$user->profile_pic]);
            // }
            // $user->profile_pic = $path;
        $image = $request->file('profile_pic');
        $imageSize = getimagesize($image);
        $width = $imageSize[0]/2;
        $height = $imageSize[1]/2;
        $file_name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('user_profile_pics/');
        $image = Image::make($image->getRealPath());
        $image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$file_name);
        //$image->move($destinationPath, $file_name);
         $user->profile_pic = $file_name;
        }
          if ($request->hasFile('cv')) {
            // $file_name_original = $request->photo->getClientOriginalName();
            // $file_name = pathinfo($file_name_original, PATHINFO_FILENAME);
            // $extension = pathinfo($file_name_original, PATHINFO_EXTENSION);
            // $file_name = Str::slug($file_name);
            // $file_name = $file_name . "." . $extension;
            // $directory = "user_vcard_photos/" . Auth::user()->id;
            // Storage::makeDirectory($directory);
            // $path = Storage::putFileAs($directory, $request->photo, $file_name);
            // $user_vcard->photo = $path;


        $image = $request->file('cv');
        $file_name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('user_cvs/');
        $image->move($destinationPath, $file_name);
        $user->cv  = $file_name;
        }
        $user_bio=UserBio::where('user_id',Auth::user()->id)->first();
        if($user_bio)
        {
            $user_bio->bio_content=$request->bio_content;
        $user_bio->save();
    }else{
        $user_bio=new UserBio();
        $user_bio->user_id=Auth::user()->id;
        $user_bio->bio_content=$request->bio_content;
        $user_bio->save();
    }
        $user->save();

        return uniResponse(true, 'Your changes have been saved', $user, 200);
    }

    public function download($id)
    {

        $user = User::find($id);
        if (!$user) {
            abort(404,'No contact detials found');
        }

        return $user->generate()->download();
    }
}
