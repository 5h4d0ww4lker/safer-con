<?php

namespace App\Exports;

use App\Models\Transaction;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransactionsExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping
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

            return Transaction::query()->where('deleted_at', NULL);
        } else {
            return Transaction::query()->where('created_by', $this->user_id);
        }
    }


    public function headings(): array
    {
        return [


            'From',
            'To',
            'Amount',
            'Status',


        ];
    }

    public function map($transaction): array
    {
        return [

            $transaction->from = User::find($transaction->from)->name . '' . User::find($transaction->from)->father_name,
            $transaction->to = User::find($transaction->to)->name . '' . User::find($transaction->to)->father_name,
            $transaction->amount = $transaction->amount.' ETB',
            $transaction->status = $transaction->status,

        ];
    }
}
