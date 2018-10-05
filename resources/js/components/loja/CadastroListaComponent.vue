<template>
  <div>
    <b-table striped hover :items="cadastros"></b-table>
    <form action="/admin/cadastro"  method="get">
        <input type="hidden" name="_token" :value="csrf">
        <b-button type="submit" size="sm" variant="primary">
            Cadastrar
        </b-button>
    </form>
  </div>
</template>

<script>

export default {
    
  data () {
    return {
    //   fields: [ 'Nome','E-mail','Tipo'],
      cadastros: [],
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }
  },
  mounted() {
        this.prepareComponent();
  },
  methods: {
    
      prepareComponent() {
        this.getCadastros();
      },

      getCadastros() {
        axios.get('/api/pessoa', 
            {
                headers: {'Authorization': "Bearer " + "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjAzNTdmNmU5NThiYWE0NzVmYTU1OTRlOTBiY2M1NDNkMzE2ZWE0MDVjNWRhNWE1MWE3ODFkZmFkZjg1MWQyYjRjOThhZDIyOTQwYmUxZWRkIn0.eyJhdWQiOiIxIiwianRpIjoiMDM1N2Y2ZTk1OGJhYTQ3NWZhNTU5NGU5MGJjYzU0M2QzMTZlYTQwNWM1ZGE1YTUxYTc4MWRmYWRmODUxZDJiNGM5OGFkMjI5NDBiZTFlZGQiLCJpYXQiOjE1Mzg3MDQ0NzgsIm5iZiI6MTUzODcwNDQ3OCwiZXhwIjoxNTcwMjQwNDc4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.H5OqnNgkwbnNxzRc6J4junXMpQrli5bq4t2Rw9uYh9ltsaeqEcBnxsakeBz7mYDJZEwp63CD87aSC-mFKyo0QXCCrMUCYSu6p8K7taBUkg0WTVDTK05yjAKcrwM5S-IK8W5pmH8ix_DAkopwnTRdInzNb00Uwcff6YrN0JMZccKOay7wG8jwatdW1YQfm9rXgEVzXqjHL1gq-okzzNj7ZEQ3d50_MUCUAMr-paLaDrxK0IKdqtZxbWTSShiMyOvZ6JzrWFcPIKjwAxZIyQHE62-v2sXGt_6AxZ54W_WyZG9AMSRI_wQlKktq3RSlq5hgKMeUKM_amJUXuQYqyD0FO71CafG5NoYKPyBLU8PRWAWc-SwHAYwBxF1vdr-yuvMAlCOITIHHtsR1ZPzWZ67log1cevu0XgNIg5wI6XU3MhRulxs--Imw5VH8gW5FNVg5P60QyjMB-SzASUS85GQF_vc7L2BPkz9Rp4OV38FE7pOQ2rfuy9HDnLM1ETkqkihS65a38dtYTmbU7QOvKadh2AzzCckAeU8SEvY8TGTxD-6wjC8A6kdxIykyhH0TqDJ9-xOFO98Xl2EikELXMGHBTybp7zabnOKifDEy95pIq67_d1SWLCDatKrwx9eyV5Q3J_uUCFoQRigLn-y5K6hRrwRFy0t6w_lpcgT5RP28vuU"}
            })                
            .then(response => {
                this.cadastros = response.data;
        });
    },
    
  }
}
</script>