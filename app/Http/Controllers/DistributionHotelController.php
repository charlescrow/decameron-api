<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDistributionHotelRequest;
use App\Http\Requests\UpdateDistributionHotelRequest;
use App\Models\AccommodationRoom;
use App\Models\DistributionHotel;
use App\Models\Hotel;
use App\Models\TypeRoom;
use Illuminate\Http\Request;

class DistributionHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DistributionHotel::with(
            'hotel',
            'typeRoom',
            'accommodationRoom'
        )->get(); 
    }

    /**
     * Registro de una nueva distribución
     * 
     * @param App\Http\Requests\DistributionHotelRequest reglas de validación
     * @return array respuesta de la petición
     */
    public function store(StoreDistributionHotelRequest $request)
    {
        $insert = DistributionHotel::create($request->all());

        // mensaje de respuesta en caso de no registrar.
        $respuesta = [
            'type' => 'error',
            'msg' =>  'Error al guardar, intenta más tarde.'
        ];

        if ($insert) {
            $respuesta = [
                'type' => 'success',
                'msg' =>  'Guardado con éxito.'
            ];
        }
        return $respuesta;
    }


    /**
     * Trae la información respecto a los 2 select requeridos.
     * 
     * @return array
     */
    public function getInfoSelect()
    {
        return [
            'type_room' => TypeRoom::get(),
            'accommodation_room' => AccommodationRoom::get(),
            'hotels' => Hotel::get()
        ];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DistributionHotel $distributionHotel)
    {
        $respuesta = [
            'type' => 'error',
            'msg' =>  'Error al cargar la información, intenta más tarde.'
        ];

        if ($distributionHotel) {
            $respuesta = [
                'type' => 'success',
                'data' =>  $distributionHotel
            ];
        }
        return $respuesta;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDistributionHotelRequest $request, DistributionHotel $distributionHotel)
    {
        return "Hola";
        $respuesta = [
            'type' => 'error',
            'msg' =>  'Error al cargar la información, intenta más tarde.'
        ];

        $update = $distributionHotel->update(['number_room' => $request->number_room]);
        if ($update) {
            $respuesta = [
                'type' => 'success',
                'msg' =>  'Actualizado con éxito.'
            ];
        }
        return $respuesta;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
