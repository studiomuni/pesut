<template>
  <div class="col-md-12">
  <br>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-5"></div>
            <div class="col-md-1" align="right"> <button class="btn btn-default"><span class="fa fa-plus "></span></button></div>
          </div>
          <table id="customers">
             <tr>
                <th>Name</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Action</th>
              </tr>
              <tr v-for="(item, index) in data" :key="index">             
                <td>{{item.name}}</td>
                <td>{{item.type}}</td>
                <td>{{item.regular_price}}</td>
                <td>{{item.description}}</td>
                <td> <button v-b-modal.modal1 v-on:click="open(item.id)" class="btn btn-danger"><span class="fa fa-trash-alt"></span></button></td>
              </tr>
          </table>
        </div>
      </div>
      <div>
        <!-- Modal Component -->
        <b-modal id="modal1" title="Hapus Data">
          <p class="my-4">Apakah Anfda Yakin Akan Menghapus?</p>
        </b-modal>
      </div>
  </div>
</template>


<script>
import axios from 'axios'

export default {
  data(){
    return{
      data: [],
    }
  },
  mounted(){
      axios.get('/api/getAllData').then(response => {
      this.data = response.data
      console.log(this.data)
    })    
  },
    methods: {
    open(id) {
      axios.get(`/api/delete/${id}`);  
    }
  }
}
</script>




