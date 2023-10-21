<template>
  <header class="d-flex bg-light justify-content-between">
    <menu class="d-flex justify-content-center">
      <router-link :to="{name: 'pages.home'}" class="nav-link p-2">Home</router-link>
      <router-link :to="{name: 'pages.services'}" class="nav-link p-2">Services</router-link>
      <router-link :to="{name: 'pages.join'}" class="nav-link p-2">Join out team!</router-link>
      <router-link :to="{name: 'pages.contact'}" class="nav-link p-2">Contact</router-link>
    </menu>
    <menu class="d-flex justify-content-center">
      <router-link :to="{name: 'user.login'}" class="nav-link p-2">Login</router-link>
      <router-link :to="{name: 'user.register'}" class="nav-link p-2">Register</router-link>
      <a @click.prevent="logout" class="nav-link p-2">Logout</a>
    </menu>
  </header>
</template>

<script>
// import store from "../../store.js";

export default {
  name: "BaseHeader",
  methods: {
    logout() {
      axios.post('/logout')
          .then(response => {
            // store.commit('deleteToken')
            // localStorage.removeItem('x_xsrf_token');
            this.$router.push({name: 'user.login'})
          })
    }
  },
  // computed: {
  //   token() {
  //     return store.state.token
  //   }
  // }
}
</script>

<style scoped>
a {
  cursor: pointer;
}
</style>