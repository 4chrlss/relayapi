<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelaySchedule extends Model
{
    protected $fillable = ['relay_id', 'on_time', 'off_time'];

    public function relay() {
        return $this->belongsTo(Relay::class);
    }
}

