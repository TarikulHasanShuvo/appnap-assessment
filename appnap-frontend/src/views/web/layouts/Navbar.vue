<template>
    <div class="header-section">
        <div class="top-nav border-bottom py-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10 col-12 offset-sm-1">
                        <div class="d-flex justify-content-between align-items-center px-4">
                            <div class="fs-12">Opening Hours :
                                <span class="text-secondary">Saturday to Thursday - 10am to 10pm</span>
                            </div>
                            <div class="d-flex social-link">
                                <a href="https://www.facebook.com/paincuredentalcare" target="_blank" class="px-3"><i
                                    class="fa fa-facebook"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-logo-section py-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10 col-12 offset-sm-1">
                        <div class="d-flex flex-column flex-sm-row justify-content-between">
                            <router-link to="/" class="logo">
                                <img src="@/assets/logo.png" alt="">
                            </router-link>
                            <div class="items d-flex flex-column flex-sm-row gap-2 gap-sm-4 ">
                                <div class="d-flex align-items-center fs-14">
                                    <div class="border fs-5 p-2">
                                        <i class="fa fa-envelope-o text-primary"></i>
                                    </div>
                                    <div class="ms-2">
                                        <b>EMAIL</b><br>
                                        appointment@paincuredentalcare.com
                                    </div>
                                </div>
                                <div class="d-flex align-items-center fs-14">
                                    <div class="border fs-5 p-2">
                                        <i class="fa fa-phone text-primary"></i>
                                    </div>
                                    <div class="ms-2">
                                        <b>CALL NOW</b><br>
                                        (+880) 1720-425485
                                    </div>
                                    <div class="ms-3">
                                        <router-link to="login"
                                                     class="border fw-bold ms-auto nav-link rounded text-primary">Log in
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--        <div class="nav-section sticky-top">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                        <div class="container-fluid">
                            <div class="col-10 offset-1">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-uppercase">
                                        <li class="nav-item">
                                            <a class="nav-link text-white active" aria-current="page" href="#home">HOME</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="#about-section">ABOUT</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="#our-service-section">Services</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="#doctors-section">doctors</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="#footer">contact us</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>-->
    </div>
</template>

<script>
export default {
    props: ['settings']
};
</script>

