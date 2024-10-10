<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title' => [
                'required',
                Rule::unique('projects')->ignore($this->project), // Ignora il record attuale nel controllo di unicità
                'max:255',
            ],
            'description' => 'required|string', // La descrizione è obbligatoria
            'url' => 'nullable|url', // L'URL è facoltativo ma deve essere valido se presente
            'image' => 'nullable|image|max:4096', // Il file è facoltativo  ma deve essere un immagine massimo di 4MB
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio.',
            'title.string' => 'Il titolo deve essere una stringa.',
            'title.max' => 'Il titolo non può superare i 255 caratteri.',
            
            'description.required' => 'La descrizione è obbligatoria.',
            'description.string' => 'La descrizione deve essere una stringa.',
            
            'url.url' => "L'URL deve essere valido.",

            'image.image' => "Devi caricare un immagine",
            'image.max' => "L'immagine deve pesare massimo 4mb",
        ];
    }
}
