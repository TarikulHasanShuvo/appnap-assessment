<template>
  <nav id="navbar" class="navbar navbar-expand-lg mt-3 px-3">
    <div class="container">
      <router-link to="/" class="navbar-brand" href="#">Appnap</router-link>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
<!--          <li class="nav-item">-->
<!--            <router-link to="/" class="nav-link active" href="#">Home</router-link>-->
<!--          </li>-->
          <li class="nav-item">
            <router-link to="products" class="nav-link active" aria-current="page" href="#">Products</router-link>
          </li>
        </ul>
          <h6 v-if="Object.keys($store.state.user).length" class="me-3">Hi, {{ $store.state.user.name  }}</h6>
          <button @click="logout" v-if="Object.keys($store.state.user).length" class="btn btn-secondary">Logout</button>
         <div v-else class="">
           <router-link to="products" class="btn btn-success me-3">Create Product</router-link>
           <router-link to="login" class="btn btn-outline-success">Login</router-link>
         </div>
      </div>
    </div>
  </nav>
</template>

<script>
import ApiService from "@/services/api.service";
import JwtService from "@/services/jwt.service";

export default {
  name: "NavBar",

  methods : {
    logout() {
        ApiService.post('/logout').then(res => {
          JwtService.destroyToken();
          this.$store.commit("STORE_USER", {});
          this.toastMessage('Logout Successfully');
          this.$router.push({name: "Login"});
        }).catch(error => {
          console.log('error', error);
        })
      },
    toastMessage(message) {
      const Toast = this.$swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter',this.$swal.stopTimer)
          toast.addEventListener('mouseleave', this.$swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'success',
        title: message
      })
    }
    }
}
</script>

<style scoped>

</style>
