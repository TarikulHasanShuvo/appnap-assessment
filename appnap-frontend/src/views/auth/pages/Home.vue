<template>
<!--  <div class="d-flex justify-content-center pt-5">-->
<!--    <div class="">-->
<!--      <h1 class="text-muted">Welcome to Our App. </h1>-->
<!--      <div class="d-flex justify-content-center">-->
<!--        <h6 class="text-muted">Please Login to Continue</h6>-->
<!--        <router-link to="/products" class="text-primary ms-2"> <h6>Products</h6></router-link>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
  <ProductsGallery/>
</template>

<script>
import JwtService from "@/services/jwt.service";
import ProductsGallery from "@/views/auth/components/ProductsGallery";

export default {
  name: "Home",
  components: {ProductsGallery},
  mounted() {
    if (JwtService.getToken()) {
      this.$router.push({name: "Products"});
    }
  }
}
</script>

<style scoped>

</style>
