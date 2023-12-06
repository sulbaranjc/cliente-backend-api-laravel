<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  Clients::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            //validar los datos
        // si la validacion falla, automaticamente se devuelve un error 422 y un mnsage de error
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:clientes',
            'phone_number' => 'required',
            'address' => 'required',
        ]);


        $client = new Clients();
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->email = $request->email;
        $client->phone_number = $request->phone_number;
        $client->address = $request->address;
        $client->save();
        return $client;
    }

    /**
     * Display the specified resource.
     */
    public function show(Clients $client)
    {
        return $client;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $client = Clients::find($id);
    
        if (!$client) {
            return response()->json([
                'message' => 'no se pudo realizar correctamente la operacion.'
            ], 404);
        }
    
        // Validar los datos. Si la validación falla, automáticamente se devuelve un error 422 y un mensaje de error.
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:clientes',
            'phone_number' => 'required',
            'address' => 'required',
        ]);
    
        // Actualizar el cliente con los nuevos datos.
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->email = $request->email;
        $client->phone_number = $request->phone_number;
        $client->address = $request->address;;
        $client->update(); // Puedes usar save() en lugar de update() si prefieres.
    
        return $client;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client = Clients::find($id);

        if (!$client) {
            return response()->json([
                'message' => 'no se pudo realizar correctamente la operacion'
            ], 404);
        }

        $client->delete();
        return response()->noContent();
    }
}
