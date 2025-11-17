@extends('client.layout.app')
@section('body-class', 'body header-fixed')
@section('header-class', 'main-header')
@section('content')
    <section class="flat-title ">
        <div class="container2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-inner style">
                        <div class="title-group fs-12"><a class="home fw-6 text-color-3" href="/">Home</a><span>Used
                                cars for sale</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="listing-grid tf-section3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section">
                        <h2>10,000+ Get The Best Deals On Best Cars</h2>
                        <p class="mt-20">Explore our selection of high-quality, pre-owned vehicles. Our
                            inventory includes top brands like Toyota, Mercedes, Honda, and more. Find the
                            perfect used car for your needs.</p>
                    </div>
                </div>
                <div class="col-lg-12 flex gap-30 text-start">
                    <div class="sidebar-right-listing style-2">
                        <div class="sidebar-title flex-two flex-wrap">
                            <h4>Filters and Sort</h4>
                            <a href="{{ route('cars.list') }}" class="fw-5 font clear text-color-2">
                                <i class="icon-autodeal-plus"></i>Clear
                            </a>
                        </div>
                        <div class="form-filter-siderbar">
                            <form method="GET" action="{{ route('cars.list') }}" id="sidebar-filter-form">
                                <div class="wd-find-select">
                                    <div class="form-group">
                                        <div class="group-select tf-select">
                                            <select class="nice-select" id="sidebar-brand-select" name="brand_id">
                                                <option value="">Make</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}"
                                                        {{ (string) $brand->id === (string) request('brand_id') ? 'selected' : '' }}>
                                                        {{ $brand->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="group-select tf-select">
                                            <select class="nice-select" id="sidebar-model-select" name="model_id">
                                                <option value="">Models</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="group-select tf-select">
                                            <select class="nice-select" name="engine_type">
                                                <option value="">Engine Type</option>
                                                @foreach ($engines as $engine)
                                                    <option value="{{ $engine }}"
                                                        {{ $engine == request('engine_type') ? 'selected' : '' }}>
                                                        {{ $engine }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group wg-box3">
                                        <div class="widget widget-price ">
                                            <div class="caption flex-two">
                                                <div>
                                                    <span class="fw-6">Price: </span>
                                                    <span id="slider-range-value1">{{ $priceMin }}</span> -
                                                    <span id="slider-range-value2">{{ number_format($priceMax) }}</span>
                                                </div>
                                            </div>
                                            <div id="slider-range"></div>
                                            <div class="slider-labels">
                                                <div>
                                                    <input type="hidden" name="price_min" id="price-min"
                                                        value="{{ $priceMin }}">
                                                    <input type="hidden" name="price_max" id="price-max"
                                                        value="{{ $priceMax }}">
                                                </div>
                                            </div>
                                        </div><!-- /.widget_price -->
                                    </div>
                                    <div class="form-group ">
                                        <div class="group-select tf-select">
                                            <select class="nice-select" name="color">
                                                <option value="">Color</option>
                                                @foreach ($colors as $color)
                                                    <option value="{{ $color }}"
                                                        {{ $color == request('color') ? 'selected' : '' }}>
                                                        {{ $color }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="group-select tf-select">
                                            <select class="nice-select" name="year">
                                                <option value="">Year</option>
                                                @foreach ($years as $year)
                                                    <option value="{{ $year }}"
                                                        {{ (string) $year === (string) request('year') ? 'selected' : '' }}>
                                                        {{ $year }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="group-select tf-select">
                                            <select class="nice-select" name="condition">
                                                <option value="">Condition</option>
                                                <option value="new"
                                                    {{ request('condition') === 'new' ? 'selected' : '' }}>New</option>
                                                <option value="used"
                                                    {{ request('condition') === 'used' ? 'selected' : '' }}>Used</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="group-select tf-select">
                                            <select class="nice-select" name="city">
                                                <option value="">City</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city }}"
                                                        {{ $city == request('city') ? 'selected' : '' }}>
                                                        {{ $city }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="sc-button w-100"><span>Apply Filters</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-left-listing">
                        <div class="row">
                            <div class="col-lg-12 listing-list-car-wrap">
                                <div class="category-filter flex justify-space align-center mb-30 flex-wrap gap-8">
                                    <div class="box-1 flex align-center flex-wrap gap-8">
                                        <p class="">
                                            @if ($cars->total() > 0)
                                                Showing {{ $cars->firstItem() }}–{{ $cars->lastItem() }} of
                                                {{ $cars->total() }} results
                                            @else
                                                No cars found
                                            @endif
                                        </p>
                                        <div class="filter-mobie">
                                            <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                                aria-controls="offcanvasRight" class="filter">Filter<i
                                                    class="icon-autodeal-filter"></i></a>
                                        </div>
                                    </div>
                                    <div class="box-2 flex flex-wrap gap-8">
                                        <a href="#" class="btn-view grid ">
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.04883 6.40508C5.04883 5.6222 5.67272 5 6.41981 5C7.16686 5 7.7908 5.62221 7.7908 6.40508C7.7908 7.18801 7.16722 7.8101 6.41981 7.8101C5.67241 7.8101 5.04883 7.18801 5.04883 6.40508Z"
                                                    stroke="CurrentColor"></path>
                                                <path
                                                    d="M11.1045 6.40508C11.1045 5.62221 11.7284 5 12.4755 5C13.2229 5 13.8466 5.6222 13.8466 6.40508C13.8466 7.18789 13.2227 7.8101 12.4755 7.8101C11.7284 7.8101 11.1045 7.18794 11.1045 6.40508Z"
                                                    stroke="CurrentColor"></path>
                                                <path
                                                    d="M19.9998 6.40514C19.9998 7.18797 19.3757 7.81016 18.6288 7.81016C17.8818 7.81016 17.2578 7.18794 17.2578 6.40508C17.2578 5.62211 17.8813 5 18.6288 5C19.3763 5 19.9998 5.62215 19.9998 6.40514Z"
                                                    stroke="CurrentColor"></path>
                                                <path
                                                    d="M7.74249 12.5097C7.74249 13.2926 7.11849 13.9147 6.37133 13.9147C5.62411 13.9147 5 13.2926 5 12.5097C5 11.7267 5.62419 11.1044 6.37133 11.1044C7.11842 11.1044 7.74249 11.7266 7.74249 12.5097Z"
                                                    stroke="CurrentColor"></path>
                                                <path
                                                    d="M13.7976 12.5097C13.7976 13.2927 13.1736 13.9147 12.4266 13.9147C11.6795 13.9147 11.0557 13.2927 11.0557 12.5097C11.0557 11.7265 11.6793 11.1044 12.4266 11.1044C13.1741 11.1044 13.7976 11.7265 13.7976 12.5097Z"
                                                    stroke="CurrentColor"></path>
                                                <path
                                                    d="M19.9516 12.5097C19.9516 13.2927 19.328 13.9147 18.5807 13.9147C17.8329 13.9147 17.209 13.2925 17.209 12.5097C17.209 11.7268 17.8332 11.1044 18.5807 11.1044C19.3279 11.1044 19.9516 11.7265 19.9516 12.5097Z"
                                                    stroke="CurrentColor"></path>
                                                <path
                                                    d="M5.04297 18.5947C5.04297 17.8118 5.66709 17.1896 6.4143 17.1896C7.16137 17.1896 7.78523 17.8116 7.78523 18.5947C7.78523 19.3778 7.16139 19.9997 6.4143 19.9997C5.66714 19.9997 5.04297 19.3773 5.04297 18.5947Z"
                                                    stroke="CurrentColor"></path>
                                                <path
                                                    d="M11.0986 18.5947C11.0986 17.8118 11.7227 17.1896 12.47 17.1896C13.2169 17.1896 13.8409 17.8117 13.8409 18.5947C13.8409 19.3778 13.2169 19.9997 12.47 19.9997C11.7225 19.9997 11.0986 19.3774 11.0986 18.5947Z"
                                                    stroke="CurrentColor"></path>
                                                <path
                                                    d="M17.252 18.5947C17.252 17.8117 17.876 17.1896 18.6229 17.1896C19.3699 17.1896 19.9939 17.8117 19.9939 18.5947C19.9939 19.3778 19.3702 19.9997 18.6229 19.9997C17.876 19.9997 17.252 19.3774 17.252 18.5947Z"
                                                    stroke="CurrentColor"></path>
                                            </svg>
                                        </a>
                                        <a href="#" class="btn-view list active">
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.7016 18.3317H9.00246C8.5615 18.3317 8.2041 17.9743 8.2041 17.5333C8.2041 17.0923 8.5615 16.7349 9.00246 16.7349H19.7013C20.1423 16.7349 20.4997 17.0923 20.4997 17.5333C20.4997 17.9743 20.1426 18.3317 19.7016 18.3317Z"
                                                    fill="CurrentColor"></path>
                                                <path
                                                    d="M19.7016 13.3203H9.00246C8.5615 13.3203 8.2041 12.9629 8.2041 12.5219C8.2041 12.081 8.5615 11.7236 9.00246 11.7236H19.7013C20.1423 11.7236 20.4997 12.081 20.4997 12.5219C20.5 12.9629 20.1426 13.3203 19.7016 13.3203Z"
                                                    fill="CurrentColor"></path>
                                                <path
                                                    d="M19.7016 8.30919H9.00246C8.5615 8.30919 8.2041 7.95179 8.2041 7.51083C8.2041 7.06986 8.5615 6.71246 9.00246 6.71246H19.7013C20.1423 6.71246 20.4997 7.06986 20.4997 7.51083C20.4997 7.95179 20.1426 8.30919 19.7016 8.30919Z"
                                                    fill="CurrentColor"></path>
                                                <path
                                                    d="M5.5722 8.64465C6.16436 8.64465 6.6444 8.16461 6.6444 7.57245C6.6444 6.98029 6.16436 6.50024 5.5722 6.50024C4.98004 6.50024 4.5 6.98029 4.5 7.57245C4.5 8.16461 4.98004 8.64465 5.5722 8.64465Z"
                                                    fill="CurrentColor"></path>
                                                <path
                                                    d="M5.5722 13.5942C6.16436 13.5942 6.6444 13.1141 6.6444 12.522C6.6444 11.9298 6.16436 11.4498 5.5722 11.4498C4.98004 11.4498 4.5 11.9298 4.5 12.522C4.5 13.1141 4.98004 13.5942 5.5722 13.5942Z"
                                                    fill="CurrentColor"></path>
                                                <path
                                                    d="M5.5722 18.5438C6.16436 18.5438 6.6444 18.0637 6.6444 17.4716C6.6444 16.8794 6.16436 16.3994 5.5722 16.3994C4.98004 16.3994 4.5 16.8794 4.5 17.4716C4.5 18.0637 4.98004 18.5438 5.5722 18.5438Z"
                                                    fill="CurrentColor"></path>
                                            </svg>
                                        </a>
                                        <div class="wd-find-select flex gap-8">
                                            <form method="GET" action="{{ route('cars.list') }}" class="flex gap-8">
                                                @foreach (request()->except(['page', 'per_page', 'sort']) as $name => $value)
                                                    <input type="hidden" name="{{ $name }}"
                                                        value="{{ $value }}">
                                                @endforeach
                                                <div class="group-select">
                                                    <select class="nice-select" name="per_page"
                                                        onchange="this.form.submit()">
                                                        @php $currentPerPage = $perPage ?? 12; @endphp
                                                        <option value="10"
                                                            {{ $currentPerPage == 10 ? 'selected' : '' }}>Show: 10
                                                        </option>
                                                        <option value="12"
                                                            {{ $currentPerPage == 12 ? 'selected' : '' }}>Show: 12
                                                        </option>
                                                        <option value="30"
                                                            {{ $currentPerPage == 30 ? 'selected' : '' }}>Show: 30
                                                        </option>
                                                        <option value="50"
                                                            {{ $currentPerPage == 50 ? 'selected' : '' }}>Show: 50
                                                        </option>
                                                        <option value="100"
                                                            {{ $currentPerPage == 100 ? 'selected' : '' }}>Show: 100
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="group-select">
                                                    @php $currentSort = $sort ?? ''; @endphp
                                                    <select class="nice-select" name="sort"
                                                        onchange="this.form.submit()">
                                                        <option value=""
                                                            {{ $currentSort === '' ? 'selected' : '' }}>Default order
                                                        </option>
                                                        <option value="by-latest"
                                                            {{ $currentSort === 'by-latest' ? 'selected' : '' }}>Latest
                                                        </option>
                                                        <option value="low-to-high"
                                                            {{ $currentSort === 'low-to-high' ? 'selected' : '' }}>Low to
                                                            high</option>
                                                        <option value="high-to-low"
                                                            {{ $currentSort === 'high-to-low' ? 'selected' : '' }}>High to
                                                            low</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-car-list-1">
                                    @forelse($cars as $car)
                                        <div class="box-car-list style-2 hv-one">
                                            <div class="image-group relative ">
                                                <div class="top flex-two">
                                                    <ul class="d-flex gap-8">
                                                        @if ($car->is_sold)
                                                            <li class="flag-tag success"
                                                                style="background: red !important;">Sold</li>
                                                        @elseif(!empty($car->is_featured))
                                                            <li class="flag-tag success">Featured</li>
                                                        @endif
                                                    </ul>
                                                    @if ($car->year)
                                                        <div class="year flag-tag">{{ $car->year }}</div>
                                                    @endif
                                                </div>
                                                <ul class="change-heart flex">
                                                    <li class="box-icon w-32">
                                                        <a href="#" class="icon icon-favorite" data-car-id="{{ $car->id }}">
                                                            <svg width="18" height="16" viewBox="0 0 18 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M16.5 4.875C16.5 2.80417 14.7508 1.125 12.5933 1.125C10.9808 1.125 9.59583 2.06333 9 3.4025C8.40417 2.06333 7.01917 1.125 5.40583 1.125C3.25 1.125 1.5 2.80417 1.5 4.875C1.5 10.8917 9 14.875 9 14.875C9 14.875 16.5 10.8917 16.5 4.875Z"
                                                                    stroke="CurrentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="img-style">
                                                    <img class="lazyload" data-src="{{ $car->primary_image_url }}"
                                                        src="{{ $car->primary_image_url }}"
                                                        alt="{{ $car->brand->title ?? '' }} {{ $car->model->title ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="inner1">
                                                    <div class="text-address">
                                                        <p class="text-color-3 font">
                                                            {{ $car->brand->title ?? '' }}
                                                            {{ $car->model->title ?? '' }}
                                                        </p>
                                                    </div>
                                                    <h5 class="link-style-1">
                                                        <a href="{{route('car.details', ['id' => $car->id])}}">
                                                            {{ $car->year }}
                                                            {{ $car->brand->title ?? '' }}
                                                            {{ $car->model->title ?? '' }}
                                                            {{ $car->version->title ?? '' }}
                                                        </a>
                                                    </h5>
                                                    <div class="icon-box flex flex-wrap">
                                                        @if ($car->mileage)
                                                            <div class="icons flex-three">
                                                                <i class="icon-autodeal-km1"></i>
                                                                <span>{{ number_format($car->mileage) }}
                                                                    {{ $car->mileage_unit ?? 'kms' }}</span>
                                                            </div>
                                                        @endif
                                                        @if ($car->engine_type)
                                                            <div class="icons flex-three">
                                                                <i class="icon-autodeal-diesel"></i>
                                                                <span>{{ $car->engine_type }}</span>
                                                            </div>
                                                        @endif
                                                        @if ($car->transmission)
                                                            <div class="icons flex-three">
                                                                <i class="icon-autodeal-automatic"></i>
                                                                <span>{{ ucfirst($car->transmission) }}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="money fs-20 fw-5 lh-25 text-color-3">
                                                        {{ $car->currency ?? '$' }}{{ number_format($car->price) }}
                                                    </div>
                                                    <a href="{{route('car.details', ['id' => $car->id])}}" class="view-car">View details<i
                                                            class="icon-autodeal-btn-right"></i></a>
                                                </div>

                                            </div>
                                        </div>
                                    @empty
                                        <p>No cars found.</p>
                                    @endforelse
                                </div>

                                <div class="themesflat-pagination clearfix mt-40">
                                    @if ($cars->hasPages())
                                        <ul>
                                            {{-- Previous Page Link --}}
                                            <li>
                                                @if ($cars->onFirstPage())
                                                    <span class="page-numbers style"><i class="far fa-angle-left"></i></span>
                                                @else
                                                    <a href="{{ $cars->previousPageUrl() }}" class="page-numbers style"><i class="far fa-angle-left"></i></a>
                                                @endif
                                            </li>

                                            {{-- Pagination Elements --}}
                                            @php
                                                $currentPage = $cars->currentPage();
                                                $lastPage = $cars->lastPage();
                                                $start = max(1, $currentPage - 2);
                                                $end = min($lastPage, $currentPage + 2);
                                            @endphp

                                            {{-- First page and leading ellipsis --}}
                                            @if ($start > 1)
                                                <li><a href="{{ $cars->url(1) }}" class="page-numbers">1</a></li>
                                                @if ($start > 2)
                                                    <li><span class="page-numbers">...</span></li>
                                                @endif
                                            @endif

                                            {{-- Page range around current --}}
                                            @for ($page = $start; $page <= $end; $page++)
                                                @if ($page == $currentPage)
                                                    <li><span class="page-numbers current">{{ $page }}</span></li>
                                                @else
                                                    <li><a href="{{ $cars->url($page) }}" class="page-numbers">{{ $page }}</a></li>
                                                @endif
                                            @endfor

                                            {{-- Trailing ellipsis and last page --}}
                                            @if ($end < $lastPage)
                                                @if ($end < $lastPage - 1)
                                                    <li><span class="page-numbers">...</span></li>
                                                @endif
                                                <li><a href="{{ $cars->url($lastPage) }}" class="page-numbers">{{ $lastPage }}</a></li>
                                            @endif

                                            {{-- Next Page Link --}}
                                            <li>
                                                @if ($cars->hasMorePages())
                                                    <a href="{{ $cars->nextPageUrl() }}" class="page-numbers style"><i class="far fa-angle-right"></i></a>
                                                @else
                                                    <span class="page-numbers style"><i class="far fa-angle-right"></i></span>
                                                @endif
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            function loadModels(brandId, selectedModelId = null) {
                $('#sidebar-model-select').html('<option value="">Loading...</option>');

                if (brandId) {
                    $.get("{{ url('/get-models') }}/" + brandId, function(data) {
                        let options = '<option value="">Models</option>';
                        data.forEach(function(model) {
                            const selected = selectedModelId && String(model.id) === String(
                                selectedModelId) ? 'selected' : '';
                            options +=
                                `<option value="${model.id}" ${selected}>${model.title}</option>`;
                        });
                        $('#sidebar-model-select').html(options);
                    });
                } else {
                    $('#sidebar-model-select').html('<option value="">Models</option>');
                }
            }

            const initialBrandId = $('#sidebar-brand-select').val();
            const initialModelId = "{{ request('model_id') }}";
            if (initialBrandId && initialModelId) {
                loadModels(initialBrandId, initialModelId);
            }

            $('#sidebar-brand-select').on('change', function() {
                const brandId = $(this).val();
                loadModels(brandId);
            });
        });
    </script>
@endsection
