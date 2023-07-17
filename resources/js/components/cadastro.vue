<template>
    <div>
        <h2 class="display-6">{{ pageTitle }}</h2>
        <form @submit.prevent="submitForm">
            <div class="row mt-4">
                <div class="form-group col-md-4">
                    <label for="nome">Nome:</label>
                    <input class="form-control" type="text" id="nome" v-model="eletrodomestico.nome" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="tensao">Tensão:</label>
                    <select id="tensao" class="form-control" v-model="eletrodomestico.tensao" required>
                        <option value="">Selecione</option>
                        <option value="110v">110v</option>
                        <option value="220v">220v</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="marca_id">Marca:</label>
                    <select id="marca_id" class="form-control" v-model="eletrodomestico.marca_id" required>
                        <option value="">Selecione</option>
                        <option v-for="marca in marcas" :key="marca.id" :value="marca.id">{{ marca.nome }}</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="descricao">Descrição:</label>
                    <textarea id="descricao" class="form-control" v-model="eletrodomestico.descricao" required></textarea>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Cadastrar </button>
                <button type="button" @click="goToList" class="btn btn-danger"><i class="bi bi-trash"></i>Cancelar</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import ModalExcluir from './ModalExcluir.vue';
export default {
    components: {
        ModalExcluir
    },
    computed: {
        pageTitle() {
            return this.id ? 'Editar Eletrodoméstico' : 'Cadastrar Eletrodoméstico';
        },
    },
    props: {
        id: {
            type: String,
            default: null,
        },
    },
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
        if (this.id) {
            axios.get('/api/eletrodomesticos/' + this.id)
                .then(response => {
                    this.eletrodomestico = response.data;
                });
        }
        axios.get('/api/marcas')
            .then(response => {
                this.marcas = response.data;
            });
    },
    methods: {
        goToList() {
            window.location.href = '/listar';
        },
        submitForm() {
            if (this.id) {
                axios.put('/api/eletrodomesticos/' + this.id, this.eletrodomestico)
                    .then(response => {
                        toastr.success('Eletrodoméstico atualizado com sucesso!');
                        window.location.href = '/listar';
                    })
                    .catch(error => {
                        toastr.error('Ocorreu um erro ao atualizar o eletrodoméstico.');
                    });
            } else {
                axios.post('/api/eletrodomesticos', this.eletrodomestico)
                    .then(response => {
                        toastr.success('Eletrodoméstico cadastrado com sucesso!');
                        window.location.href = '/listar';
                    })
                    .catch(error => {
                        toastr.error('Ocorreu um erro ao cadastrar o eletrodoméstico.');
                    });
            }
        },
    },
}
</script>