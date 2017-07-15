<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerDetail extends Model
{

    protected $table = 'customer_details';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'first_name', 'last_name', 'birth_date'
    ];

    public function customer() {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }

}
