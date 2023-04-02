@section('titulo', 'Produtos')

<x-app-layout>
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produtos - Listagem</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>a
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right:auto;">
                
                    <table border="1"  width="100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Peso</th>
                                <th>Unidade ID</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->nome }}</td>
                                    <th>{{ $produto->descricao }}</th>
                                    <th>{{ $produto->peso }}</th>
                                    <th>{{ $produto->unidade_id }}</th>
                                    <th><a href="">Excluir</a></th>
                                    <th><a href="">Editar</a></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $produtos->appends($request)->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
