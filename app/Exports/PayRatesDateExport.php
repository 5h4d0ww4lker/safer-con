<?php

namespace App\Exports;

use App\Models\PayRate;
use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class PayRatesDateExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping
{
    use Exportable;

    public function __construct(string $start_date = null, string $end_date = null, $user_id)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->user_id = $user_id;
    }

    public function query()
    {
        $user = User::find($this->user_id);

        $access_label = $user->access_label;

        if ($access_label == 1) {

            return PayRate::query()->where('deleted_at', NULL)->whereBetween('created_at', [$this->start_date, $this->end_date]);
        } else {
            return PayRate::query()->where('created_by', $this->user_id)->whereBetween('created_at', [$this->start_date, $this->end_date]);
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
