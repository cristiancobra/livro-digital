<template>
  <div class="container-nav">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand banner" href="#">
            LIVRO DIGITAL
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <router-link class="nav-link active" aria-current="page" to="/">
                Home
              </router-link>
            </li>
            <li class="nav-item">
              <router-link  class="nav-link" to="/books">
                Livros
              </router-link>
            </li>
          </ul>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
          <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <router-link class="nav-link active" aria-current="page" to="/login">
                  <button type="button" class="btn btn-outline-light">
                    login
                  </button>
                </router-link>
              </li>
              <li class="nav-item">
                  <button type="button" class="btn btn-outline-light mt-2" v-on:click="logout">
                    logout
                  </button>
              </li>
          </ul>
        </div>
      </div>
    </nav>
    <router-view />
  </div>
  
</template>

<script>
  import axios from "axios";

export default {
  // name: 'BooksIndexView',
  // components: {
  //   BookCreateForm,
  //   BooksList,
  //   Sidebar,
  // },
//   data() {
//     return {
//       isActive: true,
//       hasError: false,
//       data: null,
//       books: null,
//       newBook: {
//         id: null,
//         name: null,
//         description: null,
//         company_id: null,
//         contact_id: null,
//         user_id: null,
//         date_start: null,
//         date_due: null,
//       }
//   }
// },
  methods: {
      logout() {
        axios
          .post("http://0.0.0.0:8099/api/logout")
          .then((response) => {
            this.books = response.data.data;
            console.log(this.books);
          })
          .catch((error) => console.log(error));
      },
    },
}
</script>


<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 16px;
  background-color: #884856;
  height: 60px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}

.container-nav {
  position: absolute;
}
</style>
