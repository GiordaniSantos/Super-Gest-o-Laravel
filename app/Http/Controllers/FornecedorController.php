<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('admin.fornecedor.index');
    }

    public function listar(Request $request){

        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->paginate(1);



        return view('admin.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request){

        $msg = '';

        //inclusao
        if($request->input('_token') != '' && $request->input('id') == ''){
            //validacao
            $regras = [
                'nome' => 'required',
                'site' => 'required',
                'uf' => 'required',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'email' => 'email inválido'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();

            //vai preencher o objeto de acordo com a variavel fillable no model
            $fornecedor->create($request->all());
            $msg = "Cadastro realizado com sucesso!";
        }

        //edicao
        if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                $msg = 'Atualização realizada com sucesso!';
            }else{
                $msg = "Erro na atualização!";
            }

            return redirect()->route('admin.fornecedor.editar', ['id' => $fornecedor->id, 'msg' => $msg]);
        }

        return view('admin.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = ''){
        $fornecedor = Fornecedor::find($id);

        return view('admin.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id){
        Fornecedor::find($id)->delete();

        return redirect()->route('admin.fornecedor');
    }
}
