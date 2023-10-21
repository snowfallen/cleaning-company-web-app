<template>
  <BaseHeader></BaseHeader>
  <router-view/>
</template>

<script>
import BaseHeader from "./BaseHeader.vue";

export default {
  name: "App",
  components: {
    BaseHeader
  }

}
</script>
<style scoped lang="scss">

</style>