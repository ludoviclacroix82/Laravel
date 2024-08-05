<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInvoicesRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'ref' => 'unique:invoices,ref',
            'title' => 'required',
            'price' => 'required|min:0',
            'tva' => 'required|min:0',
            'description' => 'nullable',
            'client_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'ref'=>'The ref is required.',
            'title'=>'The title is required.',
            'price'=>'The price is required.',
            'tva'=>'The tva is required.',
            'client_id'=>'The client_id is required.',
        ];
    }
}
