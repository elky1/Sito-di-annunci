<?php

namespace App\Http\Controllers;

use App\Models\Adv;
use App\Jobs\Watermark;
use App\Models\AdvImage;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Illuminate\Http\Request;
use App\Http\Requests\AdvRequest;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;

class AdvController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('show','advsByCategory','index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advs=Adv::all();
        return view('adv.index', compact('advs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories=Category::all();

        $unique_secret= $request->old('unique_secret',
        base_convert(sha1(uniqid(mt_rand())), 16, 36)
    );


        return view ('adv.create', compact('unique_secret','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvRequest $request)
    {
        // dd($request->all());
        $adv=Adv::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            //'imageName'=>time(). '.' . $image->extensione(),
            'category_id'=>$request->category_id,
            'user_id'=>Auth::id(),
            // 'unique_secret'=>$request->unique_secret,

        ]);
        // dd($request->all());

        // $adv->categories()->sync($request->categories);
        $unique_secret = $request->input('unique_secret');

        //dd($unique_secret);

        $images= session()->get("images.{$unique_secret}", []);

        $removedImages= session()->get("removedimages.{$unique_secret}", []);

        $images= array_diff($images, $removedImages);

        foreach ($images as $image){
            // $fileName= basename($image);
            // $i=AdvImage::create([
            //     'file'=>Storage::move($image, "/public/advs/{$adv->id}/{$fileName}"),
            //     'adv_id'=>$request->adv->id,
            // ]);

            $i= new AdvImage();
            $fileName= basename($image);
            $newFileName="public/advs/{$adv->id}/{$fileName}";
            Storage::move($image, $newFileName);



            $i->file= $newFileName;
            $i->adv_id= $adv->id;
            $i->save();



            GoogleVisionSafeSearchImage::withChain([
                new GoogleVisionsafeSearchImage($i->id),
                new GoogleVisionLabelImage($i->id),
                new GoogleVisionRemoveFaces($i->id),
                new ResizeImage($i->file, 267, 400),
                new ResizeImage($i->file, 390,230),
                new Watermark($i->file),
            ])->dispatch($i->d);

        }

        File::deleteDirectory(storage_path("/app/public/temp/{$unique_secret}"));

        return redirect(route('homepage'))->with('message','Hai inserito correttamente il tuo annuncio');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adv  $adv
     * @return \Illuminate\Http\Response
     */
    public function show(Adv $adv)
    {
        return view('adv.show', compact('adv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adv  $adv
     * @return \Illuminate\Http\Response
     */
    public function edit(Adv $adv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adv  $adv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adv $adv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adv  $adv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adv $adv)
    {
        //
    }

    public function advsByCategory(Category $category){
        $advs=Adv::where('is_accepted', true)->where('category_id', $category->id)->orderBy('created_at','desc')->paginate(10);
        return view('adv.adv', compact('category', 'advs'));

      }
      public function uploadImage(Request $request){

          $unique_secret= $request->input('unique_secret');

          $fileName= $request->file('file')->store("public/temp/{$unique_secret}");

          dispatch(new ResizeImage(
            $fileName,
            120,
            120
            ));
          session()->push("images.{$unique_secret}", $fileName);

          return response()->json(
             [
                 'id'=> $fileName
             ]
          );
      }

      public function removeImage(Request $request){
          $unique_secret= $request->input('unique_secret');
          $fileName= $request->input('id');
          session()->push("removedimages.{$unique_secret}", $fileName);
          Storage::delete($fileName);
          return response()->json('ok');
      }

      public function getImages(Request $request)
      {
          $unique_secret= $request->input('unique_secret');
          $images=session()->get("images.{$unique_secret}", []);
          $removedImages= session()->get("removedimages.{$unique_secret}", []);
          $images= array_diff($images, $removedImages);
          $data=[];

          foreach ($images as $image){
              $data[]= [
                  'id'=> $image,
                //   'src'=> Storage::url($image)
                'src'=> AdvImage::getUrlByFilePath($image, 120, 120)
              ];
          }

          return response()->json($data);
      }
}

