@forelse($cars as $car)
    <div class="box-car-list hv-one">
        <div class="image-group relative">
            <div class="top flex-two">
                <ul class="d-flex gap-8">
                    @if($car->is_sold)
                        <li class="flag-tag success" style="background: red !important;">Sold</li>
                    @elseif(!empty($car->is_featured))
                        <li class="flag-tag success">Featured</li>
                    @endif
                </ul>
                @if($car->year)
                    <div class="year flag-tag">{{ $car->year }}</div>
                @endif
            </div>
            <ul class="change-heart flex">
                <li class="box-icon w-32">
                    <a href="#" class="icon icon-favorite" data-car-id="{{ $car->id }}">
                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.5 4.875C16.5 2.80417 14.7508 1.125 12.5933 1.125C10.9808 1.125 9.59583 2.06333 9 3.4025C8.40417 2.06333 7.01917 1.125 5.40583 1.125C3.25 1.125 1.5 2.80417 1.5 4.875C1.5 10.8917 9 14.875 9 14.875C9 14.875 16.5 10.8917 16.5 4.875Z" stroke="CurrentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </li>
            </ul>
            <div class="img-style">
                <img class="lazyload" data-src="{{ $car->primary_image_url }}" src="{{ $car->primary_image_url }}" alt="{{ $car->brand->title ?? '' }} {{ $car->model->title ?? '' }}">
            </div>
        </div>
        <div class="content">
            <div class="text-address">
                <p class="text-color-3 font">
                    {{ $car->brand->title ?? '' }}
                    {{ $car->model->title ?? '' }}
                </p>
            </div>
            <h5 class="link-style-1">
                <a href="{{ route('car.details', ['id' => $car->id]) }}">
                    {{ $car->year }}
                    {{ $car->brand->title ?? '' }}
                    {{ $car->model->title ?? '' }}
                    {{ $car->version->title ?? '' }}
                </a>
            </h5>
            <div class="icon-box flex flex-wrap">
                @if($car->mileage)
                    <div class="icons flex-three">
                        <i class="icon-autodeal-km1"></i>
                        <span>{{ number_format($car->mileage) }} {{ $car->mileage_unit ?? 'kms' }}</span>
                    </div>
                @endif
                @if($car->engine_type)
                    <div class="icons flex-three">
                        <i class="icon-autodeal-diesel"></i>
                        <span>{{ $car->engine_type }}</span>
                    </div>
                @endif
                @if($car->transmission)
                    <div class="icons flex-three">
                        <i class="icon-autodeal-automatic"></i>
                        <span>{{ ucfirst($car->transmission) }}</span>
                    </div>
                @endif
            </div>
            <div class="money fs-20 fw-5 lh-25 text-color-3">
                {{ $car->currency ?? '$' }}{{ number_format($car->price) }}
            </div>
            <div class="days-box flex justify-space align-center">
                <a href="{{ route('car.details', ['id' => $car->id]) }}" class="view-car">View car</a>
            </div>
        </div>
    </div>
@empty
    <p>No cars in your wishlist.</p>
@endforelse

