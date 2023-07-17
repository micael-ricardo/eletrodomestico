<template>
    <table id="datatable" class="table table-striped table-bordered w-100">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Tensão</th>
                <th>Descrição</th>
                <th>Marcas</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</template>

<script>
export default {
    mounted() {
        this.initializeDataTable();
    },
    methods: {
        initializeDataTable() {
            var columns = [
                {
                    data: 'nome',
                    title: 'Nome',
                    width: "250px",
                },
                {
                    data: 'tensao',
                    title: 'Tensão',
                    width: "250px",
                },
                {
                    data: 'descricao',
                    title: 'Descrição',
                    width: "250px",
                },
                {
                    data: 'marca.nome',
                    title: 'Marca',
                    width: "250px",
                },
                {
                    data: 'id',
                    title: 'Ações',
                    width: "100px",
                    render: function (data, type, row) {
                    
                        var nome = row.nome;
                        // var btnEditar = '<a href="/eletrodomesticos/' + data + '/edit" class="btn btn-info btn-sm"><i class="bi bi-pencil"></i></a>';
                        var btnEditar = '<a href="/eletrodomestico/' + data + '/editar" class="btn btn-info btn-sm"><i class="bi bi-pencil"></i></a>';
                        var btnDeletar = '<button type="button" data-bs-target="#ModalDeletar" data-bs-toggle="modal" data-id="' + data + '" data-nome="' + nome + '" class="btn btn-danger btn-sm excluir-local"><i class="bi bi-trash"></i></button>';

                        return btnEditar + ' ' + btnDeletar;
                    },
                    className: 'text-center'
                },
            ];

            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                ajax: {
                    url: dataTable,
                    method: 'GET',
                    // filtro
                    data: function (d) {
                        d.nome = $('#nome').val();
                        d.tensao = $('#tensao').val();
                        d.descricao = $('#descricao').val();
                        d.marca_id = $('#marca_id').val();
                    }
                },
                columns: columns,
                responsive: true,
                scrollX: true,
                scrollY: '500px',
                language: {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    }
                },
                lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "Todos"]],
            });

            //             $(document).on("click", ".excluir-local", function (e) {
            //                 e.preventDefault();
            //                 var id = $(this).data('id');
            //                 var nome = $(this).data('nome');
            //                 $('#nome-local').text(nome);
            //                 var formAction = $('#formExcluir').attr('action').replace(':id', id);
            //                 $('#formExcluir').attr('action', formAction);
            //                 $('#formExcluir input[name="id"]').val(id);
            //                 $('#ModalDeletar').modal('show');
            //             });

            //             $(document).on("submit", "#formExcluir", function (e) {
            //                 e.preventDefault();
            //                 var form = this;
            //                 function showError() {
            //                     toastr.error('Ocorreu um erro ao excluir o local.');
            //                 }
            //                 $.ajax({
            //                     url: form.action,
            //                     type: form.method,
            //                     data: $(form).serialize(),
            //                     success: function (response, status, xhr) {
            //                         if (xhr.status === 200) {
            //                             toastr.success('Local excluído com sucesso!');
            //                             $('#ModalDeletar').modal('hide');
            //                             setTimeout(function () {
            //                                 location.reload();
            //                             }, 1000);
            //                         } else {
            //                             showError();
            //                         }
            //                     },
            //                     error: function (xhr) {
            //                         showError();
            //                     },
            //                     complete: function () {
            //                         $('#ModalDeletar').modal('hide');
            //                     }
            //                 });
            //             });
        },
    },
};

</script>