<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<!-- Header -->
@include('frontend.layouts.includes.header')

<body>

    <!-- Navbar -->
    @include('frontend.layouts.includes.navbar')


    <!-- Main Section -->
    @yield('mainsection')


    <!-- Footer -->
    @include('frontend.layouts.includes.footer')


    <!-- Scripts -->
    @include('frontend.layouts.includes.scripts')

</body>

</html>
