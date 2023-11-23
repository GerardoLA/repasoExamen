<?php

namespace App\Http\Controllers;

use App\Models\municipios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MunicipiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipios = municipios::all(); //obtiene todos los municipios de la base de datos
        return view('municipios')->with('municipios',$municipios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nombre = $request -> input('nombre');
        $gasolineras= $request -> input('numGasolineras');

        DB::table('municipios')->insert([
         "nombre"=>   $nombre ,
         "numGasolineras"=>$gasolineras
        ]);
        return redirect()->route('municipios');
    }

    /**
     * Display the specified resource.
     */
    public function show(municipios $municipios)
    {
      $municipios = municipios::All();
      return view ('municipios', ['municipios' => $municipios]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $municipioModificar = municipios::where('id', $id)->get();
        return view('modificarMunicipioFormulario')->with('municipioModificar',$municipioModificar[0]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        municipios::where('id', $request) /*ojito municipios deberia ser Municipio*/
        ->update([
            'nombre' => $request ->nombre,
            'numGasolineras' => $request->numGasolineras,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(municipios $municipio)
    {
        $municipio->delete();
        return redirect()->route('municipios');
    }
}
