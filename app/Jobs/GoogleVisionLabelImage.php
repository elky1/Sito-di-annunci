<?php

namespace App\Jobs;

use App\Models\AdvImage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use GPBMetadata\Google\Cloud\Vision\V1\ImageAnnotator;

class GoogleVisionLabelImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $adv_image_id;





    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($adv_image_id)
    {
        $this->adv_image_id=$adv_image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i=AdvImage::find($this->adv_image_id);
        if(!$i) { return; }

        $image=file_get_contents(storage_path('/app/' . $i->file));

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator=new ImageAnnotatorClient();
        $response=$imageAnnotator->labelDetection($image);
        $labels=$response->getLabelAnnotations();   

        if($labels){
            $result=[];
            foreach ($labels as $label){
                $result[]=$label->getDescription();
            }

            $i->labels=$result;
            $i->save();

        }
        $imageAnnotator->close();


        
        
    }
}
