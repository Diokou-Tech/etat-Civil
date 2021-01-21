<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DecRequest extends FormRequest
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
            'nom' => 'bail|required|between:2,30|alpha',
            'prenom' => 'bail|required|between:2,30|string',
            'sexe' => 'bail|required|alpha',
            'lieuNaiss' => 'bail|required|between:2,40|alpha',
            'dateNaiss' => 'bail|required|date',
            'heure' => 'bail|required|',
            'CNIpere' => 'bail|numeric|nullable',
            'prenomPere' => 'bail|required|string|between:2,30',
            'CNImere' => 'bail|numeric|nullable|nullable',
            'nomMere' => 'bail|required|alpha|between:2,30',
            'prenomMere' => 'bail|required|string|between:2,30',
            'jugement' => 'bail|numeric|nullable',
            'bulletin' => 'bail|file|required|',
            'CNIdeclarant' => 'bail|numeric|required',
            'nomDeclarant' => 'bail|required|between:2,30|alpha',
            'prenomDeclarant' => 'bail|required|between:2,30|string',

        ];
    }
}
