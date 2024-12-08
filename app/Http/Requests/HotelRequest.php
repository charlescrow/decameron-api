<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del Hotel es requerido.',
            'name.unique' => 'El nombre del Hotel ya se encuentra registrado.',
            'city.required' => 'La ciudad es requerida',
            'number_room.required' => 'El número de habitaciones es requerido',
            'address.required' => 'La dirección es requerida',
            'nit.required' => 'El NIT es requerido'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:hotels,name',
            'city' => 'required',
            'number_room' => 'required | numeric',
            'address' => 'required',
            'nit' => 'required | numeric'
        ];
    }
}
