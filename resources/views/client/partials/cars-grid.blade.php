@forelse($cars as $car)
    <div class="listing-grid-item">
        <div class="listing-item-image">
            <div class="hover-listing-image">
                <div class="wrap-hover-listing">

                    {{-- Primary Image --}}
                    <div class="listing-item active"
                        title="{{ $car->brand->title ?? '' }} {{ $car->model->title ?? '' }}">
                        <div class="images">
                            <img src="{{ $car->primary_image_url }}"
                                class="swiper-image tfcl-light-gallery" alt="Car Image">
                        </div>
                    </div>

                    {{-- Other Images on Hover (skip primary) --}}
                    @foreach ($car->images->where('is_primary', false)->take(2) as $img)
                        <div class="listing-item"
                            title="{{ $car->brand->title ?? '' }} {{ $car->model->title ?? '' }}">
                            <div class="images">
                                <img src="{{ asset($img->image) }}"
                                    class="swiper-image lazy tfcl-light-gallery"
                                    alt="Car Image">
                            </div>
                        </div>
                    @endforeach

                    {{-- Gallery More Indicator --}}
                    @if ($car->images->where('is_primary', false)->count() > 2)
                        @php $moreImage = $car->images->where('is_primary', false)->skip(2)->first(); @endphp
                        <div class="listing-item view-gallery">
                            <div class="images">
                                <img src="{{ asset($moreImage->image) }}"
                                    class="swiper-image tfcl-light-gallery"
                                    alt="Car Image">
                                <div class="overlay-limit">
                                    <img src="/user/assets/images/car-list/img.png"
                                        class="icon-img" alt="icon-map">
                                    <p>{{ $car->images->where('is_primary', false)->count() - 2 }}
                                        more photos</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Bullets --}}
                    <div class="bullet-hover-listing">
                        <div class="bl-item active"></div>
                        @if ($car->images->count() > 1)
                            <div class="bl-item"></div>
                        @endif
                        @if ($car->images->count() > 2)
                            <div class="bl-item"></div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Favorite / Featured --}}
            <a href="#" class="icon-favorite" data-car-id="{{ $car->id }}">
                <i class="icon-heart-1-1"></i>
            </a>
            @if ($car->is_featured)
                <span class="feature">Featured</span>
            @endif
        </div>


        <div class="listing-item-content">
            <div class="listing-top-content">
                <h6 class="title">
                    <a href="{{ route('car.details', $car->id) }}">
                        {{ $car->brand->title ?? '' }} - {{ $car->model->title ?? '' }}
                    </a>
                </h6>

                <div class="description">
                    <ul>
                        <li class="listing-information fuel">
                            <i class="icon-gasoline-pump-1"></i>
                            <div class="inner">
                                <span>Registered In</span>
                                <p>{{ $car->registered_in ?? 'N/A' }}</p>
                            </div>
                        </li>
                        <li class="listing-information size-engine">
                            <i class="icon-Group1"></i>
                            <div class="inner">
                                <span>Mileage</span>
                                <p>{{ $car->mileage }} {{ $car->mileage_unit }}</p>
                            </div>
                        </li>
                        <li class="listing-information transmission">
                            <i class="icon-gearbox-1"></i>
                            <div class="inner">
                                <span>City</span>
                                <p>{{ $car->city }}</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <ul class="list-controller">
                    <li>
                        <a href="#" data-car-id="{{ $car->id }}">
                            <i class="icon-heart-1-1"></i>
                            <span>Favorite</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-shuffle-2-11"></i>
                            <span>Compare</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-price-wrap">
                <div class="price-wrap">
                    <p class="price">PKR {{ number_format($car->price + 20) }}</p>
                    <p class="price-sale">PKR {{ number_format($car->price) }}</p>
                </div>
                <div class="btn-read-more">
                    <a class="more-link" href="{{ route('car.details', $car->id) }}">
                        <span>View details</span>
                        <i class="icon-arrow-right2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@empty
    <p>No cars found.</p>
@endforelse

