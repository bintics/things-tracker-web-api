<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackingLocation extends Model
{

    protected $table = 'tracking_locations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_zone', 'alias', 'latitude', 'longitude'
    ];

    public function customer() {
    	return $this->belongsTo('App\Models\Customer', 'custumer_id');
    }
}
