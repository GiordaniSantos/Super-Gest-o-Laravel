@section('titulo', 'Clientes')

<x-app-layout>
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Clientes - Listagem</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>a
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right:auto;">
                
                    <table border="1"  width="100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->nome }}</td>
                                    <th><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></th>
                                    <th>
                                        <form id="form_{{$cliente->id}}" method="post" onsubmit="return confirm('Tem certeza que deseja remover {{$cliente->nome}} ?')" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                        </form>
                                    </th>
                                    <th><a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $clientes->appends($request)->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
