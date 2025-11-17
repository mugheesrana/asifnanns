@extends('admin.layouts.app')
@section('title', 'Add Car')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add New Car</h4>

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                </div>
                            @endif

                            <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Brand</label>
                                        <select name="brand_id" class="form-control" required>
                                            <option value="">Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
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
                                            value="{{ old('year') }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" name="city" class="form-control"
                                            value="{{ old('city') }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Registered In</label>
                                        <input type="text" name="registered_in" class="form-control"
                                            value="{{ old('registered_in') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Exterior Color</label>
                                        <input type="text" name="exterior_color" class="form-control"
                                            value="{{ old('exterior_color') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Mileage</label>
                                        <input type="number" name="mileage" class="form-control"
                                            value="{{ old('mileage') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Mileage Unit</label>
                                        <select name="mileage_unit" class="form-control">
                                            <option value="km"
                                                {{ old('mileage_unit', 'km') == 'km' ? 'selected' : '' }}>Kilometers
                                            </option>
                                            <option value="miles" {{ old('mileage_unit') == 'miles' ? 'selected' : '' }}>
                                                Miles</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Price (PKR)</label>
                                        <input type="number" name="price" class="form-control"
                                            value="{{ old('price') }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Transmission</label>
                                        <select name="transmission" class="form-control">
                                            <option value="">Select Transmission</option>
                                            <option value="manual" {{ old('transmission') == 'manual' ? 'selected' : '' }}>
                                                Manual</option>
                                            <option value="automatic"
                                                {{ old('transmission') == 'automatic' ? 'selected' : '' }}>Automatic
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Engine Type</label>
                                        <input type="text" name="engine_type" class="form-control"
                                            value="{{ old('engine_type') }}" placeholder="e.g., 1500cc, 2000cc">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Fuel Type</label>
                                        <select name="fuel_type" class="form-control">
                                            <option value="">Select Fuel Type</option>
                                            <option value="petrol" {{ old('fuel_type') == 'petrol' ? 'selected' : '' }}>
                                                Petrol</option>
                                            <option value="diesel" {{ old('fuel_type') == 'diesel' ? 'selected' : '' }}>
                                                Diesel</option>
                                            <option value="hybrid" {{ old('fuel_type') == 'hybrid' ? 'selected' : '' }}>
                                                Hybrid</option>
                                            <option value="electric"
                                                {{ old('fuel_type') == 'electric' ? 'selected' : '' }}>Electric</option>
                                            <option value="cng" {{ old('fuel_type') == 'cng' ? 'selected' : '' }}>CNG
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Condition</label>
                                        <select name="condition" class="form-control">
                                            <option value="">Select Condition</option>
                                            <option value="new" {{ old('condition') == 'new' ? 'selected' : '' }}>New
                                            </option>
                                            <option value="used" {{ old('condition') == 'used' ? 'selected' : '' }}>Used
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Is Sold?</label>
                                        <select name="is_sold" class="form-control">
                                            <option value="0" {{ old('is_sold', '0') == '0' ? 'selected' : '' }}>No
                                            </option>
                                            <option value="1" {{ old('is_sold') == '1' ? 'selected' : '' }}>Yes
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Is Featured?</label>
                                        <select name="is_featured" class="form-control">
                                            <option value="0" {{ old('is_featured', '0') == '0' ? 'selected' : '' }}>
                                                No</option>
                                            <option value="1" {{ old('is_featured') == '1' ? 'selected' : '' }}>Yes
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="active"
                                                {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                                Inactive</option>
                                            <option value="suspended"
                                                {{ old('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Location (Google Map)</label>
                                        <input type="text" name="location" id="location-input" class="form-control"
                                            value="{{ old('location') }}" placeholder="Pick location from map">
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
                                            value="{{ old('contact_name') }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Secondary Phone</label>
                                        <input type="text" name="contact_phone_secondary" class="form-control"
                                            value="{{ old('contact_phone_secondary') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Allow WhatsApp?</label>
                                        <select name="allow_whatsapp" class="form-control">
                                            <option value="0"
                                                {{ old('allow_whatsapp', '0') == '0' ? 'selected' : '' }}>No</option>
                                            <option value="1" {{ old('allow_whatsapp') == '1' ? 'selected' : '' }}>
                                                Yes
                                            </option>
                                        </select>
                                    </div>


                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Contact Phone</label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ old('phone') }}" required>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Car Images</label>
                                        <input type="file" name="images[]" class="form-control" multiple
                                            accept="image/*">
                                        <div class="form-text">Select multiple images. The first image will be set as
                                            primary.</div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
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
            // When brand changes → load models
            $('select[name="brand_id"]').on('change', function() {
                console.log("brand_id hitted");

                let brandId = $(this).val();
                if (brandId) {
                    console.log("brand find");
                    $.ajax({
                        url: "{{ url('/admin/get-models') }}/" + brandId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#model_id').empty().append(
                                '<option value="">Select Model</option>');
                            $('#version_id').empty().append(
                                '<option value="">Select Version</option>');
                            $.each(data, function(key, model) {
                                $('#model_id').append('<option value="' + model.id +
                                    '">' + model.title + '</option>');
                            });
                        }
                    });
                } else {
                    $('#model_id').empty().append('<option value="">Select Model</option>');
                    $('#version_id').empty().append('<option value="">Select Version</option>');
                }
            });

            // When model changes → load versions
            $('#model_id').on('change', function() {
                let modelId = $(this).val();
                if (modelId) {
                    $.ajax({
                        url: "{{ url('/admin/get-versions') }}/" + modelId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#version_id').empty().append(
                                '<option value="">Select Version</option>');
                            $.each(data, function(key, version) {
                                $('#version_id').append('<option value="' + version.id +
                                    '">' + version.title + '</option>');
                            });
                        }
                    });
                } else {
                    $('#version_id').empty().append('<option value="">Select Version</option>');
                }
            });
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlj6p2fMkl1mCalWzghsneWQLorB5gX2o&libraries=places">
    </script>
    <script>
        function initMap() {
            let defaultLocation = {
                lat: 30.3753,
                lng: 69.3451
            }; // Pakistan center fallback

            let map = new google.maps.Map(document.getElementById("map"), {
                center: defaultLocation,
                zoom: 6,
            });

            let input = document.getElementById("pac-input");
            let autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo("bounds", map);

            let marker = new google.maps.Marker({
                map,
                anchorPoint: new google.maps.Point(0, -29),
                draggable: true
            });

            // When place selected
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

                // Save Google Maps Embed URL to hidden input
                let embedUrl =
                    `https://www.google.com/maps/embed/v1/place?key=AIzaSyBlj6p2fMkl1mCalWzghsneWQLorB5gX2o&q=${encodeURIComponent(place.formatted_address)}`;
                document.getElementById("location-input").value = embedUrl;
            });

            // Drag marker manually
            google.maps.event.addListener(map, 'click', function(event) {
                marker.setPosition(event.latLng);
                marker.setVisible(true);

                let embedUrl =
                    `https://www.google.com/maps/embed/v1/view?key=AIzaSyBlj6p2fMkl1mCalWzghsneWQLorB5gX2o&center=${event.latLng.lat()},${event.latLng.lng()}&zoom=15`;
                document.getElementById("location-input").value = embedUrl;
            });
        }

        google.maps.event.addDomListener(window, "load", initMap);
    </script>

@endsection
