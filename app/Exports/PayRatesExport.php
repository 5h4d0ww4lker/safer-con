<?php

namespace App\Exports;

use App\Models\PayRate;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class PayRatesExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping
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

            return PayRate::query()->where('deleted_at', NULL);
        } else {
            return PayRate::query()->where('created_by', $this->user_id);
        }
    }


    public function headings(): array
    {
        return [


            'Name',
            'Percentage from Customer',
            'Percentage from Merchant',


        ];
    }

    public function map($payRate): array
    {
        return [

            $payRate->name = $payRate->name,
            $payRate->percentage_from_customer = $payRate->percentage_from_customer,
            $payRate->percentage_from_merchant = $payRate->percentage_from_merchant,
        ];
    }
}
