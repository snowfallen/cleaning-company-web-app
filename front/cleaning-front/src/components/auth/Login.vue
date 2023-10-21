<template>
  <div class="container">
    <form class="m-5">
      <div class="form-group pb-2">
        <label for="email" class="pb-2">Email address</label>
        <input v-model="email" type="email" class="form-control" id="email" aria-describedby="emailHelp"
               placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
          else.</small>
      </div>
      <div class="form-group pb-2">
        <label for="password" class="pb-2">Password</label>
        <input v-model="password" type="password" class="form-control" id="password" placeholder="Password">
      </div>
      <button @click.prevent="login" type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
</template>

<script>
// import store from "../../../store.js";

export default {
  name: "Login",
  data() {
    return {
      email: null,
      password: null
    }
  },
  methods: {
    login() {
      axios.post('http://127.0.0.1:8000/api/V1/login', {email: this.email, password: this.password})
          .then(response => {
            console.log(response)
            // store.commit('setToken', response.config.headers['X-XSRF-TOKEN'])
            this.$router.push({name: 'pages.home'});
          }).catch(error => {
        console.log(error)
      })
    }
  }
}
</script>