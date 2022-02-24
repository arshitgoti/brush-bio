<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\UserSocialUrl;
use App\Models\UserPortfolioUrl;
use App\Models\UserBio;
use Illuminate\Auth\Events\Registered;
use Image;
use URL;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, Authenticatable;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        /*if (isset($data['isSimpleForm']) && $data['isSimpleForm'] == 'yes') {
            return Validator::make($data, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'user_name' => ['required', 'string', 'max:255', 'unique:users,user_name'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string'],
            ]);
        }else{*/
            return Validator::make($data, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                // 'phone_code' => ['required', 'string'],
                'password' => ['required', 'string', 'same:confirm_password']
            ]);
        // }        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $request = request();
        $slug = session()->pull('new_slug');

        $user = User::where('slug', $slug)->first();

        if (!$user) {
        // if (!$user && isset($data['isSimpleForm']) && $data['isSimpleForm'] == 'yes') {
            $user = new User();
            $user->slug = $slug;
        }

        // $user->user_name = $data['user_name'] ?? '';
        $user->first_name = $data['first_name'] ?? '';
        $user->last_name = $data['last_name'] ?? '';
        $user->email = $data['email'];
        $user->dob = $data['dob'] ?? null;
        $user->phone_number = $data['phone_code'] ?? '';
        $user->website = $data['website'] ?? '';
        $user->instagram = $data['instagram'] ?? '';
        $user->type_of_artist = $data['type_of_artist'] ?? '';
        $user->password = Hash::make($data['password']);
        
        $user->is_email = "show";
        $user->is_phone = "show";
        $user->is_contact = "hide";

        $user->save();

        $user_social_url = new UserSocialUrl();
        $user_social_url->user_id = $user->id;
        $user_social_url->instagram = $data['instagram'] ?? '';
        $user_social_url->instagram_is_featured = 1;
        /*$user_social_url->whatsapp = $data['phone_code'] ?? '';
        $user_social_url->whatsapp_is_featured = 1;*/
        $user_social_url->save();

        if (isset($data['bio_content'])) {
            $user_bio = new UserBio();
            $user_bio->user_id = $user->id;
            $user_bio->bio_content = $data['bio_content'];
            $user_bio->save();    
        }        

        if ($request->hasFile('profile_pic')) {
            // $file_name_original = $request->profile_pic->getClientOriginalName();
            // $file_name = pathinfo($file_name_original, PATHINFO_FILENAME);
            // $extension = pathinfo($file_name_original, PATHINFO_EXTENSION);
            // $file_name = Str::slug($file_name);
            // $file_name = $file_name . "." . $extension;
            // $directory = "user_profile_pics/" . $user->id;
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
        $user->save();
        // dd($user);
        // $ud=User::where('slug',$slug)->first();
        $potfolioUrls=new UserPortfolioUrl();
        $potfolioUrls->user_id=$user->id;
        $potfolioUrls->url=$user->website;
        $potfolioUrls->title='Portfolio';
        $potfolioUrls->save();

        
        return $user;
        // return redirect()->route('user.dashboard');
    }

    public function showRegistrationForm()
    {
        $slug = session('new_slug');
        if (!$slug) {
            // abort(401,'Please Register Your Business First.');
            return view('welcome');
        }

        return view('auth.register');
    }

}
