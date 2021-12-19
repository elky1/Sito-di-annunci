<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=> 'required|min:10',
            'description'=> 'required|min:5|max:500',
            'category_id'=> 'required',
            'price'=> 'required|numeric',

        ];
    }

    public function messages(){
        return [
            'title.required' => "Inserisci il titolo dell'annuncio",
            'title.min' => "Il titolo deve esser di almeno 10 caratteri",
            'description.required' => "Inserisci la descrizione dell'annuncio",
            'description.min' => "La descrizione deve esser di almeno 5 caratteri",
            'description.max' => "La descrizione deve esser di massimo 500 caratteri",
            'category_id.required' => "Seleziona la categoria dell'annuncio",
            'price.required' => "Inserisci il prezzo dell'annuncio",
            'price.numeric' => "Il prezzo deve essere espresso in numeri",

        ];
    }
}
