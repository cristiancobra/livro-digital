<template>
  <div class="container-content">
    
    <Sidebar />

    <div class='headers-line'>
        <div class="col-1 slot done">
          concluidos
        </div>
        <div class="col-1 slot doing">
          andamento
        </div>
        <div class="col-1 slot late">
          atrasados
        </div>
        <div class="col-1 slot new" @click='toggle()'>
          +
        </div>
    </div>

    <!-- <div v-bind:class='{ hidden: isActive }' >
      <BookCreateForm @new-book-event='addBookCreated($event)' />
    </div> -->

    <div class="row books-container">
      <BooksList v-if='books' :currentBooks='books' />
    </div>
  </div>
</template>

<script>
import axios from '@/api/axios'
import BooksList from '@/components/BooksList.vue'
// import BookCreateForm from '@/components/forms/BookCreateForm.vue'
import Sidebar from '@/components/Sidebar.vue'

export default {
  name: 'BooksIndexView',
  components: {
    // BookCreateForm,
    BooksList,
    Sidebar,
  },
  data() {
    return {
      isActive: true,
      hasError: false,
      data: null,
      books: null,
      newBook: {
        id: null,
        name: null,
        description: null,
        company_id: null,
        contact_id: null,
        user_id: null,
        date_start: null,
        date_due: null,
      }
  }
},
  methods: {
    toggle() {
      this.isActive = !this.isActive;
    },
    getBooks() {
       
      axios.defaults.withCredentials = true;

      axios
      .get('http://0.0.0.0:8099/sanctum/csrf-cookie').then(response => {
        
        console.log('csrf-cookie', response);
        
        axios
        .get("http://0.0.0.0:8099/api/books")
        .then((response) => {
          this.books = response.data.data;
              console.log(this.books);
          })
        .catch((error) => console.log(error));

    });


    },
      // addBookCreated($event) {
      //   this.data = $event;
      //   this.newBook.id = this.data.id;
      //   this.newBook.name = this.data.name;
      //   this.newBook.description = this.data.description;
      //   this.newBook.company_id = '1';
      //   this.newBook.contact_id = '2';
      //   this.newBook.user_id = '3';
      //   this.newBook.date_start = '2022-07-07 00:00:00';
      //   this.newBook.date_due = '2022-07-10 00:00:00';

      //   this.books.push( this.newBook );
      // }
    },
    mounted() {
      this.getBooks();
    }
}
</script>

<style scoped>

.headers-line {
  margin-top: 120px;
  margin-bottom: 50px;
  margin-left: 80px;
  margin-right: 80px;
  display: flex;
  justify-content: center;

}
.slot{
  border-width: 2px;
  border-style: solid;
  border-color:white;
  border-radius: 20px 20px 20px 20px;
  padding: 10px 15px 10px 15px;
  margin: 0 4px 0 4px;
  color: white;
  font-weight: 800;
  width: 120px;
}
.done {
  background-color: white;
  border-color: #2CB48D;
  color: #2CB48D;
}
.done:hover {
  background-color: #2CB48D;
  color: white;
}
.doing {
  background-color: white;  
  border-color: #E78D1F;
  color: #E78D1F;
}
.doing:hover {
  background-color: #E78D1F;
  color: white;
}
.late {
  background-color: white;  
  border-color: #B1388D;
  color: #B1388D;
}
.late:hover {
  background-color: #B1388D;
  color: white;
}
.new {
  border-radius: 20px 20px 20px 20px;
  background-color: white;
  border-color: #FF3EB5;
  color: #FF3EB5;
  margin-left: 50px;
  width: 60px;
  font-size: 16px;
}
.new:hover {
  background-color: #FF3EB5;
  color: white;
  margin-left: 50px;
  width: 60px;
}
.books-container {
  margin-left: 180px;
  margin-right: 180px;
  margin-bottom: 60px;
}
.hidden {
    display: none;
    transition: display 2s;
}
.show {
    display: block;
    transition: display 2s;
}
</style>
