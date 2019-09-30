<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $item_id
 * @property string $description
 * @property string $stock
 * @property string $size
 * @property string $color
 * @property string $additional_info
 * @property int $created_by
 * @property int $updated_by
 * @property string $updated_at
 * @property string $deleted_at
 * @property string $created_at
 */
class ItemDetail extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['item_id', 'description', 'stock', 'size', 'color', 'additional_info', 'created_by', 'updated_by', 'updated_at', 'deleted_at', 'created_at'];

}
