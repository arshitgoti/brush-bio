<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$path = base_path() . '/database/data/users.sql';
		$sql = file_get_contents($path);
		DB::unprepared($sql);*/

        $user = new User();
        $user->first_name= "Divyang";
        $user->last_name= "Dodiya";
        $user->email= "divyangkumardodiya@gmail.com";
        $user->profile_pic= "";
        $user->cv= "";
        $user->dob= "1997-06-16";
        $user->phone_number= "9724593798";
        $user->website= "https://swiitch.in";
        $user->instagram= "divyangdodiya";
        $user->type_of_artist= "Developer";
        $user->address_work= "";
        $user->country= "";
        $user->password= Hash::make("admin@123");
        $user->slug= "divyang-dodiya";
        $user->email_verified_at= new DateTime();
        $user->save();
    }
}
