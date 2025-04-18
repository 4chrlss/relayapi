<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relay extends Model
{

    public $timestamps = false;

    protected $table = 'relay';

    protected $fillable = [
        'relay',
        'relay_status'
    ];

   
    // public function relayGroups()
    // {
    //     return $this->belongsToMany(RelayGroup::class, 'relay_group_relay', 'relay_id', 'relay_group_id');
    // }

    // public function groups()
    // {
    //     return $this->belongsToMany(RelayGroup::class, 'relay_group_relay');
    // }

    public function groups()
    {
        return $this->belongsToMany(RelayGroup::class, 'relay_group_relay', 'relay_id', 'group_id');
    }



}
