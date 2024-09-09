<?php

namespace App\Http\Controllers;

use App\Models\Recipient;
use Illuminate\Http\Request;

class RecipientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receiver = Recipient::all();
        return view( 'registros.RecipientData', compact('receiver') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(' registros.RecipientData ');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request -> validate([
            'nombre' => 'required|string|alpha|max:255',
            'apellido' => 'required|string|alpha|max:255',
            'document_type' => 'required|in:cc,ti,ce,pasaporte',
            'document' => 'required|string|regex:/^[0-9]{10}$/',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|regex:/^[0-9]{10}$/',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|alpha|max:255',
            'departamento' => 'required|string|alpha|max:255',
            'codigo_postal' => 'required|string|regex:/^[0-9]{6}$/'
        ]);

        $receiver = new Recipient();
        $receiver -> nombre = $validatedData['nombre'];
        $receiver -> apellido = $validatedData['apellido'];
        $receiver -> document_type = $validatedData['document_type'];
        $receiver -> document = $validatedData['document'];
        $receiver -> email = $validatedData['email'];
        $receiver -> telefono = $validatedData['telefono'];
        $receiver -> direccion = $validatedData['direccion'];
        $receiver -> ciudad = $validatedData['ciudad'];
        $receiver -> departamento = $validatedData['departamento'];
        $receiver -> codigo_postal = $validatedData['codigo_postal'];

        $receiver->id_cliente = session()->get('id_cliente');
        $receiver ->save();
        session()->forget('id_cliente');
        return 'Solicitud creada exitosamente';
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
