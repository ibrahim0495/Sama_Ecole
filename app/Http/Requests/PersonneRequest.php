<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonneRequest extends FormRequest
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
            'nom' => 'required|min:2',
            'prenom' => 'required|min:2',
            'adresse' => 'required',
            'telephone' => 'required|starts_with:30,33,70,75,76,77,78|numeric|digits:9|unique:personnes,telephone',
            'email' => 'required|email|unique:personnes,email',
            'status'=>''
        ];
    }
}
