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
                                <th>Fornecedor</th>
                                <th>Peso</th>
                                <th>Unidade ID</th>
                                <th>Comprimento</th>
                                <th>Largura</th>
                                <th>Altura</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->nome }}</td>
                                    <th>{{ $produto->descricao }}</th>
                                    <th>{{ $produto->fornecedor->nome }}</th>
                                    <th>{{ $produto->peso }}</th>
                                    <th>{{ $produto->unidade_id }}</th>
                                    <th>{{ $produto->produtoDetalhe->comprimento ?? '' }}</th>
                                    <th>{{ $produto->produtoDetalhe->largura ?? '' }}</th>   
                                    <th>{{ $produto->produtoDetalhe->altura ?? '' }}</th>
                                    <th><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></th>
                                    <th>
                                        <form id="form_{{$produto->id}}" method="post" onsubmit="return confirm('Tem certeza que deseja remover {{$produto->nome}} ?')" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                        </form>
                                    </th>
                                    <th><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $produtos->appends($request)->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
