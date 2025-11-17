@extends('client.layout.app')
@section('body-class', 'body header-fixed')
@section('styles')
    <link rel="stylesheet" href="asset('nanns/app/css/jquery.fancybox.min.css')">
@endsection
@section('header-class', 'main-header')
@section('content')
    <section class="flat-title mb-40">
        <div class="container2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-inner style">
                        <div class="title-group fs-12"><a class="home fw-6 text-color-3" href="/">Home</a><span>
                                Cars for sale</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tf-section3 listing-detail style-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-widget flex-one mb-20 flex-wrap gap-8">
                        <div class="inner">
                            <h1 class="title">
                                {{ $car->year }}
                                {{ $car->brand->title ?? '' }}
                                {{ $car->model->title ?? '' }}
                                {{ $car->version->title ?? '' }}
                            </h1>
                            <div class="icon-box flex flex-wrap">
                                @if ($car->mileage)
                                    <div class="icons flex-three">
                                        <i class="icon-autodeal-km1"></i>
                                        <span>{{ number_format($car->mileage) }} {{ $car->mileage_unit ?? 'kms' }}</span>
                                    </div>
                                @endif
                                @if ($car->fuel_type)
                                    <div class="icons flex-three">
                                        <i class="icon-autodeal-diesel"></i>
                                        <span>{{ $car->fuel_type }}</span>
                                    </div>
                                @endif
                                @if ($car->transmission)
                                    <div class="icons flex-three">
                                        <i class="icon-autodeal-automatic"></i>
                                        <span>{{ ucfirst($car->transmission) }}</span>
                                    </div>
                                @endif
                                @if ($car->exterior_color)
                                    <div class="icons flex-three">
                                        <i class="icon-autodeal-color"></i>
                                        <span>{{ ucfirst($car->exterior_color) }}</span>
                                    </div>
                                @endif
                                @if ($car->engine_type)
                                    <div class="icons flex-three">
                                        <i class="icon-autodeal-engine"></i>
                                        <span>{{ ucfirst($car->engine_type) }}</span>
                                    </div>
                                @endif
                                @if ($car->condition)
                                    <div class="icons flex-three">
                                        <i class="icon-autodeal-condition"></i>
                                        <span>{{ ucfirst($car->condition) }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="money text-color-3 font">
                                {{ $car->currency ?? '$' }}{{ number_format($car->price) }}
                            </div>
                            {{-- <div class="price-wrap flex">
                                <p class="fs-12 lh-16 text-color-2">Monthly installment payment: <span
                                        class="fs-14 fw-5 font">$4,000</span></p>
                                <p class="fs-12 lh-16">New car price: $100.000</p>
                            </div> --}}
                        </div>
                        <ul class="action-icon style-1 flex flex-wrap">
                            <li>
                                <a href="#" class="icon">
                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.41276 8.18022C4.23116 7.85345 3.94619 7.59624 3.60259 7.44895C3.25898 7.30167 2.8762 7.27265 2.51432 7.36645C2.15244 7.46025 1.83196 7.67157 1.60317 7.96722C1.37438 8.26287 1.25024 8.62613 1.25024 8.99997C1.25024 9.37381 1.37438 9.73706 1.60317 10.0327C1.83196 10.3284 2.15244 10.5397 2.51432 10.6335C2.8762 10.7273 3.25898 10.6983 3.60259 10.551C3.94619 10.4037 4.23116 10.1465 4.41276 9.81972M4.41276 8.18022C4.54776 8.42322 4.62501 8.70222 4.62501 8.99997C4.62501 9.29772 4.54776 9.57747 4.41276 9.81972M4.41276 8.18022L11.5873 4.19472M4.41276 9.81972L11.5873 13.8052M11.5873 4.19472C11.6924 4.39282 11.8361 4.56797 12.0097 4.70991C12.1834 4.85186 12.3836 4.95776 12.5987 5.02143C12.8138 5.08509 13.0394 5.10523 13.2624 5.08069C13.4853 5.05614 13.7011 4.98739 13.8972 4.87846C14.0933 4.76953 14.2657 4.62261 14.4043 4.44628C14.5429 4.26995 14.645 4.06775 14.7046 3.85151C14.7641 3.63526 14.78 3.40931 14.7512 3.18686C14.7225 2.96442 14.6496 2.74994 14.537 2.55597C14.3151 2.17372 13.952 1.89382 13.5259 1.77643C13.0997 1.65904 12.6445 1.71352 12.2582 1.92818C11.8718 2.14284 11.585 2.50053 11.4596 2.92436C11.3341 3.34819 11.38 3.80433 11.5873 4.19472ZM11.5873 13.8052C11.4796 13.999 11.4112 14.2121 11.3859 14.4323C11.3606 14.6525 11.3789 14.8756 11.4398 15.0887C11.5007 15.3019 11.603 15.5009 11.7408 15.6746C11.8787 15.8482 12.0494 15.9929 12.2431 16.1006C12.4369 16.2082 12.65 16.2767 12.8702 16.302C13.0905 16.3273 13.3135 16.3089 13.5267 16.248C13.7398 16.1871 13.9389 16.0848 14.1125 15.947C14.2861 15.8092 14.4309 15.6385 14.5385 15.4447C14.7559 15.0534 14.809 14.5917 14.686 14.1612C14.563 13.7307 14.274 13.3668 13.8826 13.1493C13.4913 12.9319 13.0296 12.8789 12.5991 13.0019C12.1686 13.1249 11.8047 13.4139 11.5873 13.8052Z"
                                            stroke="CurrentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="icon">
                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.75 4.1875C14.75 2.32375 13.1758 0.8125 11.234 0.8125C9.78275 0.8125 8.53625 1.657 8 2.86225C7.46375 1.657 6.21725 0.8125 4.76525 0.8125C2.825 0.8125 1.25 2.32375 1.25 4.1875C1.25 9.6025 8 13.1875 8 13.1875C8 13.1875 14.75 9.6025 14.75 4.1875Z"
                                            stroke="CurrentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div dir="ltr" class="swiper mainslider slider home mb-40">
                        <div class="swiper-wrapper">
                            @php
                                $galleryImages = $car->images;
                            @endphp
                            @if ($galleryImages->isNotEmpty())
                                @foreach ($galleryImages as $image)
                                    @php
                                        $url = $image->image_url ?? asset($image->image);
                                    @endphp
                                    <div class="swiper-slide">
                                        <div class="image-list-details">
                                            <a class="image" href="{{ $url }}" data-fancybox="gallery">
                                                <img class="lazyload" data-src="{{ $url }}"
                                                    src="{{ $url }}"
                                                    alt="{{ $car->brand->title ?? '' }} {{ $car->model->title ?? '' }}">
                                            </a>
                                            <div class="specs-features-wrap flex-three">
                                                <a class="specs-features" href="{{ $url }}"
                                                    data-fancybox="gallery">
                                                    <div class="icon">
                                                        <svg width="18" height="14" viewBox="0 0 18 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M0.875 10.125L5.17417 5.82583C5.34828 5.65172 5.55498 5.51361 5.78246 5.41938C6.00995 5.32515 6.25377 5.27665 6.5 5.27665C6.74623 5.27665 6.99005 5.32515 7.21754 5.41938C7.44502 5.51361 7.65172 5.65172 7.82583 5.82583L12.125 10.125M10.875 8.875L12.0492 7.70083C12.2233 7.52672 12.43 7.38861 12.6575 7.29438C12.885 7.20015 13.1288 7.15165 13.375 7.15165C13.6212 7.15165 13.865 7.20015 14.0925 7.29438C14.32 7.38861 14.5267 7.52672 14.7008 7.70083L17.125 10.125M2.125 13.25H15.875C16.2065 13.25 16.5245 13.1183 16.7589 12.8839C16.9933 12.6495 17.125 12.3315 17.125 12V2C17.125 1.66848 16.9933 1.35054 16.7589 1.11612C16.5245 0.881696 16.2065 0.75 15.875 0.75H2.125C1.79348 0.75 1.47554 0.881696 1.24112 1.11612C1.0067 1.35054 0.875 1.66848 0.875 2V12C0.875 12.3315 1.0067 12.6495 1.24112 12.8839C1.47554 13.1183 1.79348 13.25 2.125 13.25ZM10.875 3.875H10.8817V3.88167H10.875V3.875ZM11.1875 3.875C11.1875 3.95788 11.1546 4.03737 11.096 4.09597C11.0374 4.15458 10.9579 4.1875 10.875 4.1875C10.7921 4.1875 10.7126 4.15458 10.654 4.09597C10.5954 4.03737 10.5625 3.95788 10.5625 3.875C10.5625 3.79212 10.5954 3.71263 10.654 3.65403C10.7126 3.59542 10.7921 3.5625 10.875 3.5625C10.9579 3.5625 11.0374 3.59542 11.096 3.65403C11.1546 3.71263 11.1875 3.79212 11.1875 3.875Z"
                                                                stroke="CurrentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </div>
                                                    <span class="fw-5 font text-color-2 lh-16">All image</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="swiper-slide">
                                    <div class="image-list-details">
                                        <a class="image" href="{{ $car->primary_image_url }}" data-fancybox="gallery">
                                            <img class="lazyload" data-src="{{ $car->primary_image_url }}"
                                                src="{{ $car->primary_image_url }}"
                                                alt="{{ $car->brand->title ?? '' }} {{ $car->model->title ?? '' }}">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="swiper-button-next style-3"></div>
                        <div class="swiper-button-prev style-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="listing-detail-wrap">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0"
                                            class="scrollspy-example" tabindex="0">
                                            <div class="listing-description mb-40">
                                                <div class="tfcl-listing-header ">
                                                    <h2>Description</h2>
                                                </div>
                                                <div class="tfcl-listing-info mt-30">
                                                    @if (!empty($car->description))
                                                        <p>{{ $car->description }}</p>
                                                    @else
                                                        <p>No description provided for this car.</p>
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="listing-line "></div>
                                            <div class="listing-features footer-col-block" id="scrollspyHeading2">
                                                <div class="footer-heading-desktop ">
                                                    <h2>Features</h2>
                                                </div>
                                                <div class="footer-heading-mobie listing-details-mobie mb-30">
                                                    <h2>Features</h2>
                                                </div>
                                                <div class="features-inner tf-collapse-content mt-30">
                                                    <div class="inner">
                                                        @if (!empty($meta) && is_array($meta))
                                                            @foreach ($meta as $key => $value)
                                                                <div class="listing-feature-wrap flex">
                                                                    <i class="icon-autodeal-check"></i>
                                                                    <p><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong>
                                                                        {{ $value }}</p>
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <p>No additional features listed.</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="listing-line "></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="overlay-siderbar-mobie"></div>
                            <div class="listing-sidebar">
                                <div class="widget-listing mb-30">

                                    <div class="profile-map mb-30">
                                        <div class="list-icon-pf gap-8 flex-three ">
                                            <i class="far fa-map"></i>
                                            <p class="font-1">2972 Westheimer Rd. Santa Ana, Illinois 85486 </p>
                                        </div>
                                        <div class="map">
                                            <iframe class="map-content"
                                                src="{{ $car->location ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345093746!2d144.95565131531665!3d-37.81732797975195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577d6fb4e8e5a0!2sEnvato%20HQ!5e0!3m2!1sen!2sau!4v1601473032224!5m2!1sen!2sau' }}"
                                                allowfullscreen="" loading="lazy">
                                            </iframe>
                                        </div>
                                    </div>
                                    <div class="profile-contact">
                                        <h6>Contact dealer</h6>
                                        <div class="btn-contact flex-two">
                                            <a href="tel:{{ $car->contact_phone ?? '' }}" class="btn-pf bg-orange">
                                                <i class="icon-autodeal-phone2"></i>
                                                <span class="fs-16 fw-5 lh-20 font text-color-1">Call to seller</span>
                                            </a>
                                            <a href="{{route('cars.list')}}" class="btn-pf bg-green">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span class="fs-16 fw-5 lh-20 font text-color-1">Order Car </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <!-- widegt list car -->
    <section class="tf-section3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section flex align-center justify-space flex-wrap gap-20">
                        <h2 class="wow fadeInUpSmall" data-wow-delay="0.2s" data-wow-duration="1000ms">
                            Recommended Cars For You</h2>
                        <a href="{{route('cars.list')}}" class="tf-btn-arrow wow fadeInUpSmall" data-wow-delay="0.2s"
                            data-wow-duration="1000ms">View all<i class="icon-autodeal-btn-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="swiper-container tf-sw-mobile2 " data-preview="4" data-space="30">
                        <div class="swiper-wrapper grid-sw-4">
                            @forelse($relatedCars as $related)
                                <div class="swiper-slide">
                                    <div class="box-car-list hv-one">
                                        <div class="image-group relative ">
                                            <div class="top flex-two">
                                                <ul class="d-flex gap-8">
                                                    @if($related->is_featured)
                                                        <li class="flag-tag success">Featured</li>
                                                    @endif
                                                    <li class="flag-tag style-1">
                                                        <div class="icon">
                                                            <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1.5 9L4.93933 5.56067C5.07862 5.42138 5.24398 5.31089 5.42597 5.2355C5.60796 5.16012 5.80302 5.12132 6 5.12132C6.19698 5.12132 6.39204 5.16012 6.57403 5.2355C6.75602 5.31089 6.92138 5.42138 7.06067 5.56067L10.5 9M9.5 8L10.4393 7.06067C10.5786 6.92138 10.744 6.81089 10.926 6.7355C11.108 6.66012 11.303 6.62132 11.5 6.62132C11.697 6.62132 11.892 6.66012 12.074 6.7355C12.256 6.81089 12.4214 6.92138 12.5607 7.06067L14.5 9M2.5 11.5H13.5C13.7652 11.5 14.0196 11.3946 14.2071 11.2071C14.3946 11.0196 14.5 10.7652 14.5 10.5V2.5C14.5 2.23478 14.3946 1.98043 14.2071 1.79289C14.0196 1.60536 13.7652 1.5 13.5 1.5H2.5C2.23478 1.5 1.98043 1.60536 1.79289 1.79289C1.60536 1.98043 1.5 2.23478 1.5 2.5V10.5C1.5 10.7652 1.60536 11.0196 1.79289 11.2071C1.98043 11.3946 2.23478 11.5 2.5 11.5ZM9.5 4H9.50533V4.00533H9.5V4ZM9.75 4C9.75 4.0663 9.72366 4.12989 9.67678 4.17678C9.62989 4.22366 9.5663 4.25 9.5 4.25C9.4337 4.25 9.37011 4.22366 9.32322 4.17678C9.27634 4.12989 9.25 4.0663 9.25 4C9.25 3.9337 9.27634 3.87011 9.32322 3.82322C9.37011 3.77634 9.4337 3.75 9.5 3.75C9.5663 3.75 9.62989 3.77634 9.67678 3.82322C9.72366 3.87011 9.75 3.9337 9.75 4Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </div>
                                                        {{ $related->images->count() }}
                                                    </li>
                                                </ul>
                                                @if($related->year)
                                                    <div class="year flag-tag">{{ $related->year }}</div>
                                                @endif
                                            </div>
                                            <ul class="change-heart flex">
                                                <li class="box-icon w-32">
                                                    <a href="my-favorite.html" class="icon">
                                                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16.5 4.875C16.5 2.80417 14.7508 1.125 12.5933 1.125C10.9808 1.125 9.59583 2.06333 9 3.4025C8.40417 2.06333 7.01917 1.125 5.40583 1.125C3.25 1.125 1.5 2.80417 1.5 4.875C1.5 10.8917 9 14.875 9 14.875C9 14.875 16.5 10.8917 16.5 4.875Z" stroke="CurrentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="img-style">
                                                <img class="lazyload" data-src="{{ $related->primary_image_url }}" src="{{ $related->primary_image_url }}" alt="{{ $related->brand->title ?? '' }} {{ $related->model->title ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="text-address">
                                                <p class="text-color-3 font">{{ $related->brand->title ?? '' }}</p>
                                            </div>
                                            <h5 class="link-style-1">
                                                <a href="{{route('car.details', ['id' => $related->id])}}">
                                                    {{ $related->year }}
                                                    {{ $related->brand->title ?? '' }}
                                                    {{ $related->model->title ?? '' }}
                                                    {{ $related->version->title ?? '' }}
                                                </a>
                                            </h5>
                                            <div class="icon-box flex flex-wrap">
                                                @if($related->mileage)
                                                    <div class="icons flex-three">
                                                        <i class="icon-autodeal-km1"></i>
                                                        <span>{{ number_format($related->mileage) }} {{ $related->mileage_unit ?? 'kms' }}</span>
                                                    </div>
                                                @endif
                                                @if($related->fuel_type)
                                                    <div class="icons flex-three">
                                                        <i class="icon-autodeal-diesel"></i>
                                                        <span>{{ $related->fuel_type }}</span>
                                                    </div>
                                                @endif
                                                @if($related->transmission)
                                                    <div class="icons flex-three">
                                                        <i class="icon-autodeal-automatic"></i>
                                                        <span>{{ ucfirst($related->transmission) }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="money fs-20 fw-5 lh-25 text-color-3">
                                                {{ $related->currency ?? '$' }}{{ number_format($related->price) }}
                                            </div>
                                            <div class="days-box flex justify-space align-center">
                                                <a href="{{route('car.details', ['id' => $related->id])}}" class="view-car">View car</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>No recommended cars available.</p>
                            @endforelse
                        </div>

                            </div>
                        </div>
                        <div class="swiper-pagination5"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('nanns/app/js/jquery.easing.js') }}"></script>
    <script src="{{ asset('nanns/app/js/jquery.fancybox.js') }}"></script>
@endsection
