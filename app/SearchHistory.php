<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $search_string
 * @property string $created_at
 */
class SearchHistory extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'search_string', 'created_at'];

}
