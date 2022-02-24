<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmail extends Model
{
    use HasFactory;

    public function hasData()
    {
        if (!$this->email) {
            return false;
        }else{
            return true;
        }
    }
}
