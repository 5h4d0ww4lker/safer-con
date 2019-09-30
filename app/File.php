<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $path
 * @property int $created_by
 * @property int $updated_by
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class File extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['path', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at'];

}
