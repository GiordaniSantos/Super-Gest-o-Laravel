@section('titulo', 'Fornecedores')

<x-app-layout>
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Listagem</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('admin.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('admin.fornecedor') }}">Consulta</a></li>a
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right:auto;">
                
                    <table border="1"  width="100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Site</th>
                                <th>UF</th>
                                <th>Email</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fornecedores as $fornecedor)
                                <tr>
                                    <td>{{ $fornecedor->nome }}</td>
                                    <th>{{ $fornecedor->site }}</th>
                                    <th>{{ $fornecedor->uf }}</th>
                                    <th>{{ $fornecedor->email }}</th>
                                    <th><a href="{{ route('admin.fornecedor.excluir', $fornecedor->id) }}">Excluir</a></th>
                                    <th><a href="{{ route('admin.fornecedor.editar', $fornecedor->id) }}">Editar</a></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $fornecedores->appends($request)->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
