@extends('client.layout.app')
@section('body-class', 'body header-fixed')
@section('header-class', 'main-header')
@section('content')
    <section class="tf-banner style-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content relative z-2">
                        <div class="heading">
                            <h1 class="text-color-1">Book Trusted Maintenance And Repair Services Today.</h1>
                            <p class="text-color-1 fs-18 fw-4 lh-22 font">Fast, reliable, and affordable car care near
                                you.<br>
                                Expert car care made easy.</p>
                        </div>

                        <div class="chat-wrap flex-three wow fadeInUp mt-2" data-wow-delay="600ms" data-wow-duration="1000ms">
                            <a href="/custom-service-request" class="sc-button mt-2" style="background-color: #fff;">Request Service</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- filter -->
    <div class="flat-filter-search mt--3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="flat-tabs ">
                        <div class="content-tab style2">
                            <div class="content-inner tab-content">
                                <div class="form-sl">
                                    <form method="post">
                                        <div class="wd-find-select flex">
                                            <div class="inner-group">
                                                <div class="form-group-1">
                                                    <div class="group-select">
                                                        <div class="nice-select" tabindex="0"><span
                                                                class="current">Service Type</span>
                                                            <ul class="list">
                                                                <li data-value class="option selected">Service Type
                                                                </li>
                                                                <li data-value="Audi" class="option">Vehicle Maintenance &
                                                                    Repair Services</li>
                                                                <li data-value="BMW" class="option">Vehicle Inspection &
                                                                    Diagnostic Services</li>
                                                                <li data-value="Dongfeng" class="option">
                                                                    Vehicle Consultation & Advisory Services
                                                                </li>
                                                                <li data-value="Ford" class="option">Mobile Technician &
                                                                    At-Home Services</li>
                                                                <li data-value="Foton" class="option">Vehicle Sales
                                                                    Assistance & Brokerage

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-1">
                                                    <div class="group-select">
                                                        <input type="text" name="model" class=""
                                                            placeholder="Enter Service Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-2 form-style">

                                            </div>
                                            <div class="button-search sc-btn-top">
                                                <a class="sc-button" href="#">
                                                    <span>Find Service</span>
                                                    <i class="far fa-search text-color-1"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </form>
                                    <!-- End Job  Search Form-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="tf-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section">
                        <h2>Our Services</h2>
                        <p class="mt-18">There Are Currently 17 Results</p>
                    </div>
                </div>
                <h4 class="mb-2">Vehicle Maintenance & Repair Services</h4>
                <div class="col-lg-12">
                    <div class="list-car-grid-4 gap-30">
                        <div class="box-car-list hv-one">
                            <div class="image-group relative ">
                                <div class="top flex-two">
                                    <ul class="d-flex gap-8">
                                        <li class="flag-tag success">Featured</li>

                                    </ul>
                                </div>
                                <div class="img-style">
                                    <img class="lazyload" data-src="/nanns/assets/images/car-list/car6.jpg"
                                        src="/nanns/assets/images/car-list/car6.jpg" alt="image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="text-address">
                                    <p class="text-color-3 font"><a href="/service-details">Mechanical Repairs</a></p>
                                </div>

                                <div class="days-box "
                                    style=" display: flex;
                                    justify-content: center; /* Centers horizontally */
                                    align-items: center;     /* Centers vertically if needed */
                                    margin-top: 10px;  ">
                                    <a href="/service-details" class="view-car">View Service</a>
                                </div>
                            </div>
                        </div>
                        <div class="box-car-list hv-one">
                            <div class="image-group relative ">
                                <div class="top flex-two">
                                    <ul class="d-flex gap-8">
                                        <li class="flag-tag success">Featured</li>

                                    </ul>
                                </div>
                                <div class="img-style">
                                    <img class="lazyload" data-src="/nanns/assets/images/car-list/car8.jpg"
                                        src="/nanns/assets/images/car-list/car8.jpg" alt="image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="text-address">
                                    <p class="text-color-3 font"><a href="/service-details">Routine Maintenance</a></p>
                                </div>

                                <div class="days-box "
                                    style=" display: flex;
                                    justify-content: center; /* Centers horizontally */
                                    align-items: center;     /* Centers vertically if needed */
                                    margin-top: 10px;  ">
                                    <a href="/service-details" class="view-car">View Service</a>
                                </div>
                            </div>
                        </div>
                        <div class="box-car-list hv-one">
                            <div class="image-group relative ">
                                <div class="top flex-two">
                                    <ul class="d-flex gap-8">
                                        <li class="flag-tag success">Featured</li>

                                    </ul>
                                </div>
                                <div class="img-style">
                                    <img class="lazyload" data-src="/nanns/assets/images/car-list/car9.jpg"
                                        src="/nanns/assets/images/car-list/car9.jpg" alt="image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="text-address">
                                    <p class="text-color-3 font"><a href="/service-details">2017 BMV X1 xDrive 20d xline</a></p>
                                </div>

                                <div class="days-box "
                                    style=" display: flex;
                                    justify-content: center; /* Centers horizontally */
                                    align-items: center;     /* Centers vertically if needed */
                                    margin-top: 10px;  ">
                                    <a href="/service-details" class="view-car">View Service</a>
                                </div>
                            </div>
                        </div>
                        <div class="box-car-list hv-one">
                            <div class="image-group relative ">
                                <div class="top flex-two">
                                    <ul class="d-flex gap-8">
                                        <li class="flag-tag success">Featured</li>

                                    </ul>
                                </div>
                                <div class="img-style">
                                    <img class="lazyload" data-src="/nanns/assets/images/car-list/car10.jpg"
                                        src="/nanns/assets/images/car-list/car10.jpg" alt="image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="text-address">
                                    <p class="text-color-3 font"><a href="/service-details">2017 BMV X1 xDrive 20d xline</a></p>
                                </div>
                                <div class="days-box "
                                    style=" display: flex;
                                    justify-content: center; /* Centers horizontally */
                                    align-items: center;     /* Centers vertically if needed */
                                    margin-top: 10px;  ">
                                    <a href="/service-details" class="view-car">View Service</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="themesflat-pagination pagination-style1 clearfix center">
                        <ul>
                            <li><a href="#" class="page-numbers style"><i class="far fa-angle-left"></i></a>
                            </li>
                            <li><a href="#" class="page-numbers">1</a></li>
                            <li><a href="#" class="page-numbers">2</a></li>
                            <li><a href="#" class="page-numbers current">3</a></li>
                            <li><a href="#" class="page-numbers">4</a></li>
                            <li><a href="#" class="page-numbers">...</a></li>
                            <li><a href="#" class="page-numbers style"><i class="far fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <h4 class="mb-2">Vehicle Inspection & Diagnostic Services</h4>
                <div class="col-lg-12">
                    <div class="list-car-grid-4 gap-30">
                        <div class="box-car-list hv-one">
                            <div class="image-group relative ">
                                <div class="top flex-two">
                                    <ul class="d-flex gap-8">
                                        <li class="flag-tag success">Featured</li>
                                    </ul>
                                </div>
                                <div class="img-style">
                                    <img class="lazyload" data-src="/nanns/assets/images/car-list/car4.jpg"
                                        src="/nanns/assets/images/car-list/car4.jpg" alt="image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="text-address">
                                    <p class="text-color-3 font"><a href="/service-details">2017 BMV X1 xDrive 20d xline</a></p>
                                </div>

                                <div class="days-box "
                                    style=" display: flex;
                                    justify-content: center; /* Centers horizontally */
                                    align-items: center;     /* Centers vertically if needed */
                                    margin-top: 10px;  ">
                                    <a href="/service-details" class="view-car">View Service</a>
                                </div>
                            </div>
                        </div>
                        <div class="box-car-list hv-one">
                            <div class="image-group relative ">
                                <div class="top flex-two">
                                    <ul class="d-flex gap-8">
                                        <li class="flag-tag success">Featured</li>

                                    </ul>
                                </div>
                                <div class="img-style">
                                    <img class="lazyload" data-src="/nanns/assets/images/car-list/car13.jpg"
                                        src="/nanns/assets/images/car-list/car13.jpg" alt="image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="text-address">
                                    <p class="text-color-3 font"><a href="/service-details">2017 BMV X1 xDrive 20d xline</a></p>
                                </div>

                                <div class="days-box "
                                    style=" display: flex;
                                    justify-content: center; /* Centers horizontally */
                                    align-items: center;     /* Centers vertically if needed */
                                    margin-top: 10px;  ">

                                    <a href="/service-details" class="view-car">View Service</a>
                                </div>
                            </div>
                        </div>
                        <div class="box-car-list hv-one">
                            <div class="image-group relative ">
                                <div class="top flex-two">
                                    <ul class="d-flex gap-8">
                                        <li class="flag-tag success">Featured</li>

                                    </ul>
                                </div>
                                <div class="img-style">
                                    <img class="lazyload" data-src="/nanns/assets/images/car-list/car6.jpg"
                                        src="/nanns/assets/images/car-list/car6.jpg" alt="image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="text-address">
                                    <p class="text-color-3 font"><a href="/service-details">2017 BMV X1 xDrive 20d xline</a></p>
                                </div>

                                <div class="days-box "
                                    style=" display: flex;
                                    justify-content: center; /* Centers horizontally */
                                    align-items: center;     /* Centers vertically if needed */
                                    margin-top: 10px;  ">

                                    <a href="/service-details" class="view-car">View Service</a>
                                </div>
                            </div>
                        </div>
                        <div class="box-car-list hv-one">
                            <div class="image-group relative ">
                                <div class="top flex-two">
                                    <ul class="d-flex gap-8">
                                        <li class="flag-tag success">Featured</li>

                                    </ul>
                                </div>
                                <div class="img-style">
                                    <img class="lazyload" data-src="/nanns/assets/images/car-list/car8.jpg"
                                        src="/nanns/assets/images/car-list/car8.jpg" alt="image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="text-address">
                                    <p class="text-color-3 font"><a href="/service-details">2017 BMV X1 xDrive 20d xline</a></p>
                                </div>

                                <div class="days-box "
                                    style=" display: flex;
                                    justify-content: center; /* Centers horizontally */
                                    align-items: center;     /* Centers vertically if needed */
                                    margin-top: 10px;  ">

                                    <a href="/service-details" class="view-car">View Service</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="themesflat-pagination pagination-style1 clearfix center">
                        <ul>
                            <li><a href="#" class="page-numbers style"><i class="far fa-angle-left"></i></a>
                            </li>
                            <li><a href="#" class="page-numbers">1</a></li>
                            <li><a href="#" class="page-numbers">2</a></li>
                            <li><a href="#" class="page-numbers current">3</a></li>
                            <li><a href="#" class="page-numbers">4</a></li>
                            <li><a href="#" class="page-numbers">...</a></li>
                            <li><a href="#" class="page-numbers style"><i class="far fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <h4 class="mb-2">Vehicle Consultation & Advisory Services</h4>
                <div class="col-lg-12">
                    <div class="list-car-grid-4 gap-30">
                        <div class="box-car-list hv-one">
                            <div class="image-group relative ">
                                <div class="top flex-two">
                                    <ul class="d-flex gap-8">
                                        <li class="flag-tag success">Featured</li>

                                    </ul>
                                </div>
                                <div class="img-style">
                                    <img class="lazyload" data-src="/nanns/assets/images/car-list/car9.jpg"
                                        src="/nanns/assets/images/car-list/car9.jpg" alt="image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="text-address">
                                    <p class="text-color-3 font"><a href="/service-details">2017 BMV X1 xDrive 20d xline</a></p>
                                </div>

                                <div class="days-box "
                                    style=" display: flex;
                                    justify-content: center; /* Centers horizontally */
                                    align-items: center;     /* Centers vertically if needed */
                                    margin-top: 10px;  ">
                                    <a href="/service-details" class="view-car">View Service</a>
                                </div>
                            </div>
                        </div>
                        <div class="box-car-list hv-one">
                            <div class="image-group relative ">
                                <div class="top flex-two">
                                    <ul class="d-flex gap-8">
                                        <li class="flag-tag success">Featured</li>

                                    </ul>
                                </div>
                                <div class="img-style">
                                    <img class="lazyload" data-src="/nanns/assets/images/car-list/car10.jpg"
                                        src="/nanns/assets/images/car-list/car10.jpg" alt="image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="text-address">
                                    <p class="text-color-3 font"><a href="/service-details">2017 BMV X1 xDrive 20d xline</a></p>
                                </div>

                                <div class="days-box "
                                    style=" display: flex;
                                    justify-content: center; /* Centers horizontally */
                                    align-items: center;     /* Centers vertically if needed */
                                    margin-top: 10px;  ">
                                    <a href="/service-details" class="view-car">View Service</a>
                                </div>
                            </div>
                        </div>
                        <div class="box-car-list hv-one">
                            <div class="image-group relative ">
                                <div class="top flex-two">
                                    <ul class="d-flex gap-8">
                                        <li class="flag-tag success">Featured</li>

                                    </ul>
                                </div>
                                <div class="img-style">
                                    <img class="lazyload" data-src="/nanns/assets/images/car-list/car11.jpg"
                                        src="/nanns/assets/images/car-list/car11.jpg" alt="image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="text-address">
                                    <p class="text-color-3 font"><a href="/service-details">2017 BMV X1 xDrive 20d xline</a></p>
                                </div>

                                <div class="days-box "
                                    style=" display: flex;
                                    justify-content: center; /* Centers horizontally */
                                    align-items: center;     /* Centers vertically if needed */
                                    margin-top: 10px;  ">
                                    <a href="/service-details" class="view-car">View Service</a>
                                </div>
                            </div>
                        </div>
                        <div class="box-car-list hv-one">
                            <div class="image-group relative ">
                                <div class="top flex-two">
                                    <ul class="d-flex gap-8">
                                        <li class="flag-tag success">Featured</li>

                                    </ul>
                                </div>
                                <div class="img-style">
                                    <img class="lazyload" data-src="/nanns/assets/images/car-list/car12.jpg"
                                        src="/nanns/assets/images/car-list/car12.jpg" alt="image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="text-address">
                                    <p class="text-color-3 font"><a href="/service-details">2017 BMV X1 xDrive 20d xline</a></p>
                                </div>

                                <div class="days-box "
                                    style=" display: flex;
                                    justify-content: center; /* Centers horizontally */
                                    align-items: center;     /* Centers vertically if needed */
                                    margin-top: 10px;  ">
                                    <a href="/service-details" class="view-car">View Service</a>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="themesflat-pagination pagination-style1 clearfix center">
                        <ul>
                            <li><a href="#" class="page-numbers style"><i class="far fa-angle-left"></i></a>
                            </li>
                            <li><a href="#" class="page-numbers">1</a></li>
                            <li><a href="#" class="page-numbers">2</a></li>
                            <li><a href="#" class="page-numbers current">3</a></li>
                            <li><a href="#" class="page-numbers">4</a></li>
                            <li><a href="#" class="page-numbers">...</a></li>
                            <li><a href="#" class="page-numbers style"><i class="far fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
