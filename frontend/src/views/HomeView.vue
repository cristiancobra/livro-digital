<template>
  <div>
  
    <!-- Full Page Image Header with Vertically Centered Content -->
    <header class="masthead">
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12 text-center">
            <h1 class="fw-light">
              Livro Digital
            </h1>
            <p class="lead">
              texto nonon
            </p>
          </div>
        </div>
      </div>
    </header>

    <!-- Page Content -->
    <section class="py-5">
      <div class="row books-container">
         <BooksList v-if='books' :currentBooks='books' />
      </div>
    </section>
    


</div>
</template>

<script>
  import axios from "axios";
  import BooksList from '@/components/BooksList.vue'

export default {
  name: 'HomeView',
  components: {
    BooksList,
  },
  data() {
    return {
      books: null,
  }
},
methods: {
    toggle() {
        this.isActive = !this.isActive;
      },
      getBooks() {
        axios
          .get("http://0.0.0.0:8099/api/home")
          .then((response) => {
            this.books = response.data.data;
            console.log(this.books);
          })
          .catch((error) => console.log(error));
      },
    },
    mounted() {
      this.getBooks();
    }
}
</script>

<style scoped>
  .banner {
    display: flex;
    width: 20%;
    height: 20%;
  }
  .books-container {
    margin-left: 180px;
    margin-right: 180px;
    margin-bottom: 60px;
  }
  .masthead {
    height: 10vh;
    min-height: 260px;
    background-image: url('../assets/banner.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }
  .title {
    text-align: left;
    font-size: 38px;
    font-weight: 800;
    margin-left: -20px;
    padding-top: 30px;
  }
</style>