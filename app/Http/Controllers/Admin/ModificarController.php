<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Modificar;

class ModificarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modificar = Modificar::all();
        $argumentos = array();
        $argumentos['modificar'] = $modificar;
        return view('admin.modificar.index', $argumentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modificar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modificar = new Modificar();
        $modificar -> id_user = $request -> input('id_user');
        $modificar -> estado = $request -> input('estado');
        $modificar -> mantenimiento = $request -> input('mantenimiento');
        $modificar -> modelo_switches = $request -> input('modelo_switches');
        $modificar -> material_keycaps = $request -> input('material_keycaps');
        $modificar -> color_keycaps = $request -> input('color_keycaps');
        $modificar -> ubicacion = $request -> input('ubicacion');

        
        if ($modificar->save()) {

            return redirect()->route('modificar.index')->with('exito', '¡La tarea ha sido guardada con éxito!');
        }

        //Aqui no se pudo guardar
        return redirect()->route('modificar.index')->with('error', 'No se pudo agregar la tarea');
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
        $modificar = Modificar::find($id);

        if($modificar)
        {
            $argumentos = array();
            $argumentos['modificar'] = $modificar;
            return view('admin.modificar.show', $argumentos);
        }

        return redirect() -> route('modificar.index' -> with('failure', 'No se encontró la orden de mantenimiento'));
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
        $modificar = Modificar::find($id);

        if($modificar)
        {
            $argumentos = array();
            $argumentos['modificar'] = $modificar;
            return view('admin.modificar.edit', $argumentos);
        }

        return redirect() -> route('modificar.index' -> with('failure', 'No se encontró la orden de matenimiento'));
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
        $modificar = Modificar::find($id);
        if($modificar)
        {
           
            $modificar -> id_user = $request -> input('id_user');
            $modificar -> estado = $request -> input('estado');
            $modificar -> mantenimiento = $request -> input('mantenimiento');
            $modificar -> modelo_switches = $request -> input('modelo_switches');
            $modificar -> material_keycaps = $request -> input('material_keycaps');
            $modificar -> color_keycaps = $request -> input('color_keycaps');
            $modificar -> ubicacion = $request -> input('ubicacion');
            
            if($modificar -> save())
            {
                return redirect() -> route('modificar.edit', $id) -> with('success', 'El registro de mantenimiento se actualizó exitosamente');
            }
            // If noticia can't be updated
            return redirect() -> route('modificar.edit', $id) -> with('failure', 'No se pudo actualizar el registro de armado');
        }
        // If noticia isn't even found
        return redirect() -> route('modificar.index') -> with('failure', 'No se encontró el registro de armado');
    }
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $modificar = Modificar::find($id);

        if($modificar) {
            if($modificar -> delete()){
                return redirect() -> route('modificar.index') -> with('exito', 'Registro de armado eliminada exitosamente');
            }
            return redirect() -> route('modificar.index') ->with('failure', 'No se pudo eliminar el registro de armado');
        }
        return redirect() -> route('modificar.index') -> with('failure', 'No se encontró el registro de armado');  
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
            $modificar = Modificar::where('fecha_hora', 'LIKE', '%' . $search . '%')->get();
        }
        else if($filter == "estado")
        {
            $modificar = Modificar::where('estado', 'LIKE', '%' . $search . '%')->get();
        } 
        else if($filter == "usuario")
        {
            $modificar = Modificar::where('id_user', 'LIKE', '%' . $search . '%')->get();
        }

        // Data arguments with which to refresh the index page
        $argumentos = array();
        $argumentos['modificar'] = $modificar;
        return view('admin.modificar.index', $argumentos);
    }
}
