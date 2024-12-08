<?php

namespace App\Http\Requests;

use App\Models\DistributionHotel;
use App\Models\Hotel;
use Illuminate\Foundation\Http\FormRequest;

class DistributionHotelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validamos el Hotel de habitaciones y los restamos con la cantidad de cuartos ya distribuidos 
     * 
     * @return number habitaciones disponibles para distribuir
     */
    public function availableRooms()
    {
        $totalRooms = DistributionHotel::where(['hotel_id' => 1])->sum('number_room');
        $maxRooms = Hotel::find($this->input('hotel_id'))->number_room;
        return $maxRooms - $totalRooms;
    }

    public function messages()
    {
        $availableRooms = $this->availableRooms();
        return [
            'hotel_id.required' => 'El campo Hotel es obligatorio.',
            'hotel_id.unique' => 'La acomodación de este tipo de habitación ya existe para este Hotel',
            'accommodation_room_id.required' => 'La acomodación es obligatoria.',
            'type_room_id.required' => 'Tipo de habitación es obligatorio.',
            'number_room.max' => "Las habitaciones no deben exceder las disponibles para distribuir ({$availableRooms})"
        ];
    }

    /**
     * Validaciones para la distribución
     * 
     * No se repita el tipo y la acomodación en un mismo hotel
     * El número de habitaciones no sea mayor  a las disponibles
     *
     * @return array validaciones
     */
    public function rules(): array
    {
        return [
            'hotel_id' => 'required|unique:distribution_hotels,type_room_id,NULL,id,accommodation_room_id,' . $this->accommodation_room_id,
            'number_room' =>  "required|numeric|max:{$this->availableRooms()}",
            'type_room_id' => 'required|numeric',
            'accommodation_room_id' => 'required|numeric'
        ];
    }
}


