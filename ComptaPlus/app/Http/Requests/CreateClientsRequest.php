<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string=>, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company'=>'required|min:1|max:80',
            'phone'=>'required',
            'email'=>'required|email|max:255',
            'address'=>'required|min:1|max:100',
            'tva'=>'required',
        ];
    }

    public function messages(){
        return [
            'company'=>'The company is required.',
            'phone'=>'The phone is required.',
            'email'=>'The email is required.',
            'address'=>'The address is required.',
            'tva'=>'The tva is required.',
        ];
    }
}
