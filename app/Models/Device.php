<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{

    protected $table = 'devices';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'alias', 'serial_device'
    ];

    public function customer() {
        return $this->belongsTo('App\Models\Customer', 'custumer_id');
    }
}
