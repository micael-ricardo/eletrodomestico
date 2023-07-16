<template>
    <div>
        <h2 class="display-6">Cadastrar Eletrodoméstico</h2>
        <form @submit.prevent="submitForm">
            <div class="row mt-4">
                <div class="form-group col-md-4">
                    <label for="nome">Nome:</label>
                    <input class="form-control" type="text" id="nome" v-model="eletrodomestico.nome">
                </div>
                <div class="form-group col-md-4">
                    <label for="tensao">Tensão:</label>
                    <select id="tensao"  class="form-control" v-model="eletrodomestico.tensao">
                        <option value="">Selecione</option>
                        <option value="110v">110v</option>
                        <option value="220v">220v</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                <label for="marca_id">Marca:</label>
                <select id="marca_id"  class="form-control" v-model="eletrodomestico.marca_id">
                    <option value="">Selecione</option>
                    <option v-for="marca in marcas" :key="marca.id" :value="marca.id">{{ marca.nome }}</option>
                </select>
            </div>
            <div class="form-group col-md-12">
                    <label for="descricao">Descrição:</label>
                    <textarea id="descricao"  class="form-control" v-model="eletrodomestico.descricao"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-3"><i class="bi bi-save"></i> Cadastrar </button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            eletrodomestico: {
                nome: '',
                descricao: '',
                tensao: '',
                marca_id: ''
            },
            marcas: []
        }
    },
    mounted() {
        axios.get('/api/marcas')
            .then(response => {
                this.marcas = response.data;
            });
    },
    methods: {
        submitForm() {
            axios.post('/api/eletrodomesticos', this.eletrodomestico)
                .then(response => {
                    alert('Eletrodoméstico cadastrado com sucesso!');
                    this.eletrodomestico = {
                        nome: '',
                        descricao: '',
                        tensao: '',
                        marca_id: ''
                    };
                })
                .catch(error => {
                    alert('Ocorreu um erro ao cadastrar o eletrodoméstico.');
                });
        }
    }
}
</script>