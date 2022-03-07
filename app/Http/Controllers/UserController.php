<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\UserBio;
use App\Models\Setting;
use App\Models\UserViewProfile;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cookie;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
class UserController extends Controller
{
   public function index($slug)
   {
    $slug = Str::slug($slug);
    $user = User::where('slug', $slug)->first();
    if (!$user) {
        abort(404);
    }
    if ($user->first_name == "" && $user->last_name == "") {
        session(['new_slug'=> $slug]);
        return redirect()->route('register');
    }
        // dd($user->address_parts());

    $socialUrls = $user->user_social_url;
    if(isset($socialUrls))
{
        $socialUrls->max_val=max(array($user->user_social_url->fb_l,$user->user_social_url->msng_l,$user->user_social_url->tw_l,$user->user_social_url->in_l,$user->user_social_url->ln_l,$user->user_social_url->yu_l,$user->user_social_url->be_l,$user->user_social_url->wt_l,$user->user_social_url->skp_l));
        $socialUrls->min_val=min(array($user->user_social_url->fb_l,$user->user_social_url->msng_l,$user->user_social_url->tw_l,$user->user_social_url->in_l,$user->user_social_url->ln_l,$user->user_social_url->yu_l,$user->user_social_url->be_l,$user->user_social_url->wt_l,$user->user_social_url->skp_l));
}else{
    $socialUrls=null;
}


    return view('home', compact('user','socialUrls'));
}
public function viewProfile(Request $request)
{

      $setting=Setting::find(1);
      $minutes = $setting->is_cookies*1440;
      $response = new \Illuminate\Http\Response('Test');
       $response->withCookie(cookie('Subscription', 'Subscription', $minutes));
   $user=User::where('slug',$request->slug)->first();
    $row=new UserViewProfile();
    $row->user_id=$user->id;
    $row->email=$request->email;
    $row->save();
    $details=[
            'subject'=>'Subscriber notification',
            'ref'=>'123'

        ];
    \Mail::to($user->email)->send(new \App\Mail\SendUserDetailMail($details));
    return $response;
    return back();


}
public function saveSetting(Request $request)
{
    $row=Setting::find(1);
    $row->is_weekly_mail=$request->is_weekly_mail ? 1 : 0;
    $row->is_subscribe_mail=$request->is_subscribe_mail ? 1 : 0;
    $row->is_cookies=$request->is_cookies ? $request->is_cookies : 1;
    $row->is_mail=$request->is_mail ? 1 : 0;
    $row->save();
    return back()->with('success','Setting updated successfully!');

}
public function weekMailable(Request $request)
     {

         $dateStart =Carbon::parse(Carbon::now())
           ->toDateTimeString();
                                     // Carbon::pas(Carbon::now());
           $dateEnd =Carbon::parse(Carbon::now()->subDays(6))
           ->toDateTimeString();
           $mails=UserViewProfile::whereBetween('created_at', [
               $dateEnd, $dateStart
           ])->where('is_mail',0)->where('user_id',Auth::user()->id)->get();
           if(date('D')=='Tue' && $mails->count()>0)
           {
            foreach ($mails as $mail) {
             $mail->is_mail=1;
             $mail->save();
         }
         $details=[
            'subject'=>'Weekly subscriber summary',
            'ref'=>'w_report',
            'count'=>$mails->count()
        ];

        \Mail::to(Auth::user()->email)->send(new \App\Mail\SendUserDetailMail($details));
        return "success";

    }


}
 public function importselected(Request $request)
 {



    $query = UserViewProfile::whereIn('id',$request->rowid)->get();
if($query->count() > 0){
    $delimiter = ",";
    $filename = "mailable-data_" . date('Y-m-d') . ".csv";

    // Create a file pointer
    $f = fopen('php://memory', 'w');

    // Set column headers
    $fields = array('ID','Email');
    fputcsv($f, $fields, $delimiter);

    // Output each row of the data, format line as csv and write to file pointer
    foreach ($query as $key => $q) {
    $lineData = array($key+1,$q->email);
        fputcsv($f, $lineData, $delimiter);
    }


    // Move back to beginning of file
    fseek($f, 0);

    // Set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
}


 }
public function imagedownload()
{


}
public function mailable()
{ $user=Auth::user();
    $setting=Setting::find(1);
    // echo '<pre>'; print_r($user['viewprofile']->toArray()); exit;
    return view('mailable',compact('user','setting'));
}
public function importmailable(request $request)
{
    $request=$request->all();
// dd($request);
    if(isset($request['rowid']) && !empty($request['rowid'])){
        if(isset($request['exportType']) && !empty($request['exportType']) && $request['exportType']=='xls'){
            $selectedRows=$request['rowid'];
            return Excel::download(new UsersExport($selectedRows), 'users.xlsx');
        }else{
            $query = UserViewProfile::whereIn('id',$request['rowid'])->get();
        }
    }else{
        $query = UserViewProfile::where('user_id',Auth::user()->id)->get();
        if(isset($request['exportType']) && !empty($request['exportType']) && $request['exportType']=='xls'){
            $selectedRows=array();
            foreach($query as $id) {
                $selectedRows[]=$id['id'];
            }
            return Excel::download(new UsersExport($selectedRows), 'users.xlsx');
        }
    }


    // exit;
    // return Excel::download(new UsersExport($selectedRows), 'users.xlsx');
if($query->count() > 0){
    $delimiter = ",";
    $filename = "mailable-data_" . date('Y-m-d') . ".csv";

    // Create a file pointer
    $f = fopen('php://memory', 'w');

    // Set column headers
    $fields = array('ID','Email');
    fputcsv($f, $fields, $delimiter);

    // Output each row of the data, format line as csv and write to file pointer
    foreach ($query as $key => $q) {
    $lineData = array($key+1,$q->email);
        fputcsv($f, $lineData, $delimiter);
    }


    // Move back to beginning of file
    fseek($f, 0);

    // Set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
}

}

public function dashboard(Request $request)
{
    $user = Auth::user();
    return view('dashboard.index', compact('user'));
}
public function updateProfileImage(Request $request)
{
    $user=Auth::user();
     if ($request->hasFile('img')) {
        $image = $request->file('img');
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
        $user->save();
        return redirect()->back();

}
public function dashboardAjax(Request $request)
{
    $user = Auth::user();
    return view('dashboard.ajax.index', compact('user'));
}

public function checkUserName(Request $request)
{
    $user = User::where('slug', $request->user_name)->first();

    if ($user) {
        return uniResponse('error', __('message.user_name_exists'), null, 500);
    }

    return uniResponse('success', __('message.user_name_available'), null, 200);
}

public function setNewSlug(Request $request)
{
    $validated = $request->validate([
        'user_name' => 'required|unique:users,slug|max:255'
    ]);

    $slug = Str::slug($request->user_name);

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
    session(['new_slug'=> $slug]);

    return redirect()->route('register');
}
public function about()
{
 return view('dashboard.about');
}
public function updateProfile(Request $request)
{
 $user=Auth::user();
 $request->validate([
    'old_password' => ['required', new MatchOldPassword],
    'new_password' => ['required', 'string', 'min:8'],
]);
 if(!empty($request->new_password)){
   $user->password = Hash::make($request->new_password);
}

$user->save();
return back()->with('success', 'Profile Updated Successfully !');



}
public function deleteAccount()
{   Auth::user()->delete();
}
public function updateUserDetail(Request $request)
{
    $user = User::find(Auth::user()->id);
    $request->validate([
                       'first_name'=>'required|min:3',
                        'last_name'=>'required',
                         'email'=>'required|email|unique:users,email,'.$user->id,]);


       if (isset($request->bio_content)) {
            UserBio::where('user_id',$user->id)->update([
                'bio_content'=>$request->bio_content,
            ]);
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
     if($user->email!=$request->email)
     {
          $user->email = $request->email;
          $user->email_verified_at =null;
          $user->sendEmailVerificationNotification();
     }

        $user->save();
        return back()->with('success', 'Profile Updated Successfully !');

}
}
