<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $merchant_id
 * @property int $user_id
 * @property int $item_id
 * @property string $price
 * @property string $status
 * @property string $created_at
 */
class ShoppingCart extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['merchant_id', 'user_id', 'item_id', 'price', 'status', 'created_at'];

}
