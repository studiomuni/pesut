<template>
  <div class="col-md-12">
  <br>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-5"></div>
            <div class="col-md-1" align="right">
              <router-link to="/kategori-add">
                <button class="btn btn-default"><span class="fa fa-plus "></span></button>
              </router-link>
            </div>
          </div>
          <table id="customers">
             <tr>
                <th>Nama Kategori</th>
                <th>Slug</th>
                <th>Action</th>
              </tr>
              <tr v-for="(item, index) in data" :key="index">             
                <td>{{item.name}}</td>
                <td>{{item.slug}}</td>
                <td> <button v-b-modal.modal1 v-on:click="open(item.id)" class="btn btn-danger"><span class="fa fa-trash-alt"></span></button></td>
              </tr>
          </table>
        </div>
      </div>
      <div>
        <!-- Modal Component -->
        <b-modal id="modal1" title="Hapus Data">
          <p class="my-4">Apakah Anda Yakin Akan Menghapus? {{getNama}}</p>
        <div slot="modal-footer">
          <b-button size="10px" class="float-right" variant="success" v-on:click="hapus(getId)" :disabled="getId==''">Ok</b-button> 
        </div>
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
      getId: [],
      getNama: []
    }
  },
  mounted(){
      axios.get('/api/getCategories').then(response => {
      this.data = response.data
    })    
  },
    methods: {

    open(id) {
      axios.get(`/api/getDataCategori/${id}`).then(response => {
        this.getId = response.data.id
        this.getNama = response.data.name
    })    

    },
     hapus(id) {
     axios.get(`/api/deleteCategori/${id}`);  
     location.reload();
    }
  }
}
</script>




