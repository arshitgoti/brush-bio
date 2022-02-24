<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use URL;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }
    /**
     * Get the user_website associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_website()
    {
        return $this->hasOne(UserWebSite::class, 'user_id', 'id');
    }

    public function filled_website()
    {
        return $this->website ?? false;
    }

    /**
     * Get the user_profile_picture associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile_picture()
    {
        return $this->hasOne(UserProfilePicture::class, 'user_id', 'id');
    }

    /**
     * Get all of the portfolio_urls for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function portfolio_urls()
    {
        return $this->hasMany(UserPortfolioUrl::class, 'user_id', 'id');
    }
     public function viewprofile()
    {
        return $this->hasMany(UserViewProfile::class, 'user_id', 'id');
    }

    /**
     * Get the user_call associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_call()
    {
        return $this->hasOne(UserCall::class, 'user_id', 'id');
    }

    /**
     * Get the user_whatsapp associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_whatsapp()
    {
        return $this->hasOne(UserWhatsapp::class, 'user_id', 'id');
    }

    /**
     * Get the user_sms associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_sms()
    {
        return $this->hasOne(UserSms::class, 'user_id', 'id');
    }

    /**
     * Get the user_email associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_email()
    {
        return $this->hasOne(UserEmail::class, 'user_id', 'id');
    }

    /**
     * Get the user_vcard associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_vcard()
    {
        return $this->hasOne(UserVcard::class, 'user_id', 'id');
    }

    /**
     * Get the user_social_url associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_social_url()
    {
        return $this->hasOne(UserSocialUrl::class, 'user_id', 'id');
    }

    /**
     * Get the user_bio associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_bio()
    {
        return $this->hasOne(UserBio::class, 'user_id', 'id')->withDefault();
    }

    /**
     * Get all of the user_galleries for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user_galleries()
    {
        return $this->hasMany(UserGallery::class, 'user_id', 'id');
    }

    /**
     * Get all of the user_galleries for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user_exhibitions()
    {
        return $this->hasMany(UserExhibition::class, 'user_id', 'id');
    }

    /**
     * Get all of the upcoming_exhibitions for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function upcoming_exhibitions()
    {
        return $this->hasMany(UserExhibition::class, 'user_id', 'id')->where('type', 'upcoming');
    }

    /**
     * Get all of the past_exhibitions for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function past_exhibitions()
    {
        return $this->hasMany(UserExhibition::class, 'user_id', 'id')->where('type', 'past');
    }


    /**
     * Get all of the current_exhibitions for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function current_exhibitions()
    {
        return $this->hasMany(UserExhibition::class, 'user_id', 'id')->where('type', 'current');
    }

    protected $vCard;

    public function generate()
    {
        $this->vCard = "BEGIN:VCARD" . "\r\n";
        $this->vCard .= "VERSION:3.0" . "\r\n";
        $this->vCard .= "N;CHARSET=UTF-8:". $this->last_name .";".$this->first_name.";;;" . "\r\n";
        $this->vCard .= "FN;CHARSET=UTF-8:".$this->first_name." ".$this->last_name."" . "\r\n";

        /*$this->vCard .= "X-PHONETIC-FIRST-NAME:". $this->first_name . "\r\n";
        $this->vCard .= "X-PHONETIC-LAST-NAME:". $this->last_name . "\r\n";*/
        // $this->vCard .= "ORG:". $this->organization . "\r\n";
        $this->vCard .= "TITLE;CHARSET=UTF-8:". $this->type_of_artist . "\r\n";
        /*if ($this->user_bio()->exists()) {
            $this->vCard .= "NOTE;CHARSET=UTF-8:". $this->user_bio->bio_content . "\r\n";
        }*/

        // $this->vCard .= "TEL;type=Home:". $this->telephone_home . "\r\n";
        // $this->vCard .= "item1.TEL:". $this->telephone_mobile . "\r\n";
       /* $this->vCard .= "item1.X-ABLabel:Mobile" . "\r\n";*/
        if($this->is_phone=='show')
        {$this->vCard .= "TEL;TYPE=WORK,VOICE:". $this->phone_number . "\r\n";}
        // $this->vCard .= "URL;CHARSET=UTF-8:https://www.". $this->website . "\r\n";
        $this->vCard .= "URL;CHARSET=UTF-8:". URL::to('/').'/'.$this->slug . "\r\n";



        //{{route('user.me', Auth::user()->slug)}}


        /*$this->vCard .= "item2.X-ABLabel:OTHER" . "\r\n";*/
        // $this->vCard .= "EMAIL;TYPE=Home:". $this->email_home . "\r\n";
        if($this->is_email=='show')
        {$this->vCard .= "EMAIL;CHARSET=UTF-8;type=WORK,INTERNET:". $this->email . "\r\n";}

        // $this->vCard .= "item3.ADR;type=". $this->address_home . "\r\n";
        // $this->vCard .= "item3.X-ABADR:ac" . "\r\n";

        $this->vCard .= "ADR;CHARSET=UTF-8;TYPE=WORK:". $this->address_work . "\r\n";
        /*$this->vCard .= "item4.X-ABADR:ac" . "\r\n";*/




        /*
        if ($this->user_social_url && $this->user_social_url->facebook) {
            $this->vCard .= "URL;CHARSET=UTF-8:https://www.facebook.com/". $this->user_social_url->facebook . "\r\n";
        }
        if ($this->user_social_url && $this->user_social_url->twitter) {
            $this->vCard .= "URL;CHARSET=UTF-8:https://www.twitter.com/". $this->user_social_url->twitter . "\r\n";
        }
        if ($this->user_social_url && $this->user_social_url->linkedin) {
            $this->vCard .= "URL;CHARSET=UTF-8:https://www.linkedin.com/". $this->user_social_url->linkedin . "\r\n";
        }
        if ($this->user_social_url && $this->user_social_url->instagram) {
            $this->vCard .= "URL;CHARSET=UTF-8:https://www.instagram.com/". $this->user_social_url->instagram . "\r\n";
        }
        if ($this->user_social_url && $this->user_social_url->youtube) {
            $this->vCard .= "URL;CHARSET=UTF-8:https://www.youtube.com/". $this->user_social_url->youtube . "\r\n";
        }
        if ($this->user_social_url && $this->user_social_url->behance) {
            $this->vCard .= "URL;CHARSET=UTF-8:https://www.behance.com/". $this->user_social_url->behance . "\r\n";
        }
        if ($this->user_social_url && $this->user_social_url->whatsapp) {
            $this->vCard .= "URL;CHARSET=UTF-8:https://wa.me/". $this->user_social_url->whatsapp . "\r\n";
        }
        if ($this->user_social_url && $this->user_social_url->skype) {
            $this->vCard .= "URL;CHARSET=UTF-8:skype:". $this->user_social_url->skype . "?chat" . "\r\n";
        }
        */


        if ($this->dob) {
            $this->vCard .= "BDAY:". $this->dob . "\r\n";
        }

        if ($this->profile_pic && Storage::exists($this->profile_pic)) {
            $path = Storage::path($this->profile_pic);
            $getPhoto               = file_get_contents($path);
            $b64vcard               = base64_encode($getPhoto);
            $b64mline               = chunk_split($b64vcard,74,"\n");
            $b64final               = preg_replace('/(.+)/', ' $1', $b64mline);
            $photo                  = $b64final;

            $this->vCard .= "PHOTO;ENCODING=b;TYPE=JPEG:";
            $this->vCard .= $photo . "\r\n";
        }

        $this->vCard .= "END:VCARD";
        // dd($this);
        return $this;
    }

    public function download()
    {
        header('Content-Type: text/x-vcard');
        header('Content-Disposition: inline; filename= "'. $this->first_name . "_" . $this->last_name . "_vcard" .'.vcf"');
        echo $this->vCard;
        exit;
    }

    public function address_parts($type = 'work')
    {
        if ($type === 'home') {
            $str = $this->address_home;
        }else{
            $str = $this->address_work;
        }

        $arr = explode(";", $str);
        return $arr;
    }
}
