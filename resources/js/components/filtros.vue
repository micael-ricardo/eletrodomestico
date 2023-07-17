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
                <select id="tensao" class="form-control" name="tensao">
                    <option value="">Selecione</option>
                    <option value="110v">110v</option>
                    <option value="220v">220v</option>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <label>Descrição:</label>
                <input type="text" class="form-control" name="descricao" id="descricao" />
            </div>
            <div class="form-group col-md-4">
                <label for="marca_id">Marca:</label>
                <select id="marca_id" class="form-control" v-model="eletrodomestico.marca_id">
                    <option value="">Selecione</option>
                    <option v-for="marca in marcas" :key="marca.id" :value="marca.id">{{ marca.nome }}</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            marcas: [],
            eletrodomestico: {
                nome: '',
                descricao: '',
                tensao: '',
                marca_id: '',
            },
        };
    },
    mounted() {
        this.addFilterEventListener();
        this.carregarMarcas();
    },
    methods: {
        carregarMarcas() {
            axios.get('/api/marcas')
                .then(response => {
                    this.marcas = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        addFilterEventListener() {
            var self = this;
            $('#nome, #tensao, #descricao,#marca_id').on('change', function () {
                var nome = $('#nome').val();
                var tensao = $('#tensao').val();
                var descricao = $('#descricao').val();
                var marca = $('#marca_id').val();

                var tabela = $('#datatable').DataTable();
                tabela.column(0).search(nome);
                tabela.column(1).search(tensao);
                tabela.column(2).search(descricao);
                tabela.column(3).search(marca);
                tabela.draw();
            });
        },
    },
};
</script>
