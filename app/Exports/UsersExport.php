<?php

namespace App\Exports;

use App\Models\UserViewProfile;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromQuery,WithHeadings
{
    use Exportable;
    public function __construct($selectedRows)
    {
        $this->selectedRows = $selectedRows;
        //dd($this->selectedRows);
    }

    public function headings():array{
        return[
            '#Id',
            'Email',

        ];
    }
    public function query()
    {
        return UserViewProfile::whereIn('id', $this->selectedRows)->select('id','email');
    }
    // // public function collection()
    // // {
    // //     return UserViewProfile::all();
    // // }
}
