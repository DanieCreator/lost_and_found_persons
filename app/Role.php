<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['title', 'description'];


    /*
    |--------------------------------------------------------------------------
    | Relationship methods / functions
    |--------------------------------------------------------------------------
    */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
