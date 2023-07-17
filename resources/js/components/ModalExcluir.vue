<script>

$(document).on("submit", "#formExcluir", function (e) {
    e.preventDefault();
    var form = this;
    function showError() {
        toastr.error('Ocorreu um erro ao excluir o eletrodoméstico.');
    }

    $.ajax({
        url: $(form).attr('action'),
        type: 'POST',
        data: $(form).serialize(),
        success: function (response) {
            toastr.success('Eletrodoméstico excluído com sucesso!');
            $('#ModalDeletar').modal('hide');
            setTimeout(function () {
                location.reload();
            }, 1000);
        },
        error: function (xhr) {
            showError();
        },
        complete: function () {
            $(form).trigger('reset');
        }
    });
});
</script>