<?php

namespace App\Http\Controllers;

use App\Models\Adv;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    Public function search(Request $request){
        $q=$request->input('q');
        $advs_unfiltered=Adv::search($q)->get();

        $advs= $advs_unfiltered->where('is_accepted', true);
        return view('search.index' , compact('q','advs'));

    }
}
