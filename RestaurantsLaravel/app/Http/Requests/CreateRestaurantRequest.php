<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRestaurantRequest extends FormRequest
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

            'name' => 'required|min:5|max:50',
            'address' => 'required|min:5|max:80',
            'zip_code' => 'required|min:1|max:10',
            'town' => 'required|min:5|max:80',
            'country' => 'required|min:5|max:80',
            'description' => 'required|min:5',
            'review' => 'required|min:1|max:5',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'address.required' => 'The address is required.',
            'zip_code.required' => 'The zip code is required.',
            'town.required' => 'The town is required.',
            'country.required' => 'The country is required.',
            'description.required' => 'The description is required.',
            'review.required' => 'The review is required.',
        ];
    }
}
