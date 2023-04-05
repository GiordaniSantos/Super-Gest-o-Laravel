@section('titulo', 'Editar Detalhes do Produto')

<x-app-layout>
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Detalhes do Produto - Editar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Listar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">

            <h4>Produto</h4>
            <div>Nome: {{$produto_detalhe->produto->nome}}</div><br>
            <div>Descrição: {{$produto_detalhe->produto->descricao}}</div>

            <div style="width:30%; margin-left: auto; margin-right:auto;">
                @component('admin.produto_detalhe._components.form_create_edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades])
                @endcomponent
            </div>
        </div>
        @if($errors->any())
            <h1>Erros</h1>
            @foreach ($errors->all() as $error)
                {{$error}}
                <br>
            @endforeach
        @endif
    </div>
</x-app-layout>
