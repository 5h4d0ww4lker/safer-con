<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Item;
use App\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping
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

            return Order::query()->where('user_id','!=', '0');
        } else {
            return Order::query()->where('merchant_id', $this->user_id);
        }
    }


    public function headings(): array
    {
        return [


            'Merchant Name',
            'Customer Name',
            'Item',
            'Quantity',
            'Total Price',
            'Created By',

        ];
    }

    public function map($order): array
    {
        return [
            $order->merchant_name = User::find($order->merchant_id)->name . ' ' . User::find($order->merchant_id)->father_name,
            $order->customer_name = User::find($order->user_id)->name . ' ' . User::find($order->user_id)->father_name,
            $order->order = Item::find($order->item_id)->name,
            $order->order = $order->toatl_amount . ' ETB',
            $order->status = $order->status

        ];
    }
}
