<template>
  <form @submit.prevent="submit()">

    <div>
      <label for="email">
        Email
      </label>

      <input type="text" name="email" id="email" v-model="form.email">
    </div>
    <div>
      <label for="password">
        Password
      </label>

      <input type="password" name="password" id="password" v-model="form.password">
    </div>
    <div>
      <button type="submit">Submit</button>
    </div>


    <div>
      <p>kg@kg.com</p>
      <p>pass</p>
    </div>
  </form>
</template>

<script>
  import { mapActions } from 'vuex'

export default {
  name: 'signIn',
  components: {
    //
  },
  data() {
    return {
      form: {
        email: '',
        password: '',
      }
    }
  },
  methods: {
    ...mapActions({
      signIn: 'auth/signIn'
    }),
    submit() {
      this.signIn(this.form).then(()=>{
        this.$router.replace({
          name: 'home'
        })
      })
    }
  }
}
</script>
