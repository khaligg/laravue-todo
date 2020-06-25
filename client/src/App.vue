<template>
 <div id="app">
     <div class="container-fluid">
         <div class="container-nav">
             <Nav/>
         </div>
         <router-view/>
     </div>
  </div>
</template>

<script>
  import Nav from '@/components/Nav'

  export  default {
    components : {
      Nav
    }
  }
</script>

<style>
    .container-nav {
        padding: 20px;
        text-align: center;
    }
</style>