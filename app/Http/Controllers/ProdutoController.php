<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use App\Models\Fornecedor;
use App\Models\ProdutoDetalhe;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::with(['produtoDetalhe'])->paginate(10);

        

        /* jeito menos elegante de obter relacionamento 1x1

        foreach($produtos as $key => $produto){
            $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

            if(isset($produtoDetalhe)){
                $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
                $produtos[$key]['largura'] = $produtoDetalhe->largura;
                $produtos[$key]['altura'] = $produtoDetalhe->altura;
            }
        }*/



        return view('admin.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('admin.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $msg = '';

        //inclusao
        if($request->input('_token') != '' && $request->input('id') == ''){
            //validacao
            $regras = [
                'nome' => 'required',
                'descricao' => 'required',
                'peso' => 'required|integer',
                'unidade_id' => 'exists:unidades,id',
                'fornecedor_id' => 'exists:fornecedores,id'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'peso.integer' => "O campo deve ser um número inteiro",
                'unidade_id.exists' => "A unidade de medida informada não existe!",
                'fornecedor_id.exists' => "O fornecedor informado não existe!"
            ];

            $request->validate($regras, $feedback);

            $produto = new Produto();

            //vai preencher o objeto de acordo com a variavel fillable no model
            $produto->create($request->all());
            $msg = "Cadastro realizado com sucesso!";
        }

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('admin.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        //talvez tenha que refazer a validação do form como no create
        return view('admin.produto.edit', ['produto' => $produto, 'unidades' => $unidades , 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {

        $msg = '';

        //inclusao
        if($request->input('_token') != '' && $request->input('id') == ''){
            //validacao
            $regras = [
                'nome' => 'required',
                'descricao' => 'required',
                'peso' => 'required|integer',
                'unidade_id' => 'exists:unidades,id',
                'fornecedor_id' => 'exists:fornecedores,id'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'peso.integer' => "O campo deve ser um número inteiro",
                'unidade_id.exists' => "A unidade de medida informada não existe!",
                'fornecedor_id.exists' => "O fornecedor informado não existe!"
            ];

            $request->validate($regras, $feedback);

            $produto = new Produto();

            //vai preencher o objeto de acordo com a variavel fillable no model
            $produto->create($request->all());
            $msg = "Cadastro realizado com sucesso!";
        }

        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto, Request $request)
    {
        $produto->delete();
       
        return redirect()->route('produto.index');
    }
}
