<template>
    <div id="footer" class="position-relative root-footer sec-p-70 text-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10 offset-1">
                    <div class="row">
                        <div class="col-12 col-sm-3">
                            <router-link to="/" class="logo mb-3 d-block">
                                <img src="@/assets/logo.png" alt="">
                            </router-link>
                            <div class="d-flex mt-4">
                                <i class="fa fa-map-marker"></i>
                                <div class="fs-12 ms-2">722/4 West Shewrapara, Mirpur, Nearest By East West
                                    International School &College 1216 Dhaka, Dhaka Division, Bangladesh
                                </div>
                            </div>
                            <div class="d-flex mt-4">
                                <i class="fa fa-phone"></i>
                                <div class="fs-12 ms-2">(+880) 1720-425485</div>
                            </div>
                            <div class="d-flex mt-4">
                                <i class="fa fa-envelope"></i>
                                <div class="fs-12 ms-2">doctor@paincuredentalcare.com</div>
                            </div>
                            <a href="https://www.facebook.com/paincuredentalcare" target="_blank"
                               class="d-flex mt-4 text-white social-icon">
                                <i class="fa fa-facebook"></i>
                                <div class="fs-12 ms-2">Facebook</div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="footer-widget quick-links">
                                <h3>
                                    Services
                                </h3>
                                <div class="d-flex flex-column">
                                    <a href="" class="d-block mb-3">Scaling</a>
                                    <a href="" class="d-block mb-3">Polishing</a>
                                    <a href="" class="d-block mb-3">Tooth Whitening</a>
                                    <a href="" class="d-block mb-3">Root Canal</a>
                                    <a href="" class="d-block mb-3">Fibre Post RCT With Cap</a>
                                    <a href="" class="d-block mb-3">Cap</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="footer-widget quick-links">
                                <h3>
                                    Services
                                </h3>
                                <div class="d-flex flex-column">
                                    <a href="" class="d-block mb-3">Cyst Surgery</a>
                                    <a href="" class="d-block mb-3">Fracture</a>
                                    <a href="" class="d-block mb-3">Oral Tumor</a>
                                    <a href="" class="d-block mb-3">Oral Cancer</a>
                                    <a href="" class="d-block mb-3">Removal Amalgam Filling</a>
                                    <a href="" class="d-block mb-3">Fibre Bridge</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="footer-widget quick-links">
                                <h3>
                                    Services
                                </h3>
                                <div class="d-flex flex-column">
                                    <a href="" class="d-block mb-3">Light Cure Composite filling</a>
                                    <a href="" class="d-block mb-3">Alloy Filling</a>
                                    <a href="" class="d-block mb-3">Extraction For Permanent</a>
                                    <a href="" class="d-block mb-3">Impaction Teeth Extraction</a>
                                    <a href="" class="d-block mb-3">Partial Denture per Unit</a>
                                    <a href="" class="d-block mb-3">Direct Veneer Crown</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="position-absolute w-100 bottom-0 start-0 py-0 text-center text-light bg-light">
                    <a class="fw-bold text-primary fs-12" target="_blank" href="https://www.softwareart.xyz/">
                        Powered by  <img class="mx-2" style="width: 65px" src="@/assets/softart.png" alt="">

                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['settings'],
};
</script>
