<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'LaraBBS')</title>
    <meta name="description" content="@yield('description', 'LaraBBS')" />


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta http-equiv="x-pjax-version" content="{{ mix('/css/app.css') }}">
    @yield('styles')
</head>

<body>
<div id="app" class="{{ route_class() }}-page">

    @include('layouts._header')

    <div class="container" id="pjax-container">

        @include('layouts._message')
        @yield('content')

    </div>

    @include('layouts._footer')
</div>

{{--@if (app()->isLocal())--}}
    {{--@include('sudosu::user-selector')--}}
{{--@endif--}}

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/1.9.6/jquery.pjax.min.js"></script>
@yield('scripts')
<script>
    $(document).pjax('a', '#pjax-container');
    $(document).on("pjax:timeout", function(event) {
        // 阻止超时导致链接跳转事件发生
        event.preventDefault()
    });
</script>
</body>
</html>