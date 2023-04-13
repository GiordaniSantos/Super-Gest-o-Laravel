@section('titulo', 'Pedidos')

<x-app-layout>
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Pedidos - Listagem</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right:auto;">
                
                    <table border="1"  width="100%">
                        <thead>
                            <tr>
                                <th>ID pedido</th>
                                <th>Nome cliente</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $pedido)
                                <tr>
                                    <td>{{ $pedido->id }}</td>
                                    <td>{{ $pedido->cliente_id }}</td>
                                    <td><a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">Adicionar Produtos</a></td>
                                    <th><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a></th>
                                    <th>
                                        <form id="form_{{$pedido->id}}" method="post" onsubmit="return confirm('Tem certeza que deseja remover {{$pedido->nome}} ?')" action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                        </form>
                                    </th>
                                    <th><a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">Editar</a></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $pedidos->appends($request)->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
