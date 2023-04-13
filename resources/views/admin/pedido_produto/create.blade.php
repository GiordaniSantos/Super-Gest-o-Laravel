@section('titulo', 'Adicionar Produtos ao Pedido')

<x-app-layout>
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produtos ao Pedido - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Listar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <h4>Detalhes do pedido</h4>
            <p>Id do pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>
            <div style="width:30%; margin-left: auto; margin-right:auto;">
                <h4>Itens do pedido</h4>
                <table border='1' width="100%">
                    <thead>
                        <tr>
                            <th>ID do produto</th>
                            <th>Nome do produto</th>
                            <th>Data de inclusão do item no pedido</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->created_at->format('d/m/Y') }}</td>
                        </tr>
                         @endforeach
                    </tbody>
                </table>
                @component('admin.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
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
