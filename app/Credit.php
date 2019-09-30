<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $amount
 * @property int $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property int $created_by
 * @property int $updated_by
 */
class Credit extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['amount', 'user_id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by'];

}
