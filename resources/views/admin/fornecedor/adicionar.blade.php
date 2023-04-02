@section('titulo', 'Adicionar Fornecedor')

<x-app-layout>
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('admin.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('admin.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:30%; margin-left: auto; margin-right:auto;">
                {{$msg ?? ''}}
                <form method="post" action="{{ route('admin.fornecedor.adicionar') }}">
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">
                    @csrf
                    <input type="text" name="nome" value="{{ $fornecedor->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="text" name="site" value="{{ $fornecedor->site ?? old('site') }}"  placeholder="Site" class="borda-preta">

                    <input type="text" name="uf" value="{{ $fornecedor->uf ?? old('uf') }}"  placeholder="UF" class="borda-preta">

                    <input type="text" name="email" value="{{ $fornecedor->email ?? old('email') }}"  placeholder="email" class="borda-preta">

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
