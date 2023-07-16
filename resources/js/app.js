

import './bootstrap';
import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';
import cadastro from './components/cadastro.vue';
import TabelaEletrodomestico from './components/TabelaEletrodomestico.vue';

const app = createApp({});

app.component('cadastro-form', cadastro);
app.component('tabela-eletrodomestico', TabelaEletrodomestico);
app.component('example-component', ExampleComponent);

app.mount('#app');
