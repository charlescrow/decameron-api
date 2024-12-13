<?php

namespace App\Http\Requests;

use App\Models\DistributionHotel;
use App\Models\Hotel;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDistributionHotelRequest extends FormRequest
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
        $totalRooms = DistributionHotel::where('hotel_id', $this->hotel_id)
            ->where('id', '!=', $this->id)
            ->sum('number_room');

        $maxRooms = Hotel::find($this->input('hotel_id'))->number_room;

        return $maxRooms - $totalRooms;
    }

    public function messages()
    {
        $availableRooms = $this->availableRooms();
        return [
            'number_room.max' => "Las habitaciones no deben exceder las disponibles para distribuir ({$availableRooms})"
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
            'number_room' => "required|numeric|max:{$this->availableRooms()}",
        ];
    }
}
