<template>
  <div id="product-gallery" class="container my-4 border rounded p-4">
    <div class="row">
      <div v-for="product in products" class="col-12 col-md-3 mb-4">
        <div class="card">
          <img class="img" v-if="product.image" :src="product.image" alt="">
          <img class="img" v-else src="@/assets/no-image.jpg" alt="">
          <div class="card-body">
            <h6 class="badge bg-primary px-4 py-2 rounded-pill">$ {{ product?.price }}</h6>
            <h5 class="card-title">{{ product?.name }}</h5>
            <p class="card-text">{{ product?.category_name }}</p>
            <router-link to="/single-product" @click="setActiveProduct(product)" class="btn btn-outline-warning w-100">View
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ApiService from "@/services/api.service";
import noImage from '@/assets/no-image.jpg';

export default {
  name: "ProductsGallery",
  data() {
    return {
      products: [],
    }
  },
  mounted() {
    this.getProducts();
  },
  methods: {
    getProducts() {
      ApiService.get('/product').then(({data}) => {
        this.products = data.products;
      }).catch((errors) => {
        console.log('error', errors.response.data.message);
      });
    },
    setActiveProduct(product) {
      const activeProduct = {
        name: product.name,
        price: product.price,
        category_name: product.category_name,
        images: [
          {
            url: product.image ?? noImage
          },
          {
            url: noImage
          },
          {
            url: noImage
          },
        ],
      }
      this.$store.commit('STORE_ACTIVE_PRODUCT',activeProduct)
    }
  }


}
</script>

<style scoped>

</style>
