<?php

namespace App\Exports;

use App\Models\Credit;
use App\User;


class CreditsDateExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping
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

            return Credit::query()->where('deleted_at', NULL)->whereBetween('created_at', [$this->start_date, $this->end_date]);
        } else {
            return Credit::query()->where('created_by', $this->user_id)->whereBetween('created_at', [$this->start_date, $this->end_date]);
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
            $credit->name = User::find($credit->created_by)->name . ' ' . User::find($credit->created_by)->father_name,
            $credit->amount = $credit->amount.' ETB',
            $credit->on_hold = $credit->on_hold.' ETB',
           





        ];
    }
}
