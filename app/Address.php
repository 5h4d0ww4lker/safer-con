<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $phone_number_1
 * @property string $phone_number_2
 * @property string $city
 * @property string $sub_city
 * @property string $location
 * @property string $building
 * @property int $created_by
 * @property int $updated_by
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Address extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['phone_number_1', 'phone_number_2', 'region','city', 'sub_city', 'location', 'building', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at'];

 
}
