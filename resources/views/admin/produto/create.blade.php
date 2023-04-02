@section('titulo', 'Adicionar Produto')

<x-app-layout>
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Listar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:30%; margin-left: auto; margin-right:auto;">
                <form method="post" action="{{ route('produto.store') }}">
                    @csrf
                    <input type="text" name="nome" value="{{ $fornecedor->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">

                    <input type="text" name="descricao" value="{{ $fornecedor->descricao ?? old('descricao') }}"  placeholder="Descrição" class="borda-preta">

                    <input type="text" name="peso" value="{{ $fornecedor->peso ?? old('peso') }}"  placeholder="Peso" class="borda-preta">

                    <select name="unidade_id">
                        <option> Selecione a unidade de medida </option>

                            @foreach ($unidades as $unidade)
                                <option value="{{$unidade->id}}">{{$unidade->descricao}}</option>
                            @endforeach
                    </select>

                    <button type="submit" class="borda-preta">Cadastrar</button>
                <form>
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
