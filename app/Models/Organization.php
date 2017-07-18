<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{

    protected $table = 'organizations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function customers() {
    	return $this->hasMany('App\Models\Customer', 'organization_id', 'id');
    }
}
