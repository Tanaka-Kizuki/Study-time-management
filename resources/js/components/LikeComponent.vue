<template>
 <div>
  <button v-if="status == false" type="button" @click.prevent="like_check" class="btn btn-outline-warning">Like</button><a v-if="status == false" href="#">{{count}}</a>
  <button v-else type="button" @click.prevent="like_check" class="btn btn-warning">Liked</button><a v-if="status == true" href="#">{{count}}</a>
 </div>
</template>

<script>
export default {
 props: ['post_id'],      
 data() {
   return {
     status: false,
     count: 0,
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
       if(res.data[0] == 1) {
         console.log(res)
         this.status = true
         this.count = res.data[1]
       } else {
         console.log(res)
         this.status = false
         this.count = res.data[1]
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
       if(res.data[0] == 1) {
         this.status = true
         this.count = res.data[1]
       } else {
         this.status = false
         this.count = res.data[1]
       }
     }).catch(function(err) {
       console.log(err)
     })
   },
 }
}
</script>
