<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'image' => 'image',
            'type_id' => 'required|exists:types,id',
            'technology_id' => 'exists:technologies,id'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo deve essere lungo al massimo :max caratteri',
            
            'image.image' => 'Il file deve essere un\'immagine',
            
            'type_id.required' => 'Devi selezionare il tipo',
            'type_id.exists' => 'Tipo selezionato non valido',

            'technology_id.exist' => 'Tecnologia selezionata non valida'
        ];
    }
}
