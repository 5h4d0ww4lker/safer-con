<?php

namespace App\Exports;

use App\Models\Credit;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class CreditsExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping
{
    use Exportable;

    public function __construct($user_id)
    {

        $this->user_id = $user_id;
    }

    public function query()
    {
        $user = User::find($this->user_id);

        $access_label = $user->access_label;

        if ($access_label == 1) {

            return Credit::query()->where('deleted_at', NULL);
        } else {
            return Credit::query()->where('created_by', $this->user_id);
        }
    }


    public function headings(): array
    {
        return [


            'User Name',
            'Amount',
            'Amount On Hold',
           

        ];
    }

    public function map($credit): array
    {
        return [

            $credit->name = User::find($credit->created_by)->name . '' . User::find($credit->created_by)->father_name,
            $credit->amount = $credit->amount.' ETB',
            $credit->on_hold = $credit->on_hold.' ETB',





        ];
    }
}
