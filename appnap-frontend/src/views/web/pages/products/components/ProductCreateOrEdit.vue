<template>
  <!-- Modal -->
  <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $parent.editMode ? 'Edit' : 'Create' }}
            Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form @submit.prevent="$parent.editMode ? updateProduct() : createProduct() ">
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Product Name</label>
              <input v-model="$parent.product.name" type="text" class="form-control" id="exampleInputEmail1" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Select Category</label>
              <select v-model="$parent.product.category_id" class="form-select" aria-label="Default select example">
                <option selected disabled>Select One</option>
                <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Price</label>
              <input v-model="$parent.product.price" type="number" class="form-control" id="exampleInputEmail1"
                     required>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Image</label>
              <input @change="imageUpload" type="file" class="form-control" id="exampleInputEmail1"
                     accept="image/png, image/gif, image/jpeg">
              <img v-if="$parent.product.image" class="mt-3" :src="$parent.product.image" alt="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="close-btn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" :class="$parent.editMode ? 'btn-success' : 'btn-primary'">
              {{ $parent.editMode ? 'Update' : 'Save' }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import ApiService from "@/services/api.service";

export default {
  name: "CreateEdit",
  mounted() {
    this.getCategories();
  },
  data() {
    return {
      categories: [],
      image: null
    }
  },
  methods: {
    imageUpload(event) {
      this.$parent.product.image = URL.createObjectURL(event.target.files[0])
      this.image = event.target.files[0];
    },
    getCategories() {
      ApiService.get('/categories').then(({data}) => {
        this.categories = data.categories;
      }).catch((errors) => {
        console.log('error', errors.response.data.message);
      });
    },
    createProduct() {
      const formData = this.setFormData();
      ApiService.post('/product', formData, {headers: {'content-type': 'multipart/form-data'}}).then(({data}) => {
        this.$parent.products = data.products;
        this.formReset();
        this.toastMessage(data.message);
      }).catch((errors) => {
        console.log('error', errors.response.data.message);
      });
    },
    updateProduct() {
      const formData = this.setFormData();
      ApiService.post('/product/' + this.$parent.product.id, formData, {headers: {'content-type': 'multipart/form-data'}})
          .then(({data}) => {
            this.$parent.products = data.products;
            this.formReset();
            this.toastMessage(data.message);
      }).catch((errors) => {
        console.log('error', errors.response.data.message);
      });
    },

    setFormData() {
      const formData = new FormData();
      formData.append('name', this.$parent.product.name);
      formData.append('price', this.$parent.product.price);
      formData.append('category_id', this.$parent.product.category_id);
      this.image ? formData.append('image', this.image) : null;
      return formData;
    },
    formReset() {
      this.$parent.product = {
        name: '',
        price: '',
        category_id: '',
        image: ''
      }
      document.getElementById('close-btn').click();
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
