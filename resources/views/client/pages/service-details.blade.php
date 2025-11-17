@extends('client.layout.app')
@section('body-class', 'body header-fixed')
@section('header-class', 'main-header')
@section('content')
    <section class="flat-title mb-40">
        <div class="container2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-inner style">
                        <div class="title-group fs-12"><a class="home fw-6 text-color-3"
                                href="index.html">Home</a><span>Service Details
                            </span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tf-section3 listing-detail style-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="features-thumb mb-4 img-style-hover">
                        <img class="w-100" src="/nanns/assets/images/dashboard/single-dealer.jpg" alt="images">
                    </div>
                    <h2 class="title mb-3">
                        Honda cars Pasig
                    </h2>
                    <p class="mb-2">Stay informed about emerging trends in the housing market, such as the demand for
                        sustainable homes, technological advancements, and demographic shifts. Companies aligning with these
                        trends may present attractive investment <br> opportunities.</p>
                    <p>Take a long-term investment approach if you believe in the stability and growth potential of the
                        housing sector. Look for companies with solid fundamentals and a track record of success. For
                        short-term traders, capitalize on market fluctuations driven by economic reports, interest rate
                        changes, or industry-specific news. Keep a close eye on earnings reports and government housing data
                        releases.</p>



                    <section class="section-blog tf-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="heading-section flex align-center justify-space flex-wrap gap-20">
                                        <h2 class="wow fadeInUpSmall" data-wow-delay="0.2s" data-wow-duration="1000ms">
                                            Related Services</h2>
                                        <a href="/service-listings" class="tf-btn-arrow wow fadeInUpSmall"
                                            data-wow-delay="0.2s" data-wow-duration="1000ms">View all<i
                                                class="icon-autodeal-btn-right"></i></a>
                                    </div>
                                    <div dir="ltr" class="swiper tf-sw-mobile" data-preview="3" data-tablet="2"
                                        data-mobile-sm="2" data-mobile="1" data-space-lg="30" data-space-md="15"
                                        data-space="15">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="blog-article-item style1 hover-img">
                                                    <div class="images img-style relative flex-none">
                                                        <img class="lazyload"
                                                            data-src="/nanns/assets/images/blog/blog-5.jpg"
                                                            src="/nanns/assets/images/blog/blog-5.jpg" alt="images">
                                                        <div class="date">Featured</div>
                                                    </div>
                                                    <div class="content">
                                                        <div class="sub-box flex align-center fs-13 fw-6">

                                                            <a href="/service-details" class="category text-color-3">First
                                                                Drives</a>
                                                        </div>
                                                        <h3><a href="/service-details">Vehicle Maintenance & Repair
                                                                Services</a></h3>
                                                        <p>The sub-4 metre SUV segment has been quite active over the last
                                                            six
                                                            months or so, with the launch of various facelifted...</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="blog-article-item style1 hover-img">
                                                    <div class="images img-style relative flex-none">
                                                        <img class="lazyload"
                                                            data-src="/nanns/assets/images/blog/blog-3.jpg"
                                                            src="/nanns/assets/images/blog/blog-3.jpg" alt="images">
                                                        <div class="date">Featured</div>
                                                    </div>
                                                    <div class="content">
                                                        <div class="sub-box flex align-center fs-13 fw-6">

                                                            <a href="/service-details" class="category text-color-3">First
                                                                Drives</a>
                                                        </div>
                                                        <h3><a href="/service-details">Vehicle Consultation & Advisory
                                                                Services</a>
                                                        </h3>
                                                        <p>The sub-4 metre SUV segment has been quite active over the last
                                                            six
                                                            months or so, with the launch of various facelifted...</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="blog-article-item style1 hover-img">
                                                    <div class="images img-style relative flex-none">
                                                        <img class="lazyload"
                                                            data-src="/nanns/assets/images/blog/blog-2.jpg"
                                                            src="/nanns/assets/images/blog/blog-2.jpg" alt="images">
                                                        <div class="date">Featured</div>
                                                    </div>
                                                    <div class="content">
                                                        <div class="sub-box flex align-center fs-13 fw-6">

                                                            <a href="/service-details" class="category text-color-3">First
                                                                Drives</a>
                                                        </div>
                                                        <h3><a href="/">Vehicle Inspection & Diagnostic Services</a>
                                                        </h3>
                                                        <p>The sub-4 metre SUV segment has been quite active over the last
                                                            six
                                                            months or so, with the launch of various facelifted...</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-pagination3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                    {{-- <div class="widget-book-apoint">
                        <p class="mb-3">You are interested in this dealership and want to book an appointment with them?
                            <br> Just leave your contact and preferred date and time
                        </p>
                        <a href="#">Request Service</a>
                    </div> --}}
                    <div class="widget-book-apoint">
                        <p class="mb-3">
                            You are interested in this dealership and want to book an appointment with them?
                            <br> Just leave your contact and preferred date and time.
                        </p>

                        <form method="post" action="" enctype="multipart/form-data" class="form-submit">
                            @csrf

                            <div class="grid-sw-2">
                                <fieldset class="style-text">
                                    <label class="font-1 fs-14 fw-5">Name</label>
                                    <input type="text" name="name" class="tb-my-input" placeholder="Your Name"
                                        required>
                                </fieldset>

                                <fieldset class="style-text">
                                    <label class="font-1 fs-14 fw-5">Email</label>
                                    <input type="email" name="email" class="tb-my-input" placeholder="Your Email"
                                        required>
                                </fieldset>
                            </div>

                            <div class="grid-sw-2">
                                <fieldset class="style-text">
                                    <label class="font-1 fs-14 fw-5">Phone</label>
                                    <input type="tel" name="phone" class="tb-my-input"
                                        placeholder="Your Phone Number" required>
                                </fieldset>

                                <fieldset class="style-text">
                                    <label class="font-1 fs-14 fw-5">Preferred Date</label>
                                    <input type="date" name="date" class="tb-my-input" required>
                                </fieldset>
                            </div>



                            <fieldset class="style-text">
                                <label class="font-1 fs-14 fw-5">Message</label>
                                <textarea name="message" rows="3" placeholder="Your message or request"></textarea>
                            </fieldset>

                            <div class="row">
                                <div class="col-sm-6">
                                    <fieldset class="style-text">
                                        <label class="font-1 fs-14 fw-5">Attach Image (optional)</label>
                                        <input type="file" name="attachment" class="tb-my-input" accept="image/*">
                                        <small class="fs-12 text-muted">
                                            Upload image of your car or issue (JPG, PNG up to 5MB)
                                        </small>
                                    </fieldset>
                                </div>

                                <div class="col-sm-6">
                                    <fieldset class="phone-wrap style-text">
                                        <label class="font-1 fs-14 fw-5">Service Type</label>
                                        <select name="service_type" class="tb-my-input" required
                                            style="height: 48px; border: 1px solid #e1e1e1;  padding: 0 15px; border-radius: 6px; background-color: #fff; font-size: 14px; color: #555; appearance: none;">
                                            <option value="">Select Service</option>
                                            <option value="Maintenance">Maintenance</option>
                                            <option value="Repair">Repair</option>
                                            <option value="Inspection">Inspection</option>
                                            <option value="Detailing">Detailing</option>
                                            <option value="Custom Upgrade">Custom Upgrade</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </fieldset>
                                </div>
                            </div>


                            <div class="button-boxs">
                                <button type="submit" class="sc-button">
                                    <span>Request Service</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    {{-- ======= Review Section Styled Like Service Booking ============--}}
                    <div class="widget-book-apoint mt-5">
                        <div class="heading-section flex align-center justify-space flex-wrap gap-20">
                                        <h2 class="wow fadeInUpSmall" data-wow-delay="0.2s" data-wow-duration="1000ms">
                                            Add Review</h2>
                                    </div>
                        <p class="mb-3">
                            Share your experience with this service.
                            <br> Your feedback helps others make better decisions.
                        </p>

                        <form class="form-submit" enctype="multipart/form-data">

                            <div class="grid-sw-2">
                                <fieldset class="style-text">
                                    <label class="font-1 fs-14 fw-5">Name</label>
                                    <input type="text" class="tb-my-input" placeholder="Your Name">
                                </fieldset>

                                <fieldset class="style-text">
                                    <label class="font-1 fs-14 fw-5">Email</label>
                                    <input type="email" class="tb-my-input" placeholder="Your Email">
                                </fieldset>
                            </div>

                            {{-- Star Rating --}}
                            <fieldset class="style-text mt-2">
                                <label class="font-1 fs-14 fw-5">Rating</label>
                                <div class="star-rating" style="font-size: 26px; cursor: pointer;">
                                    <span data-value="1" class="star">&#9733;</span>
                                    <span data-value="2" class="star">&#9733;</span>
                                    <span data-value="3" class="star">&#9733;</span>
                                    <span data-value="4" class="star">&#9733;</span>
                                    <span data-value="5" class="star">&#9733;</span>
                                </div>
                            </fieldset>

                            {{-- Review Text --}}
                            <fieldset class="style-text">
                                <label class="font-1 fs-14 fw-5">Write Review</label>
                                <textarea rows="3" placeholder="Write your experience..."></textarea>
                            </fieldset>

                            <div class="row">
                                {{-- Upload Image --}}
                                <div class="col-sm-6">
                                    <fieldset class="style-text">
                                        <label class="font-1 fs-14 fw-5">Upload Image (optional)</label>
                                        <input type="file" accept="image/*" class="tb-my-input">
                                        <small class="fs-12 text-muted">JPG, PNG up to 5MB</small>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="button-boxs">
                                <button type="button" class="sc-button">
                                    <span>Submit Review</span>
                                </button>
                            </div>
                        </form>
                    </div>


                </div>

            </div>
        </div>

    </section>


@endsection
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const stars = document.querySelectorAll(".star-rating .star");

            stars.forEach(star => {
                star.addEventListener("click", function() {
                    let value = this.getAttribute("data-value");

                    stars.forEach(s => {
                        s.style.color = (s.getAttribute("data-value") <= value) ?
                            "#ffcc00" : "#ccc";
                    });
                });
            });
        });
    </script>
    <style>
        .star-rating .star {
            color: #ccc;
            transition: 0.2s;
        }

        .star-rating .star:hover {
            color: #ffcc00;
        }
    </style>


@endsection
