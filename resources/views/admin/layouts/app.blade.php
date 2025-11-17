@php
    $global = site_settings();
@endphp
 @include('admin.partials.topbar')
 @include('admin.partials.sidebar')

 @yield('content')

 @include('admin.partials.footer')
 @yield('script')
