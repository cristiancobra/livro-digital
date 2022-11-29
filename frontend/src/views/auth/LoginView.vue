<template>
  <div>
    <div class="alert alert-danger mt-5" role="alert" v-if="message">
        {{ message }}
    </div>

    <div id ='form' class='container'>
        <form @submit.prevent="submitForm">

            <div class='form-group'>
                <div class='row'>
                    <div class='col-2'>
                        <label class='labels' for='email'>
                            Email
                        </label>
                    </div>
                    <div class='col-10'>
                        <input class="form-control" type='text' id='email' v-model='form.email' placeholder='Email'>
                    </div>
                </div>
            </div>

            <div class='form-group'>
                <div class='row'>
                    <div class='col-2'>
                        <label class='labels' for='password'>
                            Senha
                        </label>
                    </div>
                    <div class='col-10'>
                        <input class="form-control" type='text' id='password' v-model='form.password' placeholder='senha'>
                    </div>
                </div>
            </div>

            <div class="row ms-5 me-5 mt-4 mb-2">
                <button type="submit" class="btn new">
                    entrar
                </button>
            </div>

        </form>
    </div>
</div>
</template>

<script>
import axios from 'axios'
// import axios from '@/api/axios'

export default {
  name: 'BookCreateForm',
//   emits: ["new-book-event"],
  data() {
      return {
          message: null,
          data: [],
          form : {
              email: null,
              password: null,
          }
      }
  },
  methods: {
    async submitForm() {

        axios.defaults.withCredentials = true;
        
        axios.get('http://localhost:8099/sanctum/csrf-cookie').then(response => {
            console.log('csrf-cookie', response);

            axios
                .post('http://localhost:8099/api/login', this.form)
                .then((response) => {
                    this.data = response.data;
                    this.message = response.data.message;
                    console.log(this.data);

                    if(response.data.id) {
                        // this.newBookEvent(this.data);
                        this.$router.push( { name: 'booksIndex'} );
                    }
                });
            

        });
        
    },
},
}
</script>

<style scoped>
.container {
  max-width: 600px;
  border-style: solid;
  border-color: #884856;
  border-width: 2px;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: auto;
  margin-top: 140px;
  padding: 40px;
  border-radius: 16px;
  transition: all .5s;
  text-align: left;
  font-weight: 800;
}
.labels {
  text-align: left;
  margin-left: 0;
}
.new {
  background-color: #a5c5c0;
  color: white;
  font-weight: 800;
  padding: 10px 20px 10px 20px;
}
</style>