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
                            <h1 class="text-color-1">Contact Us</h1>
                            <p class="text-color-1 fs-18 fw-4 lh-22 font">
                                Need help with car services, repairs, or finding your next vehicle?<br>
                                Reach out to our team for quick support, expert guidance, and hassle-free assistance.
                            </p>
                        </div>

                        <div class="chat-wrap flex-three wow fadeInUp mt-2" data-wow-delay="600ms" data-wow-duration="1000ms">
                            <a href="/" class="sc-button mt-2" style="background-color: #fff;">
                                Request Service
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class=" flat-property mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-heading flex-two flex-wrap ">
                        <h1 class="heading-listing">Contact us</h1>
                        <div class="social-listing flex-six flex-wrap">
                            <p>Share this page:</p>
                            <div class="icon-social style1">
                                <a href="#"><i class="icon-autodeal-facebook"></i></a>
                                <a href="#"><i class="icon-autodeal-linkedin"></i></a>
                                <a href="#"><i class="icon-autodeal-twitter"></i></a>
                                <a href="#"><i class="icon-autodeal-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tf-section-map">
        <div class="container-fluid">
            <div class="map">
                <iframe class="map-content"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7302.453092836291!2d90.47477022812872!3d23.77494577893369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1627293157601!5m2!1svi!2s"
                    allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>

    </section>

    <section class="tf-section-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-8 contact-left">
                    <div class="heading-section mb-30">
                        <h2>Drop Us a Line</h2>
                        <p class="mt-12">Feel free to connect with us through our online channels for updates, news, and
                            more.</p>
                    </div>
                    <div id="comments" class="comments">
                        <div class="respond-comment">
                            <form id="loan-calculator" class="comment-form form-submit" action="{{ route('contact.store') }}" method="POST"
                                accept-charset="utf-8" novalidate="novalidate">
                                 @csrf
                                <div class="grid-sw-2">
                                    <fieldset class="email-wrap style-text">
                                        <label class="font-1 fs-14 fw-5">Name</label>
                                        <input type="text" class="tb-my-input" name="name" placeholder="Your name"
                                            required="">
                                    </fieldset>
                                    <fieldset class="phone-wrap style-text">
                                        <label class="font-1 fs-14 fw-5">Email address</label>
                                        <input type="email" class="tb-my-input" name="email" placeholder="Your email"
                                            required="">
                                    </fieldset>
                                </div>
                                <div class="grid-sw-2">
                                    <fieldset class="email-wrap style-text">
                                        <label class="font-1 fs-14 fw-5">Phone Numbers</label>
                                        <input type="tel" class="tb-my-input" name="phone" placeholder="Phone Numbers"
                                            required="">
                                    </fieldset>
                                    <fieldset class="phone-wrap style-text">
                                        <label class="font-1 fs-14 fw-5">Subject</label>
                                        <input type="text" class="tb-my-input" name="subject" placeholder="Enter Keyword"
                                            required="">
                                    </fieldset>
                                </div>
                                <fieldset class="phone-wrap style-text">
                                    <label class="font-1 fs-14 fw-5">Your Message</label>
                                    <textarea id="comment-message" name="message" rows="4" tabindex="4" placeholder="Your message"
                                        aria-required="true"></textarea>
                                </fieldset>

                                <div class="button-boxs">
                                    <button class="sc-button" name="submit" type="submit">
                                        <span>Send Message</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 contact-right">
                    <div class="contact-info box-sd">
                        <h2 class="mb-30">Contact Us</h2>
                        <div class="wrap-info">
                            <div class="box-info">
                                <h5>Address</h5>
                                <p>101 E 129th St, East Chicago, IN 46312 </p>
                            </div>
                            <div class="box-info">
                                <h5>Infomation:</h5>
                                <p>‪+1(647)573-0971‬</p>
                                <p>nfo@nannsauto.com</p>
                            </div>
                            <div class="box-info">
                                <h5>Opentime:</h5>
                                <p>Monay - Friday: 08:00 - 20:00</p>
                                <p>Saturday - Sunday: 10:00 - 18:00</p>
                            </div>
                            <div class="box-info">
                                <h5>Follow Us:</h5>
                                <div class="icon-social style2">
                                    <a href="#"><i class="icon-autodeal-facebook"></i></a>
                                    <a href="#"><i class="icon-autodeal-linkedin"></i></a>
                                    <a href="#"><i class="icon-autodeal-twitter"></i></a>
                                    <a href="#"><i class="icon-autodeal-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
