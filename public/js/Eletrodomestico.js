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