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

   { //validaciones
    $validatedData = $request->validate([
        'nombre' => 'required|string|alpha|max:255',
        'apellido' => 'required|string|alpha|max:255',
        'edad' => 'required|integer|min:18|max:100',
        'documento' => 'required|string|regex:/^[0-9]{8,10}$/',
        'email' => 'required|email|max:255',
        'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

    ]);

        $record = new registro();
        $record -> nombre = $validatedData[ 'nombre' ];
        $record -> apellido = $validatedData[ 'apellido' ];
        $record -> edad = $validatedData[ 'edad' ];
        $record -> documento = $validatedData[ 'documento' ];
        $record -> email = $validatedData[ 'email' ];

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
        $record = Registro::find($id);
        return view('registros.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
        {
            $record = Registro::find($id);

            //validaciones
            $validatedData = $request->validate([
                'nombre' => 'required|string|alpha|max:255',
                'apellido' => 'required|string|alpha|max:255',
                'edad' => 'required|integer|min:18|max:100',
                'documento' => 'required|string|regex:/^[0-9]{8,10}$/',
                'email' => 'required|email|max:255',
                'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            //rellenar los datos validos
            $record->fill($validatedData);

            //Encontrar registro a actuaizar
            $record->nombre = $validatedData['nombre'];
            $record->apellido = $validatedData['apellido'];
            $record->edad = $validatedData['edad'];
            $record->documento = $validatedData['documento'];
            $record->email = $validatedData['email'];

            if ($request->hasFile('imagen')) {
                $record->imagen = $request->file('imagen')->store('public/registros');
            }
            //guardar los cambios
            $record -> save();

            return redirect()->route( 'registro.index' )->with('success', 'Registro actualizado correctamente');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = Registro::find($id);
        if(!$record){
            return redirect()->route('registro.index')->with('error', 'Registro no encontrado.');

        }
        $record->delete();
        return redirect()->route('registro.index')->with('success', 'Registro eliminado correctamente.');
    }
}
