<template>
  <div>
    <b-form @submit="onSubmit" @reset="onReset" v-if="show">
      <b-form-group id="exampleInputGroup1"
                    label="E-mail:"
                    label-for="exampleInput1"
                    description="E-mail.">
        <b-form-input id="exampleInput1"
                      type="email"
                      v-model="form.email"
                      required
                      placeholder="Entre e-mail">
        </b-form-input>
      </b-form-group>
      <b-form-group id="exampleInputGroup2"
                    label="Seu Nome:"
                    label-for="exampleInput2">
        <b-form-input id="exampleInput2"
                      type="text"
                      v-model="form.name"
                      required
                      placeholder="Entre nome">
        </b-form-input>
      </b-form-group>
      <b-form-group id="exampleInputGroup3"
                    label="Perfil:"
                    label-for="exampleInput3">
        <b-form-select id="exampleInput3"
                      :options="perfis"
                      required
                      v-model="form.perfil">
        </b-form-select>
        <b-form-group id="exampleInputGroup4"
                    label="Senha:"
                    label-for="exampleInput4">
            <b-form-input id="senha"
                      type="password"
                      v-model="form.password"
                      required
                      placeholder="Entre com sua senha">
          </b-form-input>
        </b-form-group>  
        <b-form-group id="exampleInputGroup5"
                    label="Confirma Senha:"
                    label-for="exampleInput5">
            <b-form-input id="senha_confirm"
                      type="password"
                      v-model="form.password_confirm"
                      required
                      placeholder="Confirme sua sua senha">
          </b-form-input>
        </b-form-group>  
      </b-form-group>
      
      <b-button type="submit" variant="primary">Cadastrar</b-button>
    </b-form>
  </div>
</template>

<script>
export default {
  data () {
    return {
      form: {
        email: '',
        name: '',
        perfil: null,
        password: '',
        password_confirm: '',
        checked: []
      },
      perfis: [
        { text: 'Selecione', value: null },
        'Fornecedor', 'Vendedor', 'SAC'
      ],
      show: true
    }
  },
  methods: {
    onSubmit (evt) {
      this.form.submit();
      evt.preventDefault();
      axios.post('/api/pessoa', this.form)                
            .then(response => {
                alert('to aqui');

        
        });
      alert(JSON.stringify(this.form));
    
    },
    onReset (evt) {
      evt.preventDefault();
      /* Reset our form values */
      this.form.email = '';
      this.form.name = '';
      this.form.perfil = null;
      this.form.checked = [];
      /* Trick to reset/clear native browser form validation state */
      this.show = false;
      this.$nextTick(() => { this.show = true });
    }
    
  }
}
</script>

<!-- b-form-1.vue -->