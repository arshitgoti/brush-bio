<?php

use App\Models\User;
use App\Models\UserSocialUrl;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 404page

Route::get('/404', 'HomeController@notfound')->name('404');
// Route::get('/clear',function(){
//     \Artisan::call('cache:clear');
//     \Artisan::call('route:clear');
//     \Artisan::call('view:clear');
//     \Artisan::call('config:clear');
//     \Artisan::call('route:cache');
//     dd('clear');
// });

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/image-download', function(){
         return response()->streamDownload(function () {
        echo file_get_contents('https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=https://www.brush.bio/Auth::user()->slug&choe=UTF-8');
    }, 'barcode.png');
       })->name('image.download')->middleware('auth');
Route::get('/view-profile', 'UserController@viewProfile')->name('user.view.profile');
Route::get('/close-popup', function(){
      $setting=\App\Models\Setting::find(1);
      $minutes = $setting->is_cookies*1440;
      $response = new \Illuminate\Http\Response();
       $response->withCookie(cookie('Subscription', 'Subscription', $minutes));
       return $response;
});
Route::get('/weekly-mail', 'UserController@weekMailable')->name('user.week.mail');
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/set-new-slug', 'UserController@setNewSlug')->name('user.set.slug');


Route::get('/{slug}', 'UserController@index')->name('user.me');
Route::get('/{slug}/login', function () {
    if (Auth::check()) {
        return redirect()->route('user.dashboard');
    }else{
        return view('auth.login');
    }
})->name('slug.login');
Route::get('/vcard/{id}/download', 'UserVcardController@download')->name('user.vcard.download.guest');
Route::post('/check-user-name', 'UserController@checkUserName')->name('user.check.username');
Route::prefix('me')->middleware(['auth','cors'])->group(function () {
    Route::get('/{slug}/logout', function($slug){
        Auth::logout();
        return redirect()->route('user.me', $slug);
    })->name('user.custom.logout');
    Route::get('/dashboard', 'UserController@dashboard')->name('user.dashboard');
    Route::get('/my-account', 'UserController@about')->name('user.about');
    Route::post('/update-profile', 'UserController@updateProfile')->name('user.update.profile');

      Route::get('/user-mailable', 'UserController@mailable')->name('user.mailable');
      Route::get('/import-mailable', 'UserController@importmailable')->name('user.import.mailable');
      Route::get('/import-selected', 'UserController@importselected')->name('user.import.selected');
       Route::get('/save-setting', 'UserController@saveSetting')->name('save.setting');

    Route::post('/update-profile-image', 'UserController@updateProfileImage')->name('user.update.profile.image');
    Route::post('/update-user-detail', 'UserController@updateUserDetail')->name('user.update.detail');
    Route::get('/delete-account', 'UserController@deleteAccount')->name('user.delete');
    Route::get('/dashboard/ajax', 'UserController@dashboardAjax')->name('user.dashboard.ajax');

    // User website
    Route::prefix('website')->group(function () {
        Route::get('create', 'UserWebSiteController@create')->name('user.website.create');
        Route::post('store', 'UserWebSiteController@store')->name('user.website.store');
        Route::get('{id}/edit', 'UserWebSiteController@edit')->name('user.website.edit');
        Route::post('{id}/update', 'UserWebSiteController@update')->name('user.website.update');
    });

     // User calls
     Route::prefix('call')->group(function () {
        Route::get('create', 'UserCallController@create')->name('user.call.create');
        Route::post('store', 'UserCallController@store')->name('user.call.store');
        Route::get('{id}/edit', 'UserCallController@edit')->name('user.call.edit');
        Route::post('{id}/update', 'UserCallController@update')->name('user.call.update');
    });

    // User whatsapp
    Route::prefix('whatsapp')->group(function () {
        Route::get('create', 'UserWhatsappController@create')->name('user.whatsapp.create');
        Route::post('store', 'UserWhatsappController@store')->name('user.whatsapp.store');
        Route::get('{id}/edit', 'UserWhatsappController@edit')->name('user.whatsapp.edit');
        Route::post('{id}/update', 'UserWhatsappController@update')->name('user.whatsapp.update');
    });

     // User SMS
     Route::prefix('sms')->group(function () {
        Route::get('create', 'UserSmsController@create')->name('user.sms.create');
        Route::post('store', 'UserSmsController@store')->name('user.sms.store');
        Route::get('{id}/edit', 'UserSmsController@edit')->name('user.sms.edit');
        Route::post('{id}/update', 'UserSmsController@update')->name('user.sms.update');
    });

    // User Email
    Route::prefix('email')->group(function () {
        Route::get('create', 'UserEmailController@create')->name('user.email.create');
        Route::post('store', 'UserEmailController@store')->name('user.email.store');
        Route::get('{id}/edit', 'UserEmailController@edit')->name('user.email.edit');
        Route::post('{id}/update', 'UserEmailController@update')->name('user.email.update');
    });

    // User bio
    Route::prefix('bio')->group(function () {
        Route::get('create', 'UserBioController@create')->name('user.bio.create');
        Route::post('store', 'UserBioController@store')->name('user.bio.store');
        Route::get('{id}/edit', 'UserBioController@edit')->name('user.bio.edit');
        Route::post('{id}/update', 'UserBioController@update')->name('user.bio.update');
    });

     // User Gallery
     Route::prefix('gallery')->group(function () {
        Route::get('/', 'UserGalleryController@index')->name('user.gallery');
        Route::get('create', 'UserGalleryController@create')->name('user.gallery.create');
        Route::get('position', 'UserGalleryController@position')->name('user.gallery.position');
        Route::post('store', 'UserGalleryController@store')->name('user.gallery.store');
        Route::get('{id}/edit', 'UserGalleryController@edit')->name('user.gallery.edit');
        Route::get('{id}/delete', 'UserGalleryController@delete')->name('user.gallery.delete');
        Route::post('{id}/update', 'UserGalleryController@update')->name('user.gallery.update');
    });

    // User Exhibitions
    Route::prefix('exhibitions')->group(function () {
        Route::get('/', 'UserExhibitionController@index')->name('user.exhibition');
        Route::get('/search', 'UserExhibitionController@saerchData')->name('user.exhibition.search');
        Route::get('create', 'UserExhibitionController@create')->name('user.exhibition.create');
        Route::post('store', 'UserExhibitionController@store')->name('user.exhibition.store');
        Route::get('{id}/edit', 'UserExhibitionController@edit')->name('user.exhibition.edit');
        Route::get('{id}/delete', 'UserExhibitionController@delete')->name('user.exhibition.delete');
        Route::post('{id}/update', 'UserExhibitionController@update')->name('user.exhibition.update');
    });

    // User CV
    Route::prefix('cv')->group(function () {
        Route::get('create', 'UserCVController@create')->name('user.cv.create');
        Route::post('store', 'UserCVController@store')->name('user.cv.store');
        Route::get('edit', 'UserCVController@edit')->name('user.cv.edit');
        Route::post('update', 'UserCVController@update')->name('user.cv.update');
        Route::get('delete', 'UserCVController@delete')->name('user.cv.delete');
    });

    // User social urls
    Route::prefix('social-url')->group(function () {
        Route::get('create', 'UserSocialUrlController@create')->name('user.social.url.create');
        Route::post('store', 'UserSocialUrlController@store')->name('user.social.url.store');
        Route::get('{id}/edit', 'UserSocialUrlController@edit')->name('user.social.url.edit');
        Route::post('{id}/update', 'UserSocialUrlController@update')->name('user.social.url.update');
    });

    // User vCard
    Route::prefix('vcard')->group(function () {
        Route::get('create', 'UserVcardController@create')->name('user.vcard.create');
        Route::post('store', 'UserVcardController@store')->name('user.vcard.store');
        Route::get('{id}/edit', 'UserVcardController@edit')->name('user.vcard.edit');
        Route::post('{id}/update', 'UserVcardController@update')->name('user.vcard.update');
        Route::get('{id}/download', 'UserVcardController@download')->name('user.vcard.download');
    });

    // User profile picture
    Route::prefix('profile-picture')->group(function () {
        Route::get('create', 'UserProfilePictureController@create')->name('user.profile.picture.create');
        Route::post('store', 'UserProfilePictureController@store')->name('user.profile.picture.store');
        Route::get('{id}/edit', 'UserProfilePictureController@edit')->name('user.profile.picture.edit');
        Route::post('{id}/update', 'UserProfilePictureController@update')->name('user.profile.picture.update');
        Route::get('{id}/delete', 'UserProfilePictureController@destroy')->name('user.profile.picture.destroy');
    });

    // User portfolio urls
    Route::prefix('portfolio-url')->group(function () {
        Route::get('create', 'UserPortfolioUrlController@create')->name('user.portfolio.url.create');
        Route::post('store', 'UserPortfolioUrlController@store')->name('user.portfolio.url.store');
        Route::get('{user_id}/edit', 'UserPortfolioUrlController@edit')->name('user.portfolio.url.edit');
        Route::post('{user_id}/update', 'UserPortfolioUrlController@update')->name('user.portfolio.url.update');
    });
});

