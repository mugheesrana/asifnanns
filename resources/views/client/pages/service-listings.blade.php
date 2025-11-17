@extends('client.layout.app')
@section('body-class', 'body header-fixed')
@section('header-class', 'main-header')
@section('content')
<style>
    /* Outer card */
    .box-car-list {
        display: flex;
        flex-direction: column;
        height: 400px;
        /* Fixed height for all cards */
        border-radius: 8px;
        overflow: hidden;
    }

    /* Image area */
    .box-car-list .image-group {
        height: 180px;
        /* Adjust as needed */
        overflow: hidden;
    }

    .box-car-list .img-style img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* Makes image fit container */
    }

    /* Content area */
    .box-car-list .content {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* Pushes button down */
        padding: 10px;
    }

    /* Title / description text */
    .box-car-list .text-address {
        min-height: 50px;
        /* Keeps title area equal size */
    }

    .box-car-list p {
        margin-bottom: 8px;
    }

    /* Ensure all cards match height in rows */
    .list-car-grid-4 {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
    }

    /* Responsive */
    @media(max-width: 991px) {
        .list-car-grid-4 {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media(max-width: 576px) {
        .list-car-grid-4 {
            grid-template-columns: repeat(1, 1fr);
        }
    }

    .pagination .active .page-link {
        background-color: #FF7101 !important;
        border-color: #FF7101 !important;
        color: #fff !important;
    }

    /* Normal page links */
    .pagination .page-link {
        background-color: #fff;
        border: 1px solid #ddd;
        color: #333;
        border-radius: 6px;
        padding: 8px 14px;
        margin: 0 3px;
    }

    /* Hover state */
    .pagination .page-link:hover {
        background-color: #FF7101 !important;
        color: #fff !important;
        border-color: #FF7101 !important;
    }

    /* Previous / Next arrows */
    .pagination .page-item.disabled .page-link {
        background-color: #f5f5f5;
        color: #999;
        border: 1px solid #ddd;
    }
</style>


<section class="tf-banner style-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content relative z-2">
                    <div class="heading">
                        <h1 class="text-color-1">Book Trusted Maintenance And Repair Services Today.</h1>
                        <p class="text-color-1 fs-18 fw-4 lh-22 font">
                            Fast, reliable, and affordable car care near you.<br>
                            Expert car care made easy.
                        </p>
                    </div>

                    <div class="chat-wrap flex-three wow fadeInUp mt-2" data-wow-delay="600ms" data-wow-duration="1000ms">
                        <a href="/custom-service-request" class="sc-button mt-2" style="background-color: #fff;">
                            Request Service
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- ================== FILTER SECTION ================== --}}
<div class="flat-filter-search mt--3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="flat-tabs">
                    <div class="content-tab style2">
                        <div class="content-inner tab-content">
                            <div class="form-sl">
                                {{-- Use GET so filters show in URL & work with pagination --}}
                                <form method="GET" action="{{ route('service-listings') }}">
                                    <div class="wd-find-select flex">
                                        <div class="inner-group">
                                            {{-- Service Type (main category) --}}
                                            <div class="form-group-1">
                                                <div class="group-select">
                                                    {{-- You can still use .nice-select JS on this <select> --}}
                                                    <select name="category" class="nice-select wide">
                                                        <option value="">
                                                            Service Type
                                                        </option>
                                                        @foreach($parentCategories as $parent)
                                                        <option value="{{ $parent->slug }}"
                                                            {{ $categorySlug == $parent->slug ? 'selected' : '' }}>
                                                            {{ $parent->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- Search by service name --}}
                                            <div class="form-group-1">
                                                <div class="group-select">
                                                    <input type="text"
                                                        name="q"
                                                        class=""
                                                        placeholder="Enter Service Name"
                                                        value="{{ $search }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group-2 form-style">
                                            {{-- You can add more filters here if needed --}}
                                        </div>

                                        <div class="button-search sc-btn-top">
                                            <button type="submit" class="sc-button">
                                                <span>Find Service</span>
                                                <i class="far fa-search text-color-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- End Search Form-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ================== SERVICES LISTING ================== --}}
<section class="tf-section">
    <div class="container">
        <div class="row">
            {{-- Heading --}}
            <div class="col-lg-12">
                <div class="heading-section">
                    <h2>Our Services</h2>
                    <p class="mt-18">
                        @if($selectedCategory)
                        Showing {{ $totalServices }} result(s) for
                        <strong>{{ $selectedCategory->name }}</strong>
                        @if($search)
                        &nbsp;matching "<strong>{{ $search }}</strong>"
                        @endif
                        @elseif($search)
                        Showing {{ $totalServices }} result(s) for
                        "<strong>{{ $search }}</strong>"
                        @else
                        There Are Currently {{ $totalServices }} Results
                        @endif
                    </p>
                </div>
            </div>

            @if($services->count())
            <div class="col-lg-12">
                <div class="list-car-grid-4 gap-30">
                    @foreach($services as $service)
                    <div class="box-car-list hv-one">
                        <div class="image-group relative">
                            <div class="top flex-two">
                                <ul class="d-flex gap-8">
                                    @if($service->is_featured)
                                    <li class="flag-tag success">Featured</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="img-style">
                                <img class="lazyload"
                                    data-src="{{ $service->thumbnail ? asset($service->thumbnail) : asset('nanns/assets/images/car-list/car6.jpg') }}"
                                    src="{{ $service->thumbnail ? asset($service->thumbnail) : asset('nanns/assets/images/car-list/car6.jpg') }}"
                                    alt="{{ $service->title }}">
                            </div>
                        </div>

                        <div class="content">
                            {{-- Category label --}}
                            <div class="text-address">
                                <p class="text-color-3 font">
                                    @if($service->category)
                                    <small style="display:block; font-size:12px; color:#777;">
                                        {{ $service->category->parent ? $service->category->parent->name . ' → ' : '' }}
                                        {{ $service->category->name }}
                                    </small>
                                    @endif

                                    <a href="{{ route('service-details', $service->slug) }}">
                                        {{ $service->title }}
                                    </a>
                                </p>
                            </div>

                            {{-- Short description snippet --}}
                            @if($service->short_description || $service->description)
                            <p style="font-size: 13px; margin-top: 5px;">
                                {{ \Illuminate\Support\Str::limit($service->short_description ?? $service->description, 80) }}
                            </p>
                            @endif

                            <div class="days-box"
                                style="display:flex; justify-content:center; align-items:center; margin-top:10px;">
                                <a href="{{ route('service-details', $service->slug) }}" class="view-car">
                                    View Service
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Pagination (works with filters because of withQueryString()) --}}
                <div class="themesflat-pagination pagination-style clearfix center mt-4">
                    {{ $services->links('pagination::bootstrap-4') }}
                </div>
            </div>
            @else
            <div class="col-lg-12">
                <p>No services found for the selected filters.</p>
            </div>
            @endif

        </div>
    </div>
</section>
@endsection