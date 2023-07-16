<template>
    <div class="panel panel-inverse mb-3" id="filtro" style="display: none;">
        <div class="row">
            <div class="form-group col-sm-2">
                <label>Data Início:</label>
                <input type="date" class="form-control" name="data_inicio" id="data_inicio" />
            </div>

            <div class="form-group col-sm-2">
                <label>Data Fim:</label>
                <input type="date" class="form-control" name="data_fim" id="data_fim" />
            </div>
            <div class="form-group col-sm-4">
                <label>Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" />
            </div>
            <div class="form-group col-md-4">
                    <label for="tensao">Tensão:</label>
                    <select id="tensao"  class="form-control" name="tensao">
                        <option value="">Selecione</option>
                        <option value="110v">110v</option>
                        <option value="220v">220v</option>
                    </select>
                </div>
            <div class="form-group col-sm-4">
                <label>Descrição:</label>
                <input type="text" class="form-control" name="descricao" id="descricao" />
            </div>
            <div class="form-group col-sm-4">
                <label>Marca:</label>
                <input type="text" class="form-control" name="marca" id="marca" />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        this.addFilterEventListener();
    },
    methods: {
        addFilterEventListener() {
            var self = this;
            $('#nome, #tensao, #descricao').on('change', function () {
                var nome = $('#nome').val();
                var tensao = $('#tensao').val();
                var descricao = $('#descricao').val();

                var tabela = $('#datatable').DataTable();
                tabela.column(0).search(nome);
                tabela.column(1).search(tensao);
                tabela.column(2).search(descricao);
                tabela.draw();
            });
        },
    },
};
</script>
