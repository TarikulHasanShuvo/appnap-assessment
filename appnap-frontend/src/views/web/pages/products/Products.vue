<template>
  <CreateEdit/>
  <ProductList/>
</template>

<script>
import ProductList from "@/views/web/pages/products/components/ProductList";
import CreateEdit from "@/views/web/pages/products/components/CreateEdit";

export default {
  name: "Products",
  components: {CreateEdit, ProductList},
  data() {
    return {
      editMode: false,
      products: [],
      product: {}
    }
  },
}
</script>

<style scoped>

</style>
