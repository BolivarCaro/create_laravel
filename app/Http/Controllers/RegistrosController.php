<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class RegistrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $record = Registro::all();
        return view('registros.index', compact('record'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('registros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $record = new registro();
        $record -> nombre = $request ->input('nombre');
        $record -> apellido = $request -> input('apellido');
        $record -> edad = $request -> input('edad');
        $record -> documento = $request -> input('documento');
        $record -> email = $request -> input('email');
        if($request->hasFile('imagen')){
            $record->imagen = $request->file('imagen')->store('public/registros');
        }
        $record->save();
        return 'creado exitosamente...';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $record = Registro::find($id);
        return view('registros.show', compact('record'));

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
