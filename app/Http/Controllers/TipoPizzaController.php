<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoPizzaRequest;
use App\Models\TipoPizza;
use Illuminate\Http\Request;



class TipoPizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizza = TipoPizzaRequest::select('id', 'sabor', 'tamanho', 'tipo', 'preco' )->paginate('2');

        return [
            'status' => 200,
            'menssagem' => 'Pizzas encontradas',
            'pizza' => $pizza
        ];
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
            $pizza = $request->all();
            $pizza = TipoPizza::create([
                'sabor' => $pizza['sabor'],
                'tamanho' => $pizza['tamanho'],
                'tipo' => $pizza['tipo'],
                'preco' => $pizza['preco'],
            ]);

            return[
            'status' => 200,
            'menssagem' => 'Pizza Cadastrada com sucesso sucesso!!',
            'pizza' => $pizza
            ];
        } catch (\Exception $e) {
            return [
                'status' => 400,
                'menssagem' => 'Erro ao atualizar a pizza!!',
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try  {
            $pizza = TipoPizza::findOrFail($id);
            return [$pizza];
    } catch (\Exception $e) {  
        return [
        'status' => 400,
        'menssagem' => 'Pizza nao encontrada!!',
        'error' => $e->getMessage()
        ];
     }
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
        try {
            $data = $request->all();

            $pizza = TipoPizza::find($id);

            $pizza->update([
                'sabor' => $data['sabor'],
                'tamanho' => $data['tamanho'],
                'tipo' => $data['tipo']
            ]);
            return [
                'status' => 200,
                'menssagem' => 'Pizza atualizada com sucesso sucesso!!',
                'pizza' => $pizza
            ];
        }  catch (\Exception $e) {
        return [
            'status' => 400,
            'menssagem' => 'Erro ao atualizar pizza!!',
            'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         //
         try {
            $pizza = TipoPizza::find($id);

            $pizza->delete();

            return [
                'status' => 200,
                'menssagem' => 'Pizza deletada com sucesso!!',
                'pizza' => $pizza
            ];
        } catch (\Exception $e) {
            return [
                'status' => 400,
                'menssagem' => 'Erro ao deletar usuário!!',
                'error' => $e->getMessage()
            ];
        }
    }
}
