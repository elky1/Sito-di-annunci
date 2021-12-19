<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdvImage extends Model
{
    use HasFactory;

    protected $casts = [
        'labels'=>'array',
    ];

    public function adv(){

        return $this->belongsTo(Adv::class);
    }

    static public function getUrlByFilePath($filePath, $w = null, $h = null){
        if (!$w && !$h){
            return Storage::url($filePath);
        }

        $path = dirname($filePath);
        $filename =basename($filePath);

        $file = "{$path}/crop{$w}x{$h}_{$filename}";

        return Storage::url($file);
    }

    public function getUrl($w = null, $h = null){
        return AdvImage::getUrlByFilePath($this->file, $w, $h);
    }
}
