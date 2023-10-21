<template>
  <header class="d-flex bg-light justify-content-between">
    <menu class="d-flex justify-content-center">
      <router-link :to="{name: 'pages.home'}" class="nav-link p-2">Home</router-link>
      <router-link :to="{name: 'pages.services'}" class="nav-link p-2">Services</router-link>
      <router-link :to="{name: 'pages.join'}" class="nav-link p-2">Join out team!</router-link>
      <router-link :to="{name: 'pages.contact'}" class="nav-link p-2">Contact</router-link>
    </menu>
    <menu class="d-flex justify-content-center">
      <router-link v-if="!token" :to="{name: 'user.login'}" class="nav-link p-2">Login</router-link>
      <router-link v-if="!token" :to="{name: 'user.register'}" class="nav-link p-2">Register</router-link>
      <a v-if="token" @click.prevent="logout" class="nav-link p-2">Logout</a>
    </menu>
  </header>
</template>

<script>
import store from "./store";

export default {
  name: "BaseHeader",
  methods: {
    logout() {
      let userId = localStorage.getItem('userId')
      let token = store.state.token
      const config = {
        headers: {
          'Authorization': `Bearer ${token}`
        }
      };
      axios.post(`http://127.0.0.1:8000/api/V1/logout/${userId}`, null, config)
          .then(response => {
            store.commit('deleteToken')
            localStorage.removeItem('userId')
            localStorage.removeItem('accessToken')
            this.$router.push({name: 'user.login'})
          })
    }
  },
  computed: {
    token() {
      return store.state.token
    }
  }
}
</script>

<style scoped>
a {
  cursor: pointer;
}
</style>