<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSms extends Model
{
    use HasFactory;

    public function hasData()
    {
        if (!$this->sms) {
            return false;
        }else{
            return true;
        }
    }
}
