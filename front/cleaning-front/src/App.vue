<template>
  <BaseHeader></BaseHeader>
  <router-view/>
</template>

<script>
import BaseHeader from "./BaseHeader.vue";
import store from "./store";

export default {
  name: "App",
  components: {
    BaseHeader
  },
  mounted() {
    store.state.token = localStorage.getItem('accessToken')
  }

}
</script>
<style scoped lang="scss">

</style>