<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Cliente::all();
        return view('registros.CustomerData', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('registros.CustomerData');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|alpha|max:255',
            'apellido' => 'required|string|alpha|max:255',
            'document_type' => 'required|in:cc,ti,ce,pasaporte',
            'document' => 'required|string|regex:/^[0-9]{8,10}$/',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|regex:/^\+?[0-9]{10}$/',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|alpha|max:255',
            'departamento' => 'required|string|alpha|max:255',
            'codigo_postal' => 'required|string|regex:/^[0-9]{6}$/',
            'fecha_recoleccion' => 'required|date|after_or_equal:today',
            'hora_recogida' => 'required|in:manana,tarde',
            'observaciones' => 'nullable|string|max:500',
        ]);

        $customer = new Cliente();
        $customer->nombre = $validatedData['nombre'];
        $customer->apellido = $validatedData['apellido'];
        $customer->document_type = $validatedData['document_type'];
        $customer->document = $validatedData['document'];
        $customer->email = $validatedData['email'];
        $customer->telefono = $validatedData['telefono'];
        $customer->direccion = $validatedData['direccion'];
        $customer->ciudad = $validatedData['ciudad'];
        $customer->departamento = $validatedData['departamento'];
        $customer->codigo_postal = $validatedData['codigo_postal'];
        $customer->fecha_recoleccion = $validatedData['fecha_recoleccion'];
        $customer->hora_recogida = $validatedData['hora_recogida'];
        $customer->observaciones = $validatedData['observaciones'];

        $customer -> fill($validatedData);
        $customer->save();

        session() -> put( 'id_cliente', $customer -> id );


        return redirect()->route('RecipientData.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
