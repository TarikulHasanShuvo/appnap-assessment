<template>
  <div id="product" class="card mt-5">
    <div class="card-header d-flex justify-content-between">
      <h5>Product List</h5>
      <button @click="createProduct" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Add
        Product
      </button>
    </div>
    <div class="card-body">
      <table v-if="$parent.products.length" class="table">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Category Name</th>
          <th scope="col">Price</th>
          <th scope="col">Image</th>
          <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr  v-for="(product,index) in $parent.products">
          <th scope="row">{{ index + 1 }}</th>
          <td>{{ product.name ? product.name : '-' }}</td>
          <td>{{ product.category_name ? product.category_name : '-' }}</td>
          <td>{{ product.price ? product.price : '-' }}</td>
          <td>
            <img v-if="product.image" :src="product.image" alt="" width="80">
            <img v-else src="@/assets/no-image.jpg" alt="" width="80">
          </td>
          <td>
            <button @click="editProduct(product)" class="btn btn-success btn-sm" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Edit
            </button>
            <button @click="deleteProduct(product.id)" class="btn btn-danger btn-sm ms-2">Delete</button>
          </td>
        </tr>
        </tbody>
      </table>
      <h5 v-else class="text-muted text-center mt-3">No product found...</h5>
    </div>
  </div>
</template>

<script>
import ApiService from "@/services/api.service";

export default {
  name: "ProductList",
  mounted() {
    this.getProducts();
  },
  methods: {
    getProducts() {
      ApiService.get('/product').then(({data}) => {
        this.$parent.products = data.products;
      }).catch((errors) => {
        console.log('error', errors.response.data.message);
      });
    },
    editProduct(product) {
      const editableProduct = {
        id: product.id,
        name: product.name,
        category_id: product.category_id,
        price: product.price,
        image: product.image
      };
      this.$parent.editMode = true;
      this.$parent.product = editableProduct;
    },
    createProduct() {
      this.$parent.editMode = false;
      this.$parent.product = {};
    },
    deleteProduct(id) {
      this.$swal.fire({
        title: 'Do you want to Delete Product?',
        showCancelButton: true,
        confirmButtonText: 'Yes',
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          ApiService.delete(`product/${id}`).then(({data}) => {
            this.$parent.products = data.products;
            this.$swal.fire(data.message, '', 'success');
          }).catch((errors) => {
            console.log('error', errors.response.data.message);
          });
        }
      })

    }
  }
}
</script>

<style scoped>

</style>
