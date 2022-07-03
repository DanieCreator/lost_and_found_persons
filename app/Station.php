<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = ['name', 'location', 'lat', 'lng'];


    public function officers()
    {
        return $this->hasMany(Officer::class);
    }

    /**
     * Helper and Util methods
     */

    public function path(string $group): string
    {
        return "/$group/stations/" . $this->id;
    }
}
