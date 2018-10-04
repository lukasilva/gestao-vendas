
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { Button } from 'bootstrap-vue/es/components';

Vue.use(Button);

import { Card } from 'bootstrap-vue/es/components';

Vue.use(Card);

import { Form } from 'bootstrap-vue/es/components';

Vue.use(Form);

import { FormCheckbox } from 'bootstrap-vue/es/components';

Vue.use(FormCheckbox);

import { FormGroup } from 'bootstrap-vue/es/components';

Vue.use(FormGroup);

import { FormInput } from 'bootstrap-vue/es/components';

Vue.use(FormInput);

import { FormSelect } from 'bootstrap-vue/es/components';

Vue.use(FormSelect);

import { Table } from 'bootstrap-vue/es/components';

Vue.use(Table);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

Vue.component(
    'corousel-component', 
    require('./components/loja/CarouselComponent.vue')
);

Vue.component(
    'products-component', 
    require('./components/loja/ProductsComponent.vue')
);

Vue.component(
    'cadastro-component', 
    require('./components/loja/CadastroComponent.vue')
);

Vue.component(
    'cadastro-lista-component', 
    require('./components/loja/CadastroListaComponent.vue')
);

Vue.component(
    'example-component', 
    require('./components/ExampleComponent.vue')
);

const app = new Vue({
    el: '#app'
});
