<template>
  <div class="container">
    <NavBar/>
    <router-view></router-view>
  </div>
</template>
<script>
import NavBar from "@/views/auth/layout/NavBar";
export default {
  name: "WebLayout",
  components: {NavBar},
};
</script>

<style scoped>
</style>
