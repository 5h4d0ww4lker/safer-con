<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $merchant_id
 * @property string $name
 * @property string $item_price
 * @property int $category
 * @property int $sub_category
 * @property int $brand
 * @property int $file_1
 * @property int $file_2
 * @property int $file_3
 * @property int $file_4
 * @property int $file_5
 * @property int $file_6
 * @property int $created_by
 * @property int $updated_by
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Item extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['merchant_id', 'name', 'item_price', 'category', 'sub_category', 'brand', 'file_1', 'file_2', 'file_3', 'file_4', 'file_5', 'file_6', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at'];

}
