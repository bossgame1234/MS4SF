<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model {

    protected $fillable = ['mime', 'storage_path', 'status', 'filename', 'size', 'disk'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function($model)
        {
            Storage::disk($model->disk)->delete($model->storage_path);
        });
    }
}
