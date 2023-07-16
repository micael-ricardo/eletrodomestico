
// recarrega tabela com  valor do filtrado

$('#nome,#tensao,#descricao').on('change', function () {
    $('#datatable').DataTable().ajax.reload();
});