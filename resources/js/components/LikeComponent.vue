<template>
 <div>
  <button v-if="status == false" type="button" @click.prevent="like_check" class="btn btn-outline-warning">Like</button>
   <button v-else type="button" @click.prevent="like_check" class="btn btn-warning">Liked</button>
 </div>
</template>

<script>
export default {
 props: ['post_id'],      
 data() {
   return {
     status: false,
   }
 },
 created() {
   this.first_check()
 },
 methods: {
   first_check() {
     const id = this.post_id
     const array = ["/posts/",id,"/firstcheck"];
     const path = array.join('')
     axios.get(path).then(res => {
       if(res.data == 1) {
         console.log(res)
         this.status = true
       } else {
         console.log(res)
         this.status = false
       }
     }).catch(function(err) {
       console.log(err)
     })
   },
   like_check() {
     const id = this.post_id
     const array = ["/posts/",id,"/check"];
     const path = array.join('')
     axios.get(path).then(res => {
       if(res.data == 1) {
         this.status = true
       } else {
         this.status = false
       }
     }).catch(function(err) {
       console.log(err)
     })
   },
 }
}
</script>
