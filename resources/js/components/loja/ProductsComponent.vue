<template>
    <div>
        <div v-if="loading">
            <div class="loader"></div>
        </div>

        <div v-if="!loading">
           <b-card-group columns column-count="4">
            <template v-for="produto in produtos">
                <b-card :title="produto.nome"
                    :img-src="retiraAspas('/storage/images/' + produto.imagem)"
                    img-alt="Image"
                    img-top
                    tag="article"
                    style="max-width: 20rem;"
                    class="mb-2">
                    <p class="card-text">
                        {{produto.decricao}}
                    </p>
                    <p class="card-text">
        
                        <b style="font-size: 16px;">R$ {{ formatPrice(produto.valor) }}</b>
                    </p>
                    
                    <b-button @click=addProduto(produto.id)  variant="primary">Adicionar ao carrinho</b-button>
                </b-card>
            </template>
            

        </b-card-group> 
        </div>
        
    </div>
    
</template>

<script>


export default {
    
  data () {
    return {
      loading: false,  
      produtos: [],
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }
  },
  mounted() {
        this.prepareComponent();
  },
  methods: {
    
      prepareComponent() {
        this.getProdutos();
      },

      getProdutos() {
        this.loading = true
        let urlParams = new URLSearchParams(window.location.search);
        let myParam = urlParams.get('busca');
        let urlApi = '/api/produto'
        if(myParam){
            urlApi = urlApi + '?busca=' + myParam 
        }
        console.log(urlApi);
        axios.get(urlApi)               
            .then(response => {
                this.produtos = response.data;
                this.loading = false
        });
    },
    formatPrice(value) {
        let val = (value/1).toFixed(2).replace('.', ',')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    },
    retiraAspas(value) {
        let RegExp = /["|']/g;
 	    return value.replace(RegExp,"");
    },
    addProduto(value){
        $.cookie( 'produto_' + value  , 1 );
        window.location = "/cart";
    }
    
  }
}
</script>

<style>
    .loader {
        border: 16px solid #f3f3f3; /* Light grey */
        border-top: 16px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
        margin: auto;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
