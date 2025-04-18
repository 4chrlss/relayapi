<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelayGroup extends Model
{
    protected $fillable = ['group_name'];

   
    public function relay()
    {
         return $this->belongsToMany(Relay::class, 'relay_group_relay'); //, 'relay_group_id', 'relay_id'
    }

    // public function relays()
    // {
    //     return $this->belongsToMany(Relay::class, 'relay_group_relay', 'group_id', 'relay_id');
    // }


}

