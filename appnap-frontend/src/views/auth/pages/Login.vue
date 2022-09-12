<template>
  <div class="container d-flex justify-content-center">
    <div class="col-6 card mt-5 shadow">
      <div class="card-header">
        <h2 class="text-center">Login</h2>
      </div>
      <div class="card-body">
        <form @submit.prevent="login()">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input v-model="loginInfo.email" type="email" class="form-control" id="exampleInputEmail1"
                   aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input v-model="loginInfo.password" type="password" class="form-control" id="exampleInputPassword1" required>
          </div>
          <div class="mb-3 form-check">
            <input v-model="loginInfo.remember_me" type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <div class="d-flex justify-content-center mt-5">
          <h6 class="text-muted">New Member ?</h6>
          <router-link to="/register" class="text-primary ms-2"><h6>Register</h6></router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>


import ApiService from "@/services/api.service";
import JwtService from "@/services/jwt.service";

export default {
  name: "Login",
  data: () => ({
    loginInfo: {
      email: "",
      password: "",
      remember_me: false
    },
  }),
  methods: {
     login() {
      ApiService.post('/login', this.loginInfo).then(({data}) => {
        JwtService.saveToken(data.access_token);
        ApiService.init();
        this.$store.commit("STORE_USER", data.user);
        this.$router.push({name: "Products"});
      }).catch((errors) => {
        console.log('error', errors.response.data.message);
      });
    }
  }
};
</script>
