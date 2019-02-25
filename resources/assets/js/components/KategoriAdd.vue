<style>
.widget-user-header{
    background-position: center center;
    background-size: cover;
    height: 250px !important;
}
.widget-user .card-footer{
    padding: 0;
}

</style>

<template>
  <div class="container">
  <br>
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="tab-content">
            <form @submit.prevent="simpan" method="post" action="/saveKategori">
              <div v-if="success" class="alert alert-success">
                Terima kasih. Pesan berhasil dikirim.
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input v-model="state.name" type="text" name="name" class="form-control">
              </div>
              <div class="form-group">
                <button class="btn btn-primary" type="submit">
                  Submit
                </button>
              </div>
            </form>   
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        options: [],
        foto: [],
        success: false,
        state: {
          name: '',
        }
      }
    },
      mounted(){
      axios.get('/api/getCategories').then(response => {
      this.options = response.data
    })    

    },
    methods: {
      simpan(e) {
          axios.post(e.target.action, this.state).then(response => {
          this.success = response.data.success;
          
          if(response.data.success == true) {
            this.errors = [];
            this.state = {
                name: '',
            }
          }
        }).catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data;
          }
        })
      }
    }
  }
</script>