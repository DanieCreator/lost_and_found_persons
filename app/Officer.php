<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    protected $fillable = ['user_id', 'station_id', 'creator_id', 'ocs', 'officer_number'];

    /*
    *
    * Relationships
    *
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    /*
    *
    * Utilities
    *
    */
    public function path(string $group): string
    {
        return "/$group/officers/" . $this->id;
    }
}
