<?php

namespace App\Http\Controllers;

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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
