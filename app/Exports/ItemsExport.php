<?php

namespace App\Exports;

use App\Models\Item;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class ItemsExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping
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

            return Item::query()->where('deleted_at', NULL);
        } else {
            return Item::query()->where('created_by', $this->user_id);
        }
    }


    public function headings(): array
    {
        return [


            'Item Name',
            'Price',
            'Category',
            'Sub Category',
            'Brand',
            'Created By',


        ];
    }

    public function map($item): array
    {
        return [

            $item->name = $item->name,
            $item->item_price = $item->item_price.' ETB',
            $item->category = Category::find($item->category_id)->name,
            $item->sub_category = SubCategory::find($item->sub_category_id)->name,
            $item->brand = Brand::find($item->brand_id)->name,
            $item->created_by = User::find($item->created_by)->name . '' . User::find($item->created_by)->father_name,





        ];
    }
}
