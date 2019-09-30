<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $item_id
 * @property string $description
 * @property string $created_at
 */
class Reveiew extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'reviews';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'item_id', 'description', 'created_at'];

}
