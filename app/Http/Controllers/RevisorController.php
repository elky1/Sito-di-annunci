<?php

namespace App\Http\Controllers;

use App\Models\Adv;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __contruct(){

        $this->middleware('auth.revisor');
    }

    public function index(){

        $adv= Adv::where('is_accepted', null)
        ->orderBy('created_at', 'desc')
        ->first();
        return view('revisor.index', compact('adv'));
    }

    private function setAccepted($adv_id, $value){

        $adv= Adv::find($adv_id);
        $adv->is_accepted= $value;
        $adv->save();
        return redirect(route('revisor.index'));
    }

    public function accept($adv_id){
        return $this->setAccepted($adv_id, true);
    }

    public function reject($adv_id){
        return $this->setAccepted($adv_id, false);
    }
}
