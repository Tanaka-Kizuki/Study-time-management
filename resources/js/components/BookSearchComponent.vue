<template>
     <div class="book">
          <input type="text" v-model="isbn">
          <button v-on:click="search">検索</button>
          <form action="/book">
               <img v-bind:src="cover">
               <p>{{title}}</p>
               <input type="hidden" name="cover" v-bind:value="cover">
               <input type="hidden" name="title" v-bind:value="title">
               <button>登録</button>
          </form>
     </div>
</template>

<script>
export default {

     data() {
          return {
              isbn:'',
              title:'',
              cover:'',
          }
     },
     methods: {
          search: function() {
               const url = "https://api.openbd.jp/v1/get?isbn=" + this.isbn;
               axios.get(url)
               .then((res) => {
               this.title = res.data[0].summary.title;
               this.cover = res.data[0].summary.cover;
               })
          }
     }
}
</script>

<style>
     .book {
          text-align: center;
     }
</style>