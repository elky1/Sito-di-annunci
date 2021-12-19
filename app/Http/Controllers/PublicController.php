<?php

namespace App\Http\Controllers;

use App\Models\Adv;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage(){

       $advs = Adv::where('is_accepted', true)->orderBy('created_at', 'desc' )->take(5)->get();
        $categories=Category::all();

        return view('welcome', compact('advs' , 'categories'));

    }

    public function locale($locale){
        session()->put('locale',$locale);
        return redirect()->back();
    }


}
