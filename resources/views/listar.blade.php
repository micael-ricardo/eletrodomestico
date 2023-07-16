@extends('layouts.layout')
@section('title', 'Listar Eletrodomestico')
@section('conteudo')

<filtros-eletrodomestico></filtros-eletrodomestico>

<tabela-eletrodomestico></tabela-eletrodomestico>

<script>
    const dataTable = "{{ route('datatable') }}";
</script>

@endsection
