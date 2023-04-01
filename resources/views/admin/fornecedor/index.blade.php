<h3>Fornecedor view</h3>

{{ "Texto de teste" }} 
é o mesmo que 
<?= "Texto de teste"?>

{{-- Fica o comentário que será descartado pelo interpretador do Blade --}}

@php
    // Para comentários puro php
@endphp

@if(count($fornecedores) > 0 && count($fornecedores) < 10)
  <h3>Teste </h3>
@elseif(count($fornecedores) > 10)
    teste errado
@else
    teste else
@endif