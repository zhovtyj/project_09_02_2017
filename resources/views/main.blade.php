<!DOCTYPE html>
<html lang="en">

@include('partials._head')

<body>

<div id="wrapper">
    @include('partials._header')
    @include('partials._sidebar')

    <div id="page-wrapper">
        <div id="page-inner">

            @yield('content')

            @include('partials._footer')

        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
@include('partials._javascripts')
@yield('javascripts')

</body>
</html>


