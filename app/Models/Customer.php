<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{

    protected $table = 'customers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'available', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function organization() {
        return $this->belongsTo('App\Models\Organization', 'organization_id');
    }

    public function locations() {
        return $this->hasMany('App\Models\TrackingLocation', 'customer_id', 'id');
    }

    public function devices() {
        return $this->hasMany('App\Models\Device', 'customer_id', 'id');
    }

    public function details() {
        return $this->hasOne('App\Models\CustomerDetail', 'customer_id', 'id');
    }

}
