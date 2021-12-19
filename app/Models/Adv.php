<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Adv extends Model

{
    use HasFactory;
    use Searchable;

    protected $fillable=[
        'title',
        'description',
        'price',
        'category_id',
        'user_id',
        // 'unique_secret'
    ];


    public function toSearchableArray()
    {

        $array = [
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'other'=>'annuncio',


        ];



        return $array;
    }


     public function user(){
         return $this->belongsTo(User::class);
     }


    public function category(){
        return $this->belongsTo(Category::class);
    }


    static public function ToBeRevisionedCount(){
        return Adv::where('is_accepted', null)->count();
    }

    public function images(){
        return $this->hasMany(AdvImage::class);
    }


}
