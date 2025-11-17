
@extends('client.layout.app')
@section('body-class', 'body header-fixed')
@section('header-class', 'main-header')
@section('content')

    <section class="listing-grid tf-section3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section">
                        <h2>Your Wishlist</h2>
                        <p class="mt-20">Cars you have added to your wishlist.</p>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div id="wishlist-loading" class="text-center py-5">
                        Loading your wishlist...
                    </div>

                    <div id="empty-wishlist" class="text-center py-5" style="display:none;">
                        Your wishlist is empty.
                    </div>

                    <div id="wishlist-cars-container" style="display:none;">
                        <div class="list-car-grid-4 gap-30" id="cars-grid"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        function loadWishlistCars() {
            const ids = WishlistManager.getWishlist();

            if (!ids.length) {
                $('#wishlist-loading').hide();
                $('#empty-wishlist').show();
                $('#wishlist-cars-container').hide();
                return;
            }

            // Show loading
            $('#wishlist-loading').show();
            $('#empty-wishlist').hide();
            $('#wishlist-cars-container').hide();

            $.ajax({
                url: '{{ route("api.wishlist.cars.html") }}',
                type: 'POST',
                data: {
                    ids: ids,
                    _token: '{{ csrf_token() }}'
                },
                success: function(html) {
                    $('#wishlist-loading').hide();

                    if (!html || html.trim() === '') {
                        $('#empty-wishlist').show();
                        return;
                    }

                    $('#wishlist-cars-container').show();
                    $('#cars-grid').html(html);

                    // Update heart icons
                    if (typeof WishlistManager !== 'undefined' && typeof WishlistManager.updateAllHeartIcons === 'function') {
                        setTimeout(function() {
                            WishlistManager.updateAllHeartIcons();
                        }, 100);
                    }
                },
                error: function() {
                    $('#wishlist-loading').hide();
                    $('#empty-wishlist').show();
                    if (typeof showErrorToast !== 'undefined') {
                        showErrorToast('Error loading wishlist cars');
                    }
                }
            });
        }

        loadWishlistCars();

        // Reload wishlist when heart icon is clicked anywhere
        $(document).on('click', '[data-car-id]', function() {
            setTimeout(loadWishlistCars, 300);
        });
    });
</script>
@endsection

