<?php

namespace App\Exports;

use App\Models\Transaction;
use App\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransactionsDateExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping
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

            return Transaction::query()->where('deleted_at', NULL)->whereBetween('created_at', [$this->start_date, $this->end_date]);
        } else {
            return Transaction::query()->where('to', $this->user_id)->whereBetween('created_at', [$this->start_date, $this->end_date]);
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
            $transaction->amount =$transaction->amount.' ETB',
            $transaction->status = $transaction->status,
 
        ];
    }
}
