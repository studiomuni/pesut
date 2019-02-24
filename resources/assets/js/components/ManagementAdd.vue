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
            <form @submit.prevent="simpan" method="post">
              <div v-if="success" class="alert alert-success">
                Terima kasih. Pesan berhasil dikirim.
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input v-model="state.name" type="text" name="name" class="form-control">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input v-model="state.email" type="text" name="email" class="form-control">
              </div>
              <div class="form-group">
                <label>Pesan</label>
                <textarea v-model="state.message" name="message" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <button class="btn btn-primary" type="submit">
                  Kirim Pesan
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
        success: false,
        state: {
          name: '',
          email: '',
          message: ''
        }
      }
    },
    methods: {
      simpan(e) {
       console.log(e)
      }
    }
  }
</script>