<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoPizza;

class TipoPizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $tipo = TipoPizza::create([
                'tipo' => $data['name'],
                'categoria' => $data['categotia'],
            ]);

            return[
            'status' => 200,
            'menssagem' => 'Usuário cadastrado com sucesso!!',
            'tipo' => $tipo
            ];
        } catch (\Exception $e) {
            return [
                'status' => 400,
                'menssagem' => 'Erro ao atualizar usuário!!',
                'error' => $e->getMessage()
            ];
        }
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
