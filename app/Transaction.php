<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $from
 * @property int $to
 * @property string $amount
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property int $created_by
 * @property int $updated_by
 */
class Transaction extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['from', 'to', 'amount', 'order_id', 'status', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by'];

}
