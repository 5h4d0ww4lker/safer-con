<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $default_image
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property int $created_by
 * @property int $updated_by
 */
class SubCategory extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['category_id', 'name', 'default_image', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by'];

}