<template>
 <div id="app">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-6 mx-auto">
                <Nav/>
                 <hr>
             </div>
         </div>
         <div class="col-md-12 mx-auto">
             <router-view/>
         </div>
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
    #app {
        padding: 20px;
    }

    .fade-enter {
        opacity: 0;
    }

    .fade-enter-active {
        transition: opacity 1s;
    }

    .fade-leave {

    }

    .fade-leave-active {
        transition: opacity 1s;
        opacity: 0;
    }
</style>