@section('titulo', 'Fornecedores')

<x-app-layout>
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('admin.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('admin.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:30%; margin-left: auto; margin-right:auto;">
                <form method="post" action="{{ route('admin.fornecedor.listar') }}">
                    @csrf
                    <input type="text" name="Nome" placeholder="Nome" class="borda-preta">
                    <input type="text" name="site" placeholder="Site" class="borda-preta">
                    <input type="text" name="uf" placeholder="UF" class="borda-preta">
                    <input type="text" name="email" placeholder="email" class="borda-preta">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                <form>
            </div>
        </div>
    </div>
</x-app-layout>
