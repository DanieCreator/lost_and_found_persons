<?php

namespace App;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    
    protected $fillable = [
        'fileable_id',
        'fileable_type',
        'path',
        'thumb_path',
        'description'
    ];

    public function fileable()
    {
        return $this->morphTo();
    }

    /*
    |--------------------------------------------------------------------------
    | File Utility Functions
    |--------------------------------------------------------------------------
    | Helper functions for the file class
    |
    */
    public function deleteFile()
    {
        if(!is_null($this->path)){
            if(Storage::disk('public')->exists($this->path)){
                Storage::disk('public')->delete($this->path);
            }
        }

        if(!is_null($this->thumb_path)){
            if(Storage::disk('public')->exists($this->thumb_path)){
                Storage::disk('public')->delete($this->thumb_path);
            }
        }
    }

}
