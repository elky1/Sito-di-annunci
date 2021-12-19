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

class GoogleVisionSafeSearchImage implements ShouldQueue
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
        $response=$imageAnnotator->safeSearchDetection($image);
        $imageAnnotator->close();

        $safe=$response->getSafeSearchAnnotation();

        $adult=$safe->getAdult();
        $medical=$safe->getMedical();
        $spoof=$safe->getSpoof();
        $violence=$safe->getViolence();
        $racy=$safe->getRacy();

        // echo json_encode([$adult , $medical , $spoof , $violence , $racy]);

        $likelihoodName=[
            'UNKNOWN' , 'VERY_UNLIKELY' , 'UNLIKELY' , 'POSSIBLE' , 'LIKELY' , 'VERY_LIKELY'
        ];

        $i->adult = $likelihoodName[$adult];
        $i->medical = $likelihoodName[$medical];
        $i->spoof = $likelihoodName[$spoof];
        $i->violence = $likelihoodName[$violence];
        $i->racy = $likelihoodName[$racy];

        $i->save();



        
        
    }
}
