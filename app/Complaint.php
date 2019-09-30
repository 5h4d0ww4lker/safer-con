<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $merchant_id
 * @property string $title
 * @property string $description
 * @property string $status
 * @property string $created_at
 * @property int $updated_at
 * @property int $updated_by
 */
class Complaint extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'merchant_id', 'title', 'description', 'status', 'created_at', 'updated_at', 'updated_by'];

}
