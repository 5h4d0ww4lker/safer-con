<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditRequest extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'credit_requests';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'user_id',
                  'amount',
                  'bank_id',
                  'transaction_id',
                  'status',
                  'created_by',
                  'updated_by'
                
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the user for this model.
     *
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    /**
     * Get the bank for this model.
     *
     * @return App\Models\Bank
     */
    public function bank()
    {
        return $this->belongsTo('App\Models\Bank','bank_id');
    }

    /**
     * Get the transaction for this model.
     *
     * @return App\Models\Transaction
     */
    public function transaction()
    {
        return $this->belongsTo('App\Models\Transaction','transaction_id');
    }

    /**
     * Get the creator for this model.
     *
     * @return App\User
     */
    public function creator()
    {
        return $this->belongsTo('App\User','created_by');
    }

    /**
     * Get the updater for this model.
     *
     * @return App\User
     */
    public function updater()
    {
        return $this->belongsTo('App\User','updated_by');
    }

   


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

 

}
