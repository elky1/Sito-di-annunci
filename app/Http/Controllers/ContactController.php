<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

     // Funzione invio mail->visualizzazione del form
     public function contactMe(){
        return view('ContactMe');
    }

    // funzione dati inviati dall'utente
    public function contactSubmit(Request $request){
    //  dd($request->all());
     
     
        // salvare dati inviati tramite form
        $user=$request->input('user_name');
        $email=$request->input('user_email');
        $message=$request->input('user_message');
        
        // compattare dati in arrey chiave/valore
        $user_contact = compact('user','message','email');
        // dd($user_contact);

        // inviare la mail
        Mail::to($email)->send(new ContactMail($user_contact));
        Mail::to('presto@presto.com')->send(new ContactMail($user_contact));

        return redirect(route('homepage'))->with('message','La tua email è stata inoltrata!');
    }
}