Route::prefix('debug')->group(function () {
    /*Route::get('logoug', function ($id) {
         // Auth::logout();
    });
    Route::get('mmkdir', function () {
        $directory = "public/user_profile_picture/" . Auth::user()->id . "/";
        Storage::makeDirectory($directory);
    });

    Route::get('b64', function () {
        $path = Storage::path('user_vcard_photos/1/150.png');
        $getPhoto               = file_get_contents($path);
        $b64vcard               = base64_encode($getPhoto);
        $b64mline               = chunk_split($b64vcard,74,"\n");
        $b64final               = preg_replace('/(.+)/', ' $1', $b64mline);
        $photo                  = $b64final;
        echo $photo;
    });*/
    Route::get('clear-cache', function(){
        Artisan::call('route:clear');
        Artisan::call('cache:clear');
        Artisan::call('storage:link');
        Artisan::call('config:clear');
        return 'Cache cleared';
    });

    Route::get('/reset-notification', function () {

        // Get a user for demo purposes
        $user = User::find(1);

        // Make a Reset Notification object, (subclass of `Notification`)
        $resetNotification = new \Illuminate\Auth\Notifications\ResetPassword( 'some-random-string-this-will-be-much-longer-in-real-life' );

        // get the `MailMessage` object
        $mailMessage = $resetNotification->toMail($user);

        // get the `Markdown` object
        $markdown = new Illuminate\Mail\Markdown(view(), config('mail.markdown'));

        // Render the vendor.notifications.email view with data from the `MailMessage` object
        return $markdown->render('vendor.notifications.email', $mailMessage->toArray());
    });
});
