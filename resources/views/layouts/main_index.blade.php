<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Qoribobo management</title>
    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <!-- CSS files -->
    <link href="/dist/css/tabler.min.css?1684106062" rel="stylesheet"/>
    <link href="/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet"/>
    <link href="/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet"/>
    <link href="/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet"/>
    <link href="/dist/css/demo.min.css?1684106062" rel="stylesheet"/>
    @include('components.fonts')
  </head>
  <body >
    <div class="page">
      @include('components.navbar')
      <div class="page-wrapper">


        @yield('content')

        </div>
          </div>
        </div>
        @include('components.footer')
      </div>
    </div>
    <!-- Libs JS -->
    <script src="/dist/libs/apexcharts/dist/apexcharts.min.js?1684106062" defer></script>
    <script src="/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062" defer></script>
    <script src="/dist/libs/jsvectormap/dist/maps/world.js?1684106062" defer></script>
    <script src="/dist/libs/jsvectormap/dist/maps/world-merc.js?1684106062" defer></script>
    <!-- Tabler Core -->
    <script src="/dist/js/tabler.min.js?1684106062" defer></script>
    <script src="/dist/js/demo.min.js?1684106062" defer></script>
    <script src="/dist/js/demo-theme.min.js?1684106062"></script>
    @include('components.scripts')
  </body>
</html>