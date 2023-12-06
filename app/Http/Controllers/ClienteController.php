<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Muestra una lista de clientes.
     */
    public function index()
    {
        return  Cliente::all();
    }

    /**
     * Almacena un cliente recién creado en la base de datos.
     */
    public function store(Request $request)
    {
        //validar los datos
        // si la validacion falla, automaticamente se devuelve un error 422 y un mnsage de error
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:clientes',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);


        $cliente = new Cliente();
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->save();
        return $cliente;
    }

    /**
     * Muestra el cliente especificado.
     */
    public function show(Cliente $cliente)
    {
        return $cliente;
    }

    /**
     * Actualiza el cliente especificado en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
    
        if (!$cliente) {
            return response()->json([
                'message' => 'no se pudo realizar correctamente la operacion.'
            ], 404);
        }
    
        // Validar los datos. Si la validación falla, automáticamente se devuelve un error 422 y un mensaje de error.
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            // La regla "unique" se modifica para excluir el id del cliente actual de la verificación de unicidad
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'telefono' => 'required',
            'direccion' => 'required',
        ]);
    
        // Actualizar el cliente con los nuevos datos.
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->update(); // Puedes usar save() en lugar de update() si prefieres.
    
        return $cliente;
    }
    
    /**
     * 
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json([
                'message' => 'no se pudo realizar correctamente la operacion'
            ], 404);
        }

        $cliente->delete();
        return response()->noContent();
    }
}
