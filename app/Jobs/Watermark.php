<?php

namespace App\Jobs;

use Spatie\Image\Image;
use App\Models\AdvImage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class Watermark implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $path, $fileName;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filePath)
    {
        // $this->adv_image_id=$adv_image_id;
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $i=AdvImage::find($this->adv_image_id);
        // if(!$i) { return; }

        // $srcPath=file_get_contents(storage_path('/app/' . $i->file));
        // $image= Image::load($srcPath);
        // $image->watermark('resources/img/watermark.png')->watermarkOpacity(50);

        // $image->save($srcPath);

        $srcPath = storage_path() . '/app/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/' . $this->path . "/" . $this->fileName;
        Image::load($srcPath)->watermark(base_path('resources/img/watermark.png'))->save($destPath);

        $srcPath2 = storage_path() . '/app/' . $this->path . '/crop267x400_' . $this->fileName;
        $destPath2 = storage_path() . '/app/' . $this->path . "/crop267x400_" . $this->fileName;
        Image::load($srcPath2)->watermark(base_path('resources/img/watermark.png'))->save($destPath2);

        $srcPath3 = storage_path() . '/app/' . $this->path . '/crop390x230_' . $this->fileName;
        $destPath3 = storage_path() . '/app/' . $this->path . "/crop390x230_" . $this->fileName;
        Image::load($srcPath3)->watermark(base_path('resources/img/watermark.png'))->save($destPath3);
    }
}
