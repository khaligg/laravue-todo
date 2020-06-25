<template>
  <div class="login-form">
    <form @submit.prevent="submit()">
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" v-model="form.email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" v-model="form.password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
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
            name: 'dashboard'
          })

      })
    }
  }
}
</script>

<style scoped>
.login-form {
  padding: 20px;
}
</style>