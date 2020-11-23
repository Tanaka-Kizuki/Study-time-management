<template>
     <div class="book">
          <h1>a</h1>
          <img v-bind:src="cover">
     </div>
</template>

<script>
export default {

     data() {
          return {
              title:'',
              cover:'',
          }
     },
     created() {
               const url = "https://api.openbd.jp/v1/get?isbn=" + "978-4-7741-8967-3";
               axios.get(url)
               .then((res) => {
               this.title = res.data[0].summary.title;
               this.cover = res.data[0].summary.cover;
               })
     }
}
</script>