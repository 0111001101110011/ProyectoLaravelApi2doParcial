<?php

namespace App\Http\Controllers;

use App\Armar;
use Illuminate\Http\Request;

class ArmarApiController extends Controller
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
        $armados = Armar::all();


        // Envío de respuesta
        return $armados;
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
            $armados = Armar::where([
                ['id_user','=', $request->user()->id],
                ['estado','=', 'Pendiente'],
                ['fecha_hora', 'LIKE',  '%' . $search . '%']
                ])->get();
        }
        else if($filter == "terminadas" || $filter == "Terminados" || $filter == "terminado" || $filter == "Terminado")
        {
            $armados = Armar::where([
                ['id_user','=', $request->user()->id],
                ['estado','=', 'Terminado'],
                ['fecha_hora', 'LIKE',  '%' . $search . '%']
                ])->get();
        } else 
        {
            return "No se encontró ningun registro";
        }
        
        // Construcción del JSON de respuesta
        $respuesta = array();
        $respuesta['armados'] = $armados;
        
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
        $nuevoArmado = new Armar();
        $nuevoArmado -> id_user = $request -> input('id_user');
        $nuevoArmado -> estado = $request -> input('estado');
        $nuevoArmado -> modelo_switches = $request -> input('modelo_switches');
        $nuevoArmado -> material_keycaps = $request -> input('material_keycaps');
        $nuevoArmado -> color_keycaps = $request -> input('color_keycaps');
        $nuevoArmado -> material_carcasa = $request -> input('material_carcasa');
        $nuevoArmado -> color_carcasa = $request -> input('color_carcasa');
        $nuevoArmado -> ubicacion = $request -> input('ubicacion');
        
        // Arma una respuesta
        $respuesta = array();
        $respuesta['exito'] = false;
        if($nuevoArmado -> save()){
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
        $armados = Armar::find($id);
        if($armados){

            $respuesta = array();
            $respuesta['armados'] = $armados;
        }else
        $respuesta['armados']= "no se encontro la tarea";
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
        $armados = Armar::find($id);
        $armados -> estado = $request -> input('estado');
        $armados -> modelo_switches = $request -> input('modelo_switches');
        $armados -> material_keycaps = $request -> input('material_keycaps');
        $armados -> color_keycaps = $request -> input('color_keycaps');
        $armados -> material_carcasa = $request -> input('material_carcasa');
        $armados -> color_carcasa = $request -> input('color_carcasa');
        $armados -> ubicacion = $request -> input('ubicacion');

        // Arma una respuesta
        $respuesta = array();
        $respuesta['exito'] = false;
        if($armados -> save()){
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
