<template>
  <div>
    
    <div class="about">
      <h1>DETALHES DO LIVRO</h1>
    </div>

    <div class="container-card">
          <div class="card">
            <div class="title">
              {{ book.name }}
            </div>
            <p>
              {{ book.description }}
            </p>
          </div>
    </div>
    <div class="container">
      <p>
          Responsável: {{ book.user_id }}
      </p>
      <p>
          Cliente: {{ book.contact_id }}
      </p>
      <p>
          Empresa: {{ book.company_id }}
      </p>
    </div>

  </div>
</template>

<script>
  import axios from 'axios';
  
  export default {
    name: 'BooksShowView',
    data() {
    return {
      book: [],
      bookId: '',
    };
  },
  
methods: {
    getbook() {
      axios
        .get(`http://10.65.244.177/api/books/${this.bookId}`)
        .then((response) => {
          this.book = response.data.data;
        })
        .catch((error) => console.log(error));
    },
    setbookId (bookId) {
       this.bookId = bookId;
   },
},
async mounted() {
    this.setbookId(this.$route.params.id);
    this.getbook();
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
p {
    text-align: left;
    font-weight: 400;
}
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: rgb(61, 61, 61);
}
a:link {
  text-decoration: none;
}
a:visited {
  text-decoration: none;
}
a:hover {
  text-decoration: none;
}
a:active {
  text-decoration: none;
}
.card {
  text-align: left;
  background-color: white;
  border-style: solid;
  border-width: 3px;
  border-color: #48d1cc;
  border-radius: 20px;
  padding-top: 10px;
  padding-left: 20px;
  padding-bottom: 10px;
}
.title {
  font-size: 32px;
  font-weight: 900;
  padding-top: 10px;
  padding-bottom: 10px;
}
.container-card {
  margin-left: 180px;
  margin-right: 180px;
  margin-bottom: 60px;
  margin-top: 60px;
}

.container {
  margin-left: 200px;
  margin-right: 180px;
  margin-bottom: 60px;
}
</style>
