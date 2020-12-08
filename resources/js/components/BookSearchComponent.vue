<template>
     <div class="book">
          <input type="text" v-model="isbn" placeholder="ISBNコードを入力" pattern="\d{3}-\d{1}-\d{4}-\d{4}-\d{1}" title="●●●-○-◉◉◉◉-●●●●-○で入力" name="isbn">
          <button v-on:click="search(); changeSwich()">検索</button>
          <div class="form" v-show="ok">
               <form action="/book/record">
                    <img v-bind:src="cover">
                    <p>{{title}}</p>
                    <input type="hidden" name="cover" v-bind:value="cover">
                    <input type="hidden" name="title" v-bind:value="title">
               <button class="entry" v-on:click="changeSwitch()">登録</button>
          </form>
          </div>
     </div>
</template>

<script>
export default {

     data() {
          return {
              isbn:'',
              title:'',
              cover:'',
              ok:false,
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
          },
          changeSwich: function() {
               this.ok = !this.ok;
          }
     }
}
</script>

<style>
     .book {
          text-align: center;
     }
</style>