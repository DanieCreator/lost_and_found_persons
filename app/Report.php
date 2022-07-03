<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;
    use Searchable;

    protected $fillable = [
        'officer_id',
        'station_id',
        'person_name',
        'person_national_identification_number',
        'person_birth_certificate_number',
        'person_passport_number',
        'person_phone_number',
        'person_date_of_birth',
        'extra_items',
        'last_seen',
        'last_seen_place',
        'last_seen_with',
        'solved'
    ];

    protected $casts = [
        'last_seen_with' => 'array',
        'extra_items' => 'array',
        'last_seen' => 'date'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->as('observers')
            ->withTimestamps();
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }
}
