<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;

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
    public function store(HotelRequest $request)
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
