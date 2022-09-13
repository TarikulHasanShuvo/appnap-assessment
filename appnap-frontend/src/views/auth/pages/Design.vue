<template>
  <div id="single-product" class="container">
    <div class="row">
      <div class="col-4">
        <vue-image-zoomer
            :zoom-amount="3"
            img-class="zoom-image"
            regular="https://orfi.com/static/media/orfi-logo.9d15a2d44846761d9d272eae9e2aeefe.svg" />
        <div class="w-100 mt-3">
          <Carousel :items-to-show="2.5" :wrap-around="true">
            <Slide v-for="slide in 10" :key="slide">
              <div class="carousel__item">
                <img src="@/assets/no-image.jpg" class="ps-3" style="height: 120px; width: 100%" alt="">
              </div>
            </Slide>

            <template #addons>
              <Navigation/>
            </template>
          </Carousel>
        </div>
      </div>
      <div class="col-8 ps-md-5">
        <h3 class="fw-light">Product Name</h3>
        <div class="review my-3">
          <span v-for="index in 4" class="fa fa-star checked me-1"></span>
          <span class="fa fa-star"></span>
        </div>
        <div class="d-flex mb-3">
          <h2 class="my-auto">$100.00</h2>
          <h5 class="badge bg-danger my-auto py-2 px-3 rounded-0 mx-3">SAVE $10.00</h5>
          <h3 class="my-auto"><del>$105.90</del></h3>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, adipisci, alias, autem beatae</p>
        <div class="row">
          <div class="col-2">
            <h6>Color</h6>
          </div>
          <div class="col-10">
            <div class="d-flex">
              <input class="color" type="color" value="#434a54"/>
              <input class="color ms-2" type="color" value="#fdc800"/>
            </div>
          </div>
        </div>
        <div class="quantity row my-4">
          <div class="col-2">
            <h6>Quantity</h6>
          </div>
          <div class="col-10">
            <div class="d-flex">
              <input type="number" class="form-control rounded-0" value="1">
             <div class="ms-2">
               <button class="btn btn-outline-secondary btn-sm rounded-0">
                 <i class="fa fa-angle-up"></i>
               </button>
               <br>
               <button class="btn btn-outline-secondary btn-sm rounded-0">
                 <i class="fa fa-angle-down"></i>
               </button>
             </div>
            </div>

          </div>
        </div>

        <button class="btn btn-danger rounded-pill px-4 py-2 my-4">
          <i class="fa fa-shopping-cart me-1"></i>ADD TO CART</button>

        <div class="mt-3">
          <i class="fa fa-repeat"></i>
          <span class="fw-bold mx-2">Add To Compare</span>
          <i class="fa fa-heart"></i>
          <span class="fw-bold ms-2">Add To Wistlist</span>
        </div>


      </div>
    </div>
  </div>
</template>

<script>
import {Carousel, Navigation, Slide} from 'vue3-carousel';
import 'vue3-carousel/dist/carousel.css';
import { VueImageZoomer } from 'vue-image-zoomer'
import 'vue-image-zoomer/dist/style.css';

export default {
  name: "Design",
  components: {
    Carousel,
    Slide,
    Navigation,
    VueImageZoomer
  },
  data () {
    return {
    }
  }
}
</script>

<style scoped>

</style>
