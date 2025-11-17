@extends('client.layout.app')
@section('body-class', 'body header-fixed')
@section('header-class', 'main-header')
@section('content')
    <section class="flat-title mb-40">
        <div class="container2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-inner style">
                        <div class="title-group fs-12">
                            <a class="home fw-6 text-color-3" href="{{ url('/') }}">Home</a>
                            @if($service->category && $service->category->parent)
                                <span>{{ $service->category->parent->name }} / {{ $service->category->name }}</span>
                            @elseif($service->category)
                                <span>{{ $service->category->name }}</span>
                            @else
                                <span>Service Details</span>
                            @endif
                        </div>
                        <h1 class="mt-2">{{ $service->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tf-section3 listing-detail style-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    {{-- Main Image --}}
                    <div class="features-thumb mb-4 img-style-hover">
                        <img class="w-100"
                             src="{{ $service->thumbnail ? asset($service->thumbnail) : asset('nanns/assets/images/dashboard/single-dealer.jpg') }}"
                             alt="{{ $service->title }}">
                    </div>

                    {{-- Title --}}
                    <h2 class="title mb-3">
                        {{ $service->title }}
                    </h2>

                    {{-- Short Description --}}
                    @if($service->short_description)
                        <p class="mb-2">
                            {{ $service->short_description }}
                        </p>
                    @endif

                    {{-- Full Description --}}
                    @if($service->description)
                        <div class="mb-4">
                            {!! nl2br(e($service->description)) !!}
                        </div>
                    @endif

                    {{-- Price + Category badge (optional) --}}
                    <div class="mb-4 d-flex align-items-center gap-3 flex-wrap">
                        @if(!is_null($service->price))
                            <span class="badge badge-primary px-3 py-2">
                                Price: {{ number_format($service->price, 2) }}
                            </span>
                        @endif

                        @if($service->category)
                            <span class="badge badge-info px-3 py-2">
                                {{ $service->category->parent ? $service->category->parent->name . ' → ' : '' }}
                                {{ $service->category->name }}
                            </span>
                        @endif

                        @if($service->is_featured)
                            <span class="badge badge-warning px-3 py-2">
                                Featured
                            </span>
                        @endif
                    </div>

                    {{-- ================== Related Services Slider ================== --}}
                    @if($relatedServices->count())
                        <section class="section-blog tf-section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="heading-section flex align-center justify-space flex-wrap gap-20">
                                            <h2 class="wow fadeInUpSmall" data-wow-delay="0.2s" data-wow-duration="1000ms">
                                                Related Services
                                            </h2>
                                            <a href="{{ url('/service-listings') }}" class="tf-btn-arrow wow fadeInUpSmall"
                                               data-wow-delay="0.2s" data-wow-duration="1000ms">
                                                View all<i class="icon-autodeal-btn-right"></i>
                                            </a>
                                        </div>

                                        <div dir="ltr" class="swiper tf-sw-mobile"
                                             data-preview="3" data-tablet="2"
                                             data-mobile-sm="2" data-mobile="1"
                                             data-space-lg="30" data-space-md="15"
                                             data-space="15">

                                            <div class="swiper-wrapper">
                                                @foreach($relatedServices as $rel)
                                                    <div class="swiper-slide">
                                                        <div class="blog-article-item style1 hover-img">
                                                            <div class="images img-style relative flex-none">
                                                                <img class="lazyload"
                                                                     data-src="{{ $rel->thumbnail ? asset($rel->thumbnail) : asset('nanns/assets/images/blog/blog-5.jpg') }}"
                                                                     src="{{ $rel->thumbnail ? asset($rel->thumbnail) : asset('nanns/assets/images/blog/blog-5.jpg') }}"
                                                                     alt="{{ $rel->title }}">
                                                                @if($rel->is_featured)
                                                                    <div class="date">Featured</div>
                                                                @endif
                                                            </div>
                                                            <div class="content">
                                                                <div class="sub-box flex align-center fs-13 fw-6">
                                                                    @if($rel->category)
                                                                        <a href="#"
                                                                           class="category text-color-3">
                                                                            {{ $rel->category->name }}
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                                <h3>
                                                                    <a href="{{ route('service-details', $rel->slug) }}">
                                                                        {{ $rel->title }}
                                                                    </a>
                                                                </h3>
                                                                <p>
                                                                    {{ \Illuminate\Support\Str::limit($rel->short_description ?? $rel->description, 100) }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="swiper-pagination3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif

                    {{-- ================== Service Booking Form ================== --}}
                    <div class="widget-book-apoint">
                        <p class="mb-3">
                            You are interested in this service and want to book an appointment?
                            <br> Just leave your contact and preferred date and time.
                        </p>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form method="post"
                              action="{{ route('services.book', $service->id) }}"
                              enctype="multipart/form-data"
                              class="form-submit">
                            @csrf

                            <div class="grid-sw-2">
                                <fieldset class="style-text">
                                    <label class="font-1 fs-14 fw-5">Name</label>
                                    <input type="text" name="name" class="tb-my-input"
                                           placeholder="Your Name" value="{{ old('name') }}" required>
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </fieldset>

                                <fieldset class="style-text">
                                    <label class="font-1 fs-14 fw-5">Email</label>
                                    <input type="email" name="email" class="tb-my-input"
                                           placeholder="Your Email" value="{{ old('email') }}" required>
                                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                </fieldset>
                            </div>

                            <div class="grid-sw-2">
                                <fieldset class="style-text">
                                    <label class="font-1 fs-14 fw-5">Phone</label>
                                    <input type="tel" name="phone" class="tb-my-input"
                                           placeholder="Your Phone Number" value="{{ old('phone') }}" required>
                                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                                </fieldset>

                                <fieldset class="style-text">
                                    <label class="font-1 fs-14 fw-5">Preferred Date</label>
                                    <input type="date" name="preferred_date" class="tb-my-input"
                                           value="{{ old('preferred_date') }}" required>
                                    @error('preferred_date') <small class="text-danger">{{ $message }}</small> @enderror
                                </fieldset>
                            </div>

                            <fieldset class="style-text">
                                <label class="font-1 fs-14 fw-5">Message</label>
                                <textarea name="message" rows="3"
                                          placeholder="Your message or request">{{ old('message') }}</textarea>
                                @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                            </fieldset>

                            <div class="row">
                                <div class="col-sm-6">
                                    <fieldset class="style-text">
                                        <label class="font-1 fs-14 fw-5">Attach Image (optional)</label>
                                        <input type="file" name="attachment" class="tb-my-input" accept="image/*">
                                        <small class="fs-12 text-muted">
                                            Upload image of your car or issue (JPG, PNG up to 5MB)
                                        </small>
                                        @error('attachment') <small class="text-danger">{{ $message }}</small> @enderror
                                    </fieldset>
                                </div>

                                <div class="col-sm-6">
                                    <fieldset class="phone-wrap style-text">
                                        <label class="font-1 fs-14 fw-5">Service Type</label>
                                        <select name="service_type" class="tb-my-input" required
                                                style="height: 48px; border: 1px solid #e1e1e1;  padding: 0 15px; border-radius: 6px; background-color: #fff; font-size: 14px; color: #555; appearance: none;">
                                            <option value="">Select Service</option>
                                            <option value="Maintenance" {{ old('service_type')=='Maintenance' ? 'selected' : '' }}>Maintenance</option>
                                            <option value="Repair" {{ old('service_type')=='Repair' ? 'selected' : '' }}>Repair</option>
                                            <option value="Inspection" {{ old('service_type')=='Inspection' ? 'selected' : '' }}>Inspection</option>
                                            <option value="Detailing" {{ old('service_type')=='Detailing' ? 'selected' : '' }}>Detailing</option>
                                            <option value="Custom Upgrade" {{ old('service_type')=='Custom Upgrade' ? 'selected' : '' }}>Custom Upgrade</option>
                                            <option value="Other" {{ old('service_type')=='Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('service_type') <small class="text-danger">{{ $message }}</small> @enderror
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
<<<<<<< HEAD
                    {{-- ======= Review Section Styled Like Service Booking ============ --}}
                    <div class="widget-book-apoint mt-5">
                        <div class="heading-section flex align-center justify-space flex-wrap gap-20">
                            <h2 class="wow fadeInUpSmall" data-wow-delay="0.2s" data-wow-duration="1000ms">
                                Add Review</h2>
=======

                    {{-- ============== Review Section (still mostly static) ============== --}}
                    <div class="widget-book-apoint mt-5">
                        <div class="heading-section flex align-center justify-space flex-wrap gap-20">
                            <h2 class="wow fadeInUpSmall" data-wow-delay="0.2s" data-wow-duration="1000ms">
                                Add Review
                            </h2>
>>>>>>> 800efa32448576f22b04ab266d177ad25efd59d5
                        </div>
                        <p class="mb-3">
                            Share your experience with this service.
                            <br> Your feedback helps others make better decisions.
                        </p>

<<<<<<< HEAD
                        <form class="form-submit" action="{{ route('review.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

=======
                        <form class="form-submit" enctype="multipart/form-data">
>>>>>>> 800efa32448576f22b04ab266d177ad25efd59d5
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

                                <input type="hidden" name="rating" id="rating-value" value="">
                            </fieldset>

                            {{-- Review Text --}}
                            <fieldset class="style-text">
                                <label class="font-1 fs-14 fw-5">Write Review</label>
                                <textarea rows="3" name="message" placeholder="Write your experience..." required></textarea>
                            </fieldset>

                            <div class="row">
                                <div class="col-sm-6">
                                    <fieldset class="style-text">
                                        <label class="font-1 fs-14 fw-5">Upload Image (optional)</label>
                                        <input type="file" name="image" accept="image/*" class="tb-my-input">
                                        <small class="fs-12 text-muted">JPG, PNG up to 5MB</small>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="button-boxs">
                                <button type="submit" class="sc-button">
                                    <span>Submit Review</span>
                                </button>
                            </div>
                        </form>

                        {{-- JS for Star Rating --}}
                        <script>
                            document.querySelectorAll('.star').forEach(star => {
                                star.addEventListener('click', function() {
                                    let rating = this.getAttribute('data-value');
                                    document.getElementById('rating-value').value = rating;

                                    document.querySelectorAll('.star').forEach(s => s.style.color = '#ccc');

                                    for (let i = 0; i < rating; i++) {
                                        document.querySelectorAll('.star')[i].style.color = '#f5c518';
                                    }
                                });
                            });
                        </script>

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
