<?php

namespace App\Http\Requests;

use App\Models\DistributionHotel;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHotelRequest extends FormRequest
{
    // Cantidad minima de habitaciones
    protected $minRooms;

    public function __construct()
    {
        parent::__construct();
        $this->minRooms = 1;
    }

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
            'number_room.min' => "El número de cuartos no puede ser inferior a los distribuidos ({$this->minRooms})",
            'address.required' => 'La dirección es requerida',
            'nit.required' => 'El NIT es requerido'
        ];
    }

    /**
     * Valida que el numero de cuartos no sea menos a los ya distribuidos.
     */
    public function minRooms()
    {
        $totalRooms = DistributionHotel::where([
            'hotel_id' =>  $this->id
        ])->sum('number_room');

        if ($totalRooms > $this->number_room) {
            return $totalRooms;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $this->minRooms = $this->minRooms() ? (int)$this->minRooms() : 1;
        return [
            'name' => 'required',
            'city' => 'required',
            'number_room' => "required|numeric|min:{$this->minRooms}",
            'address' => 'required',
            'nit' => 'required | numeric'
        ];
    }
}
