@extends('layouts.layout')
@if (isset($eletrodomesticos))
    @section('title', 'Editar Eletrodomestico')
@else
    @section('title', 'Cadastrar Eletrodomestico')
@endif
@section('conteudo')

    @if (isset($eletrodomesticos))
        <cadastro-form :id="{{ $eletrodomesticos->id }}"></cadastro-form>
    @else
        <cadastro-form></cadastro-form>
    @endif
@endsection
