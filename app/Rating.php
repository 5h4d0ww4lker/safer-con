<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $item_id
 * @property int $rate
 * @property int $created_at
 */
class Rating extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'item_id', 'rate', 'created_at'];

}
