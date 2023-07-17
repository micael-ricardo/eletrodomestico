@extends('layouts.layout')
@section('title', 'Cadastro de Eletrodomestico')
@section('conteudo')


    <cadastro-form :id="{{ $eletrodomesticos->id }}"></cadastro-form>

@endsection
