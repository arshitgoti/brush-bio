<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWhatsapp extends Model
{
    use HasFactory;

    public function hasData()
    {
        if (!$this->whatsapp) {
            return false;
        }else{
            return true;
        }
    }
}
