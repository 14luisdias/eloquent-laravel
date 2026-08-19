<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Lista os Clientes do Banco de dados
     */
    public function index(){

        $clientes = Client::with('projects')->orderBy('nome')->paginate(10);

        return view('clientes.index',[
            'clientes' => $clientes
        ]);

    }

    /**
     * Direciona para a view que tem o formularios de um novo cliente
     */
    public function create(){

        return view('clientes.create');

    }


    /**
     * salva no banco de dados os dados que vem do formulario de cadastro ou atualização de clientes
     */
    public function store(Request $request){

        $request->validate([
            'nome'=> ['required', 'min:3', 'max:100'],
            'endereco'=> ['required', 'min:3', 'max:200'],
            'descricao'=> ['required']
        ]);


        Client::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'descricao' => $request->descricao
        ]);
        
        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente cadastrado com sucesso!');

    }

    /**
     * direciona para a view que vai atualizar o registro do cliente
     * passando um id
     */
    public function edit(int $id){

        $clientes = Client::findOrFail($id);
        

        return view('clientes.update',[
            'clientes' => $clientes
        ]);
        
    }

    /**
     * direciona para a view que vai atualizar o registro do cliente
     * passando um id
     */
    public function update(Request $request, int $id){
        $request->validate([
            'nome'=> ['required', 'min:3', 'max:100'],
            'endereco'=> ['required', 'min:3', 'max:200'],
            'descricao'=> ['required']
        ]);

        $cliente = Client::findOrFail($id);
        $cliente->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'descricao' => $request->descricao
        ]);

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(int $id){

        $clientes = Client::findOrFail($id);
        $clientes->delete();

         return redirect()
         ->route('clientes.index')
         ->with('success', 'Cliente excluído com sucesso!');
    }
    
}