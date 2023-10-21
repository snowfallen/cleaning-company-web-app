<template>
  <div class="container">
    <form class="m-5">
      <div class="form-group pb-2">
        <label for="name" class="pb-2">Name</label>
        <input v-model="name" type="name" class="form-control" id="name" placeholder="Name">
      </div>
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
      <div class="form-group pb-2">
        <label for="password_confirmation" class="pb-2">Confirm Password</label>
        <input v-model="password_confirmation" type="password" class="form-control" id="password_confirmation"
               placeholder="Confirm Password">
      </div>
      <button @click.prevent="register" type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>
</template>

<script>
// import store from "../../../store.js";

export default {
  name: "Register",
  data() {
    return {
      name: null,
      email: null,
      password: null,
      password_confirmation: null
    }
  },
  methods: {
    register() {
      axios.post('/register', {
        name: this.name,
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation
      })
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