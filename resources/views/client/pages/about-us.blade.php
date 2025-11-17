@extends('client.layout.app')
@section('body-class', 'body header-fixed')
@section('header-class', 'main-header')
@section('content')

   <section class="tf-banner style-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content relative z-2">
                    <div class="heading">
                        <h1 class="text-color-1">Buy & Get Your Car Services <br>All in One Place!</h1>
                        <p class="text-color-1 fs-18 fw-4 lh-22 font">
                           Discover your perfect car and enjoy reliable maintenance and repair services with ease.
                        </p>
                        <a href="#" class="sc-button btn-svg">
                            <span>Explore Our Services</span>
                            <i class="icon-autodeal-next"></i>
                        </a>
                         <a href="#" class="sc-button btn-svg">
                            <span>Order a Car</span>
                            <i class="icon-autodeal-next"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


 <!-- widegt why-choose-us -->
<section class="tf-section section-why-choose-us">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="image-wcs relative">
                    <ul class="icon-list">
                        <li class="tf-icon-list ani5">
                            <i class="icon-autodeal-check"></i>
                            <span class="fs-18 fw-6 lh-25 text-color-2">Trusted Car Experts</span>
                        </li>
                        <li class="tf-icon-list ani4">
                            <i class="icon-autodeal-check"></i>
                            <span class="fs-18 fw-6 lh-25 text-color-2">Thousands of Happy Customers</span>
                        </li>
                        <li class="tf-icon-list ani5">
                            <i class="icon-autodeal-check"></i>
                            <span class="fs-18 fw-6 lh-25 text-color-2">Fast & Reliable Service</span>
                        </li>
                    </ul>
                    <div class="image-inner1 hover-img-wrap img-style-hover">
                        <img class="ls-is-cached lazyloaded" data-src="/nanns/assets/images/section/wcu-1.jpg"
                            src="/nanns/assets/images/section/wcu-1.jpg" alt="images">
                    </div>
                    <div class="image-inner2">
                        <img class="ls-is-cached lazyloaded" data-src="/nanns/assets/images/section/wcu-2.png"
                            src="/nanns/assets/images/section/wcu-2.png" alt="images">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-wcs">
                    <div class="heading-section">
                        <h2>Why Choose Nanns</h2>
                        <p class="mt-18">
                            At Nanns, we make car ownership simple — from trusted car inspections and smooth purchasing to expert maintenance and service support.
                            Our goal is to keep your car running at its best, always.
                        </p>
                    </div>

                    <div class="tf-icon-box-list">
                        <div class="tf-icon-box style-2">
                            <div class="icon">
                                <!-- existing svg unchanged -->
                            </div>
                            <div class="content">
                                <h5><a href="#">Proven Expertise</a></h5>
                                <p>
                                    Our team brings years of experience in car services and inspection, ensuring you get professional advice and quality care every time.
                                </p>
                            </div>
                        </div>

                        <div class="tf-icon-box style-2">
                            <div class="icon">
                                <!-- existing svg unchanged -->
                            </div>
                            <div class="content">
                                <h5><a href="#">Personalized Solutions</a></h5>
                                <p>
                                    Whether you’re buying a car or need expert maintenance, Nanns offers tailored solutions designed around your specific vehicle needs.
                                </p>
                            </div>
                        </div>

                        <div class="tf-icon-box style-2">
                            <div class="icon">
                                <!-- existing svg unchanged -->
                            </div>
                            <div class="content">
                                <h5><a href="#">Trusted & Transparent</a></h5>
                                <p>
                                    We believe in building trust through transparency — no hidden costs, no surprises, just honest service and reliable results for every customer.
                                </p>
                            </div>
                        </div>
                    </div> <!-- end icon-box-list -->
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- widegt team -->
    <section class="tf-section3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section center">
                        <h2>Meet Our Agents</h2>
                    </div>
                </div>
                  @php
                    $teams = \App\Models\Team::all();
                  @endphp

                  @forelse($teams as $team)
                <div class="col-lg-3 col-6">
                    <div class="tf-team box hover-img">
                        <div class="images relative img-style">
                            <a href="javascript:void(0)" class="team-bio-trigger"
                               data-name="{{ $team->name }}"
                               data-role="{{ $team->role }}"
                               data-bio="{{ $team->bio }}"
                               data-image="{{ $team->image }}">
                                <img class="lazyloaded" data-src="{{ $team->image }}"
                                    src="{{ $team->image }}" alt="{{ $team->name }}">
                            </a>

                        </div>
                        <div class="content flex-two">
                            <div class="inner">
                                <h3 class="link-style-1">
                                    <a href="javascript:void(0)" class="team-bio-trigger"
                                       data-name="{{ $team->name }}"
                                       data-role="{{ $team->role }}"
                                       data-bio="{{ $team->bio }}"
                                       data-image="{{ $team->image }}">
                                        {{ $team->name }}
                                    </a>
                                </h3>
                                <p class=" text-color-2">{{ $team->role }}</p>
                            </div>
                            <div class="icon-box flex">
                                <a href="tel:{{ $team->phone }}"><i class="fas fa-phone-alt"></i></a>
                                <a href="mailto:{{ $team->email }}"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                  @empty
                <div class="col-lg-12">
                    <p class="text-center">No team members available at the moment.</p>
                </div>
                  @endforelse
                <div class="col-lg-12">
                    <div class="box-text flex justify-center mt-15 center flex-wrap">
                        <p>Become an agent and get the commission you deserve. </p> <a href="{{route('contact-us')}}"
                            class="text-color-3 font-2 "> Contact us</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

   <!-- widegt banner -->
    <section class="tf-section-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="tf-image-box style1 bg-orange flex-three ">
                        <div class="image">
                            <img class=" ls-is-cached lazyloaded" data-src="/nanns/assets/images/img-box/find-car-1.png"
                                src="/nanns/assets/images/img-box/find-car-1.png" alt="images">
                        </div>
                        <div class="content">
                            <h3 class="text-color-1"><a href="/">Are you looking for a car?</a></h3>
                            <p class="text-color-1">Save time and effort as you no longer need to visit multiple
                                stores to find the right car.</p>
                            <a href="{{route('cars.list')}}" class="find-cars">
                                <span>Find cars</span>
                                <i class="icon-autodeal-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tf-image-box style1 bg-black flex-three ">
                        <div class="image">
                            <img class=" ls-is-cached lazyloaded" data-src="/nanns/assets/images/img-box/find-car-2.png"
                                src="/nanns/assets/images/img-box/find-car-2.png" alt="images">
                        </div>
                        <div class="content">
                            <h3 class="text-color-1"><a href="/">Do you want to any car service?</a></h3>
                            <p class="text-color-1">Find your perfect car service quickly with
                                our user-friendly online service.</p>
                            <a href="{{route('service-listings')}}" class="find-cars">
                                <span>Find Services</span>
                                <i class="icon-autodeal-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- widegt tetimonial -->
    <section class="tf-section3 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section center">
                        <h2>We love our clients</h2>
                    </div>
                </div>
                  @php
                    $reviews = \App\Models\Review::where('status', 1)->latest()->get();
                @endphp
               <div class="col-lg-12">
                    <div dir="ltr" class="swiper-container carousel-7 overflow-hidden">
                        <div class="swiper-wrapper ">
                            @forelse($reviews as $review)
                                <div class="swiper-slide">
                                    <div class="tf-testimonial bg-4">
                                        <div class="inner-top flex-two">
                                            <div class="rating-stars">
                                                @php $rating = (int) ($review->rating ?? 0); @endphp
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $rating)
                                                        <i class="fas fa-star text-warning"></i>
                                                    @else
                                                        <i class="far fa-star text-warning"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <p class="fs-12">
                                                {{ optional($review->created_at)->format('d M Y h:i a') }}
                                            </p>
                                        </div>
                                        <p class="fs-16 lh-22 text-color-2">"{{ $review->message }}"</p>
                                        <div class="author-box flex">
                                            <div class="images">
                                                <img class="lazyload" data-src="{{ $review->image }}"
                                                    src="{{ $review->image }}" alt="{{ $review->name }}">
                                            </div>
                                            <div class="content">
                                                <h5>{{ $review->name }}</h5>
                                                <p class="fs-12 lh-16">Customer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="fs-16 lh-22 text-color-2">No reviews available yet.</p>
                            @endforelse
                        </div>
                        <div class="swiper-pagination3"></div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Team Bio Mini Modal -->
    <div id="teamBioModal" class="team-bio-modal" style="display: none;">
        <div class="team-bio-modal-backdrop"></div>
        <div class="team-bio-modal-content">
            <button type="button" class="team-bio-modal-close" aria-label="Close">&times;</button>
            <div class="team-bio-modal-inner">
                <div class="team-bio-modal-image">
                    <img id="teamBioImage" src="" alt="">
                </div>
                <div class="team-bio-modal-text">
                    <h3 id="teamBioName" class="mb-5"></h3>
                    <p id="teamBioRole" class="text-color-2 mb-10"></p>
                    <p id="teamBioText"></p>
                </div>
            </div>
        </div>
    </div>

    <style>
        .team-bio-modal {
            position: fixed;
            inset: 0;
            z-index: 1050;
        }

        .team-bio-modal-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .team-bio-modal-content {
            position: relative;
            max-width: 420px;
            margin: 80px auto;
            background: #ffffff;
            border-radius: 8px;
            padding: 20px 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .team-bio-modal-inner {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .team-bio-modal-image img {
            width: 72px;
            height: 72px;
            object-fit: cover;
            border-radius: 50%;
        }

        .team-bio-modal-close {
            position: absolute;
            top: 8px;
            right: 10px;
            border: none;
            background: transparent;
            font-size: 22px;
            line-height: 1;
            cursor: pointer;
        }

        body.team-bio-modal-open {
            overflow: hidden;
        }

        @media (max-width: 575.98px) {
            .team-bio-modal-content {
                margin: 40px 15px;
                padding: 16px 18px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modal = document.getElementById('teamBioModal');
            if (!modal) return;

            var nameEl = document.getElementById('teamBioName');
            var roleEl = document.getElementById('teamBioRole');
            var bioEl = document.getElementById('teamBioText');
            var imgEl = document.getElementById('teamBioImage');

            var triggers = document.querySelectorAll('.team-bio-trigger');
            triggers.forEach(function (el) {
                el.addEventListener('click', function (e) {
                    e.preventDefault();

                    var name = this.getAttribute('data-name') || '';
                    var role = this.getAttribute('data-role') || '';
                    var bio = this.getAttribute('data-bio') || '';
                    var image = this.getAttribute('data-image') || '';

                    nameEl.textContent = name;
                    roleEl.textContent = role;
                    bioEl.textContent = bio;

                    if (image) {
                        imgEl.src = image;
                        imgEl.alt = name;
                        imgEl.style.display = 'block';
                    } else {
                        imgEl.style.display = 'none';
                    }

                    modal.style.display = 'block';
                    document.body.classList.add('team-bio-modal-open');
                });
            });

            var closeEls = modal.querySelectorAll('.team-bio-modal-close, .team-bio-modal-backdrop');
            closeEls.forEach(function (el) {
                el.addEventListener('click', function () {
                    modal.style.display = 'none';
                    document.body.classList.remove('team-bio-modal-open');
                });
            });
        });
    </script>
@endsection
