<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Armar;

class ArmarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $armar = Armar::all();
        $argumentos = array();
        $argumentos['armar'] = $armar;
        return view('admin.armar.index', $argumentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.armar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $armar = new armar();
        $armar -> id_user = $request -> input('id_user');
        $armar -> estado = $request -> input('estado');
        $armar -> modelo_switches = $request -> input('modelo_switches');
        $armar -> material_keycaps = $request -> input('material_keycaps');
        $armar -> color_keycaps = $request -> input('color_keycaps');
        $armar -> material_carcasa = $request -> input('material_carcasa');
        $armar -> color_carcasa = $request -> input('color_carcasa');
        $armar -> ubicacion = $request -> input('ubicacion');

        
        if ($armar->save()) {

            return redirect()->route('armar.index')->with('exito', '¡La tarea ha sido guardada con éxito!');
        }

        //Aqui no se pudo guardar
        return redirect()->route('armar.index')->with('error', 'No se pudo agregar la tarea');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function show($id)
    {
        // Find primary key
        $armar = Armar::find($id);

        if($armar)
        {
            $argumentos = array();
            $argumentos['armar'] = $armar;
            return view('admin.armar.show', $argumentos);
        }

        return redirect() -> route('armar.index' -> with('failure', 'No se encontró la orden de armado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      

        public function edit($id)
    {
        // Find primary key
        $armar = Armar::find($id);

        if($armar)
        {
            $argumentos = array();
            $argumentos['armar'] = $armar;
            return view('admin.armar.edit', $argumentos);
        }

        return redirect() -> route('armar.index' -> with('failure', 'No se encontró la instalación'));
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
        // Busca un registro a partir de la llave primaria (SELECT * FROM Noticia)
        $armar = Armar::find($id);
        if($armar)
        {
            $armar -> estado = $request -> input('estado');
            $armar -> modelo_switches = $request -> input('modelo_switches');
            $armar -> material_keycaps = $request -> input('material_keycaps');
            $armar -> color_keycaps = $request -> input('color_keycaps');
            $armar -> material_carcasa = $request -> input('material_carcasa');
            $armar -> color_carcasa = $request -> input('color_carcasa');
            $armar -> ubicacion = $request -> input('ubicacion');
            
            if($armar -> save())
            {
                return redirect() -> route('armar.edit', $id) -> with('success', 'El registro de armado se actualizó exitosamente');
            }
            // If noticia can't be updated
            return redirect() -> route('armar.edit', $id) -> with('failure', 'No se pudo actualizar el registro de armado');
        }
        // If noticia isn't even found
        return redirect() -> route('armar.index') -> with('failure', 'No se encontró el registro de armado');
    }
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $armar = Armar::find($id);

        if($armar) {
            if($armar -> delete()){
                return redirect() -> route('armar.index') -> with('exito', 'Registro de armado eliminada exitosamente');
            }
            return redirect() -> route('armar.index') ->with('failure', 'No se pudo eliminar el registro de armado');
        }
        return redirect() -> route('armar.index') -> with('failure', 'No se encontró el registro de armado');  
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
        $search = $request -> input('search');

        // Retrieval of the data according to the search terms
        if($filter == "fecha")
        {
            $armar = Armar::where('fecha_hora', 'LIKE', '%' . $search . '%')->get();
        }
        else if($filter == "estado")
        {
            $armar = Armar::where('estado', 'LIKE', '%' . $search . '%')->get();
        } 
        else if($filter == "usuario")
        {
            $armar = Armar::where('id_user', 'LIKE', '%' . $search . '%')->get();
        }

        // Data arguments with which to refresh the index page
        $argumentos = array();
        $argumentos['armar'] = $armar;
        return view('admin.armar.index', $argumentos);
    }
}
