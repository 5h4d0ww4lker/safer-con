<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $merchant_id
 * @property int $user_id
 * @property int $item_id
 * @property string $price
 * @property string $toatl_amount
 * @property string $status
 * @property string $created_at
 */
class Order extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['merchant_id', 'user_id', 'item_id', 'price', 'toatl_amount', 'status', 'created_at'];

}
