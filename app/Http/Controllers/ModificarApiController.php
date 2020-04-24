<?php

namespace App\Http\Controllers;

use App\Modificar;
use Illuminate\Http\Request;

class ModificarApiController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Cada respuesta regresa 20 casas

        // Solicitud de Información
        $modificados = Modificar::all();


        // Envío de respuesta
        return $modificados;
    }

    /**
     * Display a list of items depending on the search criteria.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // Search terms
        $filter = $request -> input('filtro');
        $search = $request -> input('fecha');

        // Retrieval of the data according to the search terms
        if($filter == "pendientes" || $filter == "Pendientes" || $filter == "pendiente" || $filter == "Pendiente")
        {
                $modificados = Modificar::where([
               
                ['estado','=', 'Pendiente'],
                ['fecha_hora', 'LIKE',  '%' . $search . '%']
                ])->get();
        }
        else if($filter == "terminadas" || $filter == "Terminadas" || $filter == "terminado" || $filter == "Terminado")
        {
                $modificados = Modificar::where([
               
                ['estado','=', 'Terminado'],
                ['fecha_hora', 'LIKE',  '%' . $search . '%']
                ])->get();
        } else 
        {
            return "No se encontró ningun registro";
        }
        
        // Construcción del JSON de respuesta
        $respuesta = array();
        $respuesta['modificados'] = $modificados;
        
        return $respuesta;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nuevaModificacion = new Modificar();
        $nuevaModificacion -> id_user = $request -> input('id_user');
        $nuevaModificacion -> estado = $request -> input('estado');
        $nuevaModificacion -> mantenimiento = $request -> input('mantenimiento');
        $nuevaModificacion -> modelo_switches = $request -> input('modelo_switches');
        $nuevaModificacion -> material_keycaps = $request -> input('material_keycaps');
        $nuevaModificacion -> color_keycaps = $request -> input('color_keycaps');
        $nuevaModificacion -> ubicacion = $request -> input('ubicacion');
        
        // Arma una respuesta
        $respuesta = array();
        $respuesta['exito'] = false;
        if($nuevaModificacion -> save()){
            $respuesta['exito'] = true;
        }

        // Regresa una respuesta
        return $respuesta;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modificados = Modificar::find($id);
        if($modificados){

            $respuesta = array();
            $respuesta['modificados'] = $modificados;
        }else
        $respuesta['modificados']= "no se encontro la tarea";
        return $respuesta;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $modificados = Modificar::find($id);
        $modificados -> estado = $request -> input('estado');
        $modificados -> modelo_switches = $request -> input('modelo_switches');
        $modificados -> mantenimiento = $request -> input('mantenimiento');
        $modificados -> material_keycaps = $request -> input('material_keycaps');
        $modificados -> color_keycaps = $request -> input('color_keycaps');
        $modificados -> ubicacion = $request -> input('ubicacion');

        // Arma una respuesta
        $respuesta = array();
        $respuesta['exito'] = false;
        if($modificados -> save()){
            $respuesta['exito'] = true;
        }

        // Regresa una respuesta
        return $respuesta;
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
