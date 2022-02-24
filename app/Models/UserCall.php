<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCall extends Model
{
    use HasFactory;

    public function hasData()
    {
        if (!$this->call) {
            return false;
        }else{
            return true;
        }
    }
}
