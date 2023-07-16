@extends('layouts.layout')
@section('title', 'Listar Eletrodomestico')
@section('conteudo')

<div class="input-group mb-3">
    <div class="input-group-append">
        <a   href="{{ route('cadastro') }}" class="btn btn-success"><i class="bi bi-plus"></i> Adicionar</a>
        <button type="button" class="btn btn-info" id="div-filtro" onclick="return($('#filtro').toggle('fade'))">
            <i class="bi bi-funnel"></i> Filtros
        </button>
    </div>
</div>

<filtros-eletrodomestico></filtros-eletrodomestico>
<tabela-eletrodomestico></tabela-eletrodomestico>
@endsection
<script>
    const dataTable = "{{ route('datatable') }}";
</script>