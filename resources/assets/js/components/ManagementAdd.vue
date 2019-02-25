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
            <form @submit.prevent="simpan" method="post" action="/saveProduct">
              <div v-if="success" class="alert alert-success">
                Terima kasih. Pesan berhasil dikirim.
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input v-model="state.name" type="text" name="name" class="form-control">
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input v-model="state.regular_price" type="number" name="message" class="form-control">
              </div>
                 <div class="form-group">
                <label>Deskripsi</label>
                <textarea v-model="state.description" name="message" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label>Short Description</label>
                <input v-model="state.short_description" type="text" name="message" class="form-control">
              </div>
              <div class="form-group">
                <label>Kategori</label>
                <select v-model="state.categories" class="form-control">
                  <option disabled value="">Please select one</option>
                   <option v-for="option in options" :key="option.id" v-bind:value="option.id">
                      {{ option.name }}
                  </option>
                </select>
              </div>
              <div class="form-group">
                <label>Foto</label>
                  <select v-model="state.images" class="form-control">
                  <option disabled value="">Please select one</option>
                   <option v-for="f in foto" :key="f.id" v-bind:value="originUrl + f.path">
                      {{ f.name }}
                  </option>
                </select>
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
        originUrl:[],
        success: false,
        state: {
          name: '',
          regular_price: '',
          description: '',
          short_description: '',
          categories: '',
          images:''
        }
      }
    },
      mounted(){
      axios.get('/api/getCategories').then(response => {
      this.options = response.data
    })    

      axios.get('/api/getUpload').then(response => {
      this.foto = response.data
    }) 

    this.originUrl = window.location.origin

    },
    methods: {
      simpan(e) {
          axios.post(e.target.action, this.state).then(response => {
          this.success = response.data.success;
          
          if(response.data.success == true) {
            this.errors = [];
            this.state = {
                name: '',
                regular_price: '',
                description: '',
                short_description: '',
                categories: '',
                images:''
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