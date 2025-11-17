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
                            <h1 class="text-color-1">Custom Service Request</h1>
                            <p class="text-color-1 fs-18 fw-4 lh-22 font">
                                Discover your perfect car and enjoy reliable maintenance and repair services with ease.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Request Section -->
    <section class="tf-section-contact">
        <div class="container">
            <div class="row">
                <!-- Left Side (Form) -->
                <div class="col-md-12 contact-left">
                    <div class="heading-section mb-30">
                        <h2>Request Your Service</h2>
                        <p class="mt-12">
                            Fill out the form below with all necessary details.
                            Attach an image if needed, and we’ll reach out to confirm your service.
                        </p>
                    </div>

                    <div id="service-request" class="comments">
                        <div class="respond-comment">
                            <form method="POST" class="comment-form form-submit" action="#"
                                enctype="multipart/form-data" accept-charset="utf-8" novalidate="novalidate">
                                @csrf

                                <div class="grid-sw-2">
                                    <fieldset class="email-wrap style-text">
                                        <label class="font-1 fs-14 fw-5">Full Name</label>
                                        <input type="text" class="tb-my-input" name="name" placeholder="Your name"
                                            required>
                                    </fieldset>
                                    <fieldset class="phone-wrap style-text">
                                        <label class="font-1 fs-14 fw-5">Email Address</label>
                                        <input type="email" class="tb-my-input" name="email" placeholder="Your email"
                                            required>
                                    </fieldset>
                                </div>

                                <div class="grid-sw-2">
                                    <fieldset class="email-wrap style-text">
                                        <label class="font-1 fs-14 fw-5">Phone Number</label>
                                        <input type="tel" class="tb-my-input" name="phone" placeholder="Phone number"
                                            required>
                                    </fieldset>
                                    <fieldset class="phone-wrap style-text">
                                        <label class="font-1 fs-14 fw-5">Preferred Date</label>
                                        <input type="date" class="tb-my-input" name="preferred_date" required>
                                    </fieldset>
                                </div>

                                <fieldset class="phone-wrap style-text">
                                    <label class="font-1 fs-14 fw-5">Vehicle Details</label>
                                    <input type="text" class="tb-my-input" name="vehicle_details"
                                        placeholder="e.g., 2019 Toyota Corolla" required>
                                </fieldset>


                                <fieldset class="phone-wrap style-text">
                                    <label class="font-1 fs-14 fw-5">Describe Your Request</label>
                                    <textarea name="message" rows="4" tabindex="4" placeholder="Describe your service request or issue..."
                                        aria-required="true"></textarea>
                                </fieldset>
                                <div class="grid-sw-2">

                                </div>
                                <fieldset class="phone-wrap style-text">
                                    <label class="font-1 fs-14 fw-5">Service Type</label>
                                    <select name="service_type" class="tb-my-input" required style="height: 48px; border: 1px solid #e1e1e1; padding: 0 15px; border-radius: 6px; background-color: #fff; font-size: 14px; color: #555; appearance: none;">>
                                        <option value="">Select Service</option>
                                        <option value="Maintenance">Maintenance</option>
                                        <option value="Repair">Repair</option>
                                        <option value="Inspection">Inspection</option>
                                        <option value="Detailing">Detailing</option>
                                        <option value="Custom Upgrade">Custom Upgrade</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </fieldset>
                                <fieldset class="phone-wrap style-text">
                                    <label class="font-1 fs-14 fw-5">Attach Image (optional)</label>
                                    <input type="file" name="attachment" class="tb-my-input" accept="image/*">
                                    <small class="fs-12 text-muted">Upload image of your car or issue (JPG, PNG up to
                                        5MB)</small>
                                </fieldset>


                                <div class="button-boxs">
                                    <button class="sc-button" name="submit" type="submit">
                                        <span>Submit Request</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

@endsection
