<template>

  <div class="row">
    <div class="col-3 mb-5" v-for="book in currentBooks" v-bind:key="book.id">
        <div class="row">
          <div id='cover' class="col cover">
            <router-link :to="{name:'booksShow',params:{id:book.id}}">
              <p class='title'>
                {{ book.name }}
              </p>
              <p class='description'>
                {{ trimDescription( book.description ) }}
              </p>
            </router-link>
          </div>
          <div class="row">
            <p class='title'>
                {{ book.name }}
              </p>
              <p>
                Cristian Cobra
              </p>
          </div>
        </div>
        <router-view/>
    </div>
  </div>
</template>

<script>
// import axios from "axios";

export default {
  name: "BooksList",
  props: [
    'currentBooks',
  ],
  methods: {
    trimDescription(description) {
      if(description) {
        return description.substring(0, 130);
      }
    },
  },
  created() {
    console.log(this.currentBooks);
  }

};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.title {
  text-align: center;
  font-size: 18px;
  font-weight: 800;
  margin: 5px;
  margin-top: 30px;
}
.description {
  text-align: left;
  font-size: 14px;
  margin-top: 20px;
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
.cover {
  text-align: left;
  border-style: solid;
  border-width: 2px;
  border-color: #007E8B;
  border-radius: 6px;
  padding: 10px;
  margin: 30px;
  height: 300px;
  background-color:white;
}
.slot {
  display:block;
  text-align: center;
  border-style: solid;
  border-width: 2px;
  border-color: #007E8B;
  border-radius: 0 6px 6px 0;
  padding-top: 23px;
  padding-bottom: 24px;
  background-color:pink;
}
.slot.active {
  border-left-style: none;
  background-color:white;
}
.slot.inactive {
  background-color:lightgray;
}
.slots-column {
    margin-left: -12px;
}
</style>
