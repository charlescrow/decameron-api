<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Index de hoteles, con listado.
     */
    public function index()
    {
       return Hotel::get();
    }

    /**
     * Registro de un nuevo hotel
     * 
     * @param App\Http\Requests\HotelRequest $request formRequest
     * @return array mensaje de retorno
     */
    public function store(StoreHotelRequest $request)
    {
        $insert = Hotel::create($request->all());

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
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        $respuesta = [
            'type' => 'error',
            'msg' =>  'Error al cargar la información, intenta más tarde.'
        ];

        if ($hotel) {
            $respuesta = [
                'type' => 'success',
                'data' =>  $hotel
            ];
        }
        return $respuesta;
    }

    /**
     * Actualización del Hotel
     * 
     * @param App\Models\Hotel 
     * @return 
     */
    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        $respuesta = [
            'type' => 'error',
            'msg' =>  'Error al cargar la información, intenta más tarde.'
        ];

        $update = $hotel->update($request->except('id'));
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
