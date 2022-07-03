<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'name', 'email', 'password', 'phone_number', 'national_identification_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profilePicture()
    {
        return is_null($this->file)
            ? 'https://ui-avatars.com/api/?background=random&size=256&name=' . Str::of($this->name)->replace(' ', '+')
            : Storage::disk('public')->url($this->file->path);
    }

    public function officer()
    {
        return $this->hasOne(Officer::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function reports()
    {
        return $this->belongsToMany(Report::class)
            ->withTimestamps();
    }

    /**
     * User file realtionship
     */
    public function file()
    {        
        return $this->morphOne(File::class, 'fileable');

    }

    /**
     * User Role Query Scope
     */
    public function scopeGroup($query, ?Role $role = null)
    {
        if(!is_null($role)) return $query->where('role_id', $role->id);

        return $query->whereNull('role_id');
    }
    
}
