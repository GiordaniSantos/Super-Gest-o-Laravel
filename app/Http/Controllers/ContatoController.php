<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', [
            'motivo_contatos' => $motivo_contatos
        ]);
    }

    public function salvar(Request $request){
        //realizar a validação dos dados do formulário recebidos no request
        $regras = [
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required'
        ];

        $feedback = [
            'nome.required' => 'O campo nome precisa ser preenchido!',
            'email.email' => 'O email informado não é válido!',
            'motivo_contatos_id.required' => 'O campo motivo do contato precisa ser preenchido!',
            'required' => 'O campo :attribute deve ser preenchido!'
        ];

        $request->validate($regras , $feedback);
        
        Contato::create($request->all());

        return redirect()->route('site.index');
        /* um método
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        */

        // método com a variavel fillable no model
        //$contato->create($request->all());
    }
}
