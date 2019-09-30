<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $item_id
 * @property string $created_at
 */
class WishList extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'wishlists';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'item_id', 'created_at'];

}
