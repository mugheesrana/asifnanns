@extends('admin.layouts.app')
@section('title', 'Edit Car')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Car</h4>


                            <form action="{{ route('admin.cars.update', $car->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Brand</label>
                                        <select name="brand_id" class="form-control" required>
                                            <option value="">Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ old('brand_id', $car->brand_id) == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Model</label>
                                        <select name="model_id" id="model_id" class="form-control" required>
                                            <option value="">Select Model</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Version</label>
                                        <select name="version_id" id="version_id" class="form-control">
                                            <option value="">Select Version</option>
                                        </select>
                                    </div>


                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Year</label>
                                        <input type="number" name="year" class="form-control"
                                            value="{{ old('year', $car->year) }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" name="city" class="form-control"
                                            value="{{ old('city', $car->city) }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Registered In</label>
                                        <input type="text" name="registered_in" class="form-control"
                                            value="{{ old('registered_in', $car->registered_in) }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Exterior Color</label>
                                        <input type="text" name="exterior_color" class="form-control"
                                            value="{{ old('exterior_color', $car->exterior_color) }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Mileage</label>
                                        <input type="number" name="mileage" class="form-control"
                                            value="{{ old('mileage', $car->mileage) }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Mileage Unit</label>
                                        <select name="mileage_unit" class="form-control">
                                            <option value="km"
                                                {{ old('mileage_unit', $car->mileage_unit) == 'km' ? 'selected' : '' }}>
                                                Kilometers</option>
                                            <option value="miles"
                                                {{ old('mileage_unit', $car->mileage_unit) == 'miles' ? 'selected' : '' }}>
                                                Miles</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Price (PKR)</label>
                                        <input type="number" name="price" class="form-control"
                                            value="{{ old('price', $car->price) }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Transmission</label>
                                        <select name="transmission" class="form-control">
                                            <option value="">Select Transmission</option>
                                            <option value="manual" {{ old('transmission', $car->transmission) == 'manual' ? 'selected' : '' }}>
                                                Manual</option>
                                            <option value="automatic"
                                                {{ old('transmission', $car->transmission) == 'automatic' ? 'selected' : '' }}>Automatic
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Engine Type</label>
                                        <input type="text" name="engine_type" class="form-control"
                                            value="{{ old('engine_type', $car->engine_type) }}" placeholder="e.g., 1500cc, 2000cc">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Fuel Type</label>
                                        <select name="fuel_type" class="form-control">
                                            <option value="">Select Fuel Type</option>
                                            <option value="petrol" {{ old('fuel_type', $car->fuel_type) == 'petrol' ? 'selected' : '' }}>
                                                Petrol</option>
                                            <option value="diesel" {{ old('fuel_type', $car->fuel_type) == 'diesel' ? 'selected' : '' }}>
                                                Diesel</option>
                                            <option value="hybrid" {{ old('fuel_type', $car->fuel_type) == 'hybrid' ? 'selected' : '' }}>
                                                Hybrid</option>
                                            <option value="electric"
                                                {{ old('fuel_type', $car->fuel_type) == 'electric' ? 'selected' : '' }}>Electric</option>
                                            <option value="cng" {{ old('fuel_type', $car->fuel_type) == 'cng' ? 'selected' : '' }}>CNG
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Condition</label>
                                        <select name="condition" class="form-control">
                                            <option value="">Select Condition</option>
                                            <option value="new" {{ old('condition', $car->condition) == 'new' ? 'selected' : '' }}>New
                                            </option>
                                            <option value="used" {{ old('condition', $car->condition) == 'used' ? 'selected' : '' }}>Used
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Is Sold?</label>
                                        <select name="is_sold" class="form-control">
                                            <option value="0" {{ old('is_sold', $car->is_sold) == '0' ? 'selected' : '' }}>No
                                            </option>
                                            <option value="1" {{ old('is_sold', $car->is_sold) == '1' ? 'selected' : '' }}>Yes
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Is Featured?</label>
                                        <select name="is_featured" class="form-control">
                                            <option value="0" {{ old('is_featured', $car->is_featured) == '0' ? 'selected' : '' }}>
                                                No</option>
                                            <option value="1" {{ old('is_featured', $car->is_featured) == '1' ? 'selected' : '' }}>Yes
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="active"
                                                {{ old('status', $car->status) == 'active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="inactive"
                                                {{ old('status', $car->status) == 'inactive' ? 'selected' : '' }}>Inactive
                                            </option>
                                            <option value="suspended"
                                                {{ old('status', $car->status) == 'suspended' ? 'selected' : '' }}>
                                                Suspended</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" class="form-control" rows="4">{{ old('description', $car->description) }}</textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Location (Google Map)</label>
                                        <input type="text" name="location" id="location-input" class="form-control"
                                            value="{{ old('location', $car->location) }}"
                                            placeholder="Pick location from map">
                                        <small class="text-muted">Search location in map below, it will auto-fill
                                            here.</small>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Pick Location on Map</label>
                                        <input id="pac-input" class="form-control mb-2" type="text"
                                            placeholder="Search location">
                                        <div id="map" style="height: 300px; width: 100%;"></div>
                                    </div>





                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Contact Name</label>
                                        <input type="text" name="contact_name" class="form-control"
                                            value="{{ old('contact_name', $car->contact_name) }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Secondary Phone</label>
                                        <input type="text" name="contact_phone_secondary" class="form-control"
                                            value="{{ old('contact_phone_secondary', $car->contact_phone_secondary) }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Allow WhatsApp?</label>
                                        <select name="allow_whatsapp" class="form-control">
                                            <option value="0"
                                                {{ old('allow_whatsapp', $car->allow_whatsapp) == '0' ? 'selected' : '' }}>No</option>
                                            <option value="1"
                                                {{ old('allow_whatsapp', $car->allow_whatsapp) == '1' ? 'selected' : '' }}>
                                                Yes
                                            </option>
                                        </select>
                                    </div>


                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Contact Phone</label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ old('phone', $car->contact_phone) }}" required>
                                    </div>
                                </div>

                                <!-- Existing Images Section -->
                                @if ($car->images->count() > 0)
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <h5 class="mb-3">Current Images</h5>
                                            <div class="row">
                                                @foreach ($car->images as $image)
                                                    <div class="col-md-3 mb-3">
                                                        <div class="card">
                                                            <img src="{{ asset($image->image) }}" class="card-img-top"
                                                                alt="Car Image" style="height: 150px; object-fit: cover;">
                                                            <div class="card-body p-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="remove_images[]"
                                                                        value="{{ $image->id }}"
                                                                        id="remove_{{ $image->id }}">
                                                                    <label class="form-check-label"
                                                                        for="remove_{{ $image->id }}">
                                                                        Remove
                                                                    </label>
                                                                </div>
                                                                @if ($image->is_primary)
                                                                    <small class="badge bg-success">Primary</small>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Add New Images Section -->
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label class="form-label">Add New Images</label>
                                        <input type="file" name="images[]" class="form-control" multiple
                                            accept="image/*">
                                        <div class="form-text">Select new images to add. If no primary image exists, the
                                            first new image will be set as primary.</div>
                                    </div>
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-success">Update Car</button>
                                    <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            let selectedModel = "{{ old('model_id', $car->model_id) }}";
            let selectedVersion = "{{ old('version_id', $car->version_id) }}";

            // When brand changes → load models
            $('select[name="brand_id"]').on('change', function() {
                let brandId = $(this).val();
                if (brandId) {
                    $.ajax({
                        url: "{{ url('/admin/get-models') }}/" + brandId,
                        type: "GET",
                        success: function(models) {
                            $('#model_id').empty().append(
                                '<option value="">Select Model</option>');
                            $('#version_id').empty().append(
                                '<option value="">Select Version</option>');
                            $.each(models, function(i, model) {
                                $('#model_id').append('<option value="' + model.id +
                                    '" ' + (model.id == selectedModel ? "selected" :
                                        "") + '>' + model.title + '</option>');
                            });

                            if (selectedModel) {
                                $('#model_id').trigger('change');
                            }
                        }
                    });
                }
            });

            // When model changes → load versions
            $('#model_id').on('change', function() {
                let modelId = $(this).val();
                if (modelId) {
                    $.ajax({
                        url: "{{ url('/admin/get-versions') }}/" + modelId,
                        type: "GET",
                        success: function(versions) {
                            $('#version_id').empty().append(
                                '<option value="">Select Version</option>');
                            $.each(versions, function(i, version) {
                                $('#version_id').append('<option value="' + version.id +
                                    '" ' + (version.id == selectedVersion ?
                                        "selected" : "") + '>' + version.title +
                                    '</option>');
                            });
                        }
                    });
                }
            });

            // Trigger on load (for existing car)
            $('select[name="brand_id"]').trigger('change');
        });
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlj6p2fMkl1mCalWzghsneWQLorB5gX2o&libraries=places">
    </script>
    <script>
        function initMap() {
            let defaultLocation = {
                lat: 30.3753,
                lng: 69.3451
            }; // Pakistan fallback
            let mapZoom = 6;

            // Try to extract from existing embed URL if available
            @if ($car->location)
                try {
                    let url = new URL("{{ $car->location }}");
                    let params = new URLSearchParams(url.search);

                    if (params.has("center")) {
                        let center = params.get("center").split(",");
                        defaultLocation = {
                            lat: parseFloat(center[0]),
                            lng: parseFloat(center[1])
                        };
                        mapZoom = parseInt(params.get("zoom")) || 15;
                    }
                } catch (e) {}
            @endif

            // Init map
            let map = new google.maps.Map(document.getElementById("map"), {
                center: defaultLocation,
                zoom: mapZoom,
            });

            let marker = new google.maps.Marker({
                position: defaultLocation,
                map,
                draggable: true,
            });

            // Autocomplete input
            let input = document.getElementById("pac-input");
            let autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo("bounds", map);

            // Box that stores embed link
            let linkInput = document.getElementById("location-input");

            // On autocomplete select
            autocomplete.addListener("place_changed", function() {
                marker.setVisible(false);
                let place = autocomplete.getPlace();
                if (!place.geometry) return;

                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(15);
                }

                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                // Save embed URL into text box
                let embedUrl =
                    `https://www.google.com/maps/embed/v1/place?key=AIzaSyBlj6p2fMkl1mCalWzghsneWQLorB5gX2o&q=${encodeURIComponent(place.formatted_address)}`;
                linkInput.value = embedUrl;
            });

            // On map click
            map.addListener("click", function(event) {
                marker.setPosition(event.latLng);
                marker.setVisible(true);

                let embedUrl =
                    `https://www.google.com/maps/embed/v1/view?key=AIzaSyBlj6p2fMkl1mCalWzghsneWQLorB5gX2o&center=${event.latLng.lat()},${event.latLng.lng()}&zoom=15`;
                linkInput.value = embedUrl;
            });
        }

        google.maps.event.addDomListener(window, "load", initMap);
    </script>
@endsection
