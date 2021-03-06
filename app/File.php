<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    protected $fillable = [
        'fileable_id', 'fileable_type', 'filename', 'size',
    ];

    public function fileable() {
        return $this->morphTo();
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::deleting(function($file) {
            $full_size_dir = storage_path('app/public/');
            $fileDir = $full_size_dir.$file->filename;
            unlink($fileDir);
        });
    }
}