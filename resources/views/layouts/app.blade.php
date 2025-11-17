@php
    $global = site_settings();
@endphp
    @include('partials.header')
    @yield('content')
    @include('partials.footer')
    @yield('scripts')

