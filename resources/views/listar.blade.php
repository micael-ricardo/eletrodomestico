@extends('layouts.layout')
@section('title', 'Listar Eletrodomestico')
@section('conteudo')

    <div class="input-group mb-3">
        <div class="input-group-append">
            <a href="{{ route('cadastro') }}" class="btn btn-success"><i class="bi bi-plus"></i> Adicionar</a>
            <button type="button" class="btn btn-info" id="div-filtro" onclick="return($('#filtro').toggle('fade'))">
                <i class="bi bi-funnel"></i> Filtros
            </button>
        </div>
    </div>

    <filtros-eletrodomestico></filtros-eletrodomestico>
    <tabela-eletrodomestico></tabela-eletrodomestico>

    <div class="modal fade" id="ModalDeletar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        role="dialog" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Excluir Eletrodoméstico</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modal-body" class="modal-body">
                    Tem certeza que deseja excluir <b><span id="nome-eletro"></span></b>? Esta ação não pode ser desfeita.
                </div>
                <div class="modal-footer">
                    <form id="formExcluir" action="/api/eletrodomesticos" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id">
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    const dataTable = "{{ route('datatable') }}";
</script>
