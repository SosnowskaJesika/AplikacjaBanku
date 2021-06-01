<!DOCTYPE html>
<html dir="ltr" lang="pl">
{{-- Załadowanie pliku, który zawiera skecję head --}}
@include('layouts/dashboard.head')

<body>
    {{-- Załadowanie pliku, który zawiera animacje podczas wczytywania strony --}}
    @include('layouts/dashboard.preloader')
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        {{-- Załadowanie pliku, który zawiera skecję górnej nawigacji --}}
        @include('layouts/dashboard.topbar')
        {{-- Załadowanie pliku, który zawiera menu po lewej stronie --}}
        @include('layouts/dashboard.sidebar')
        {{-- Załadowanie pliku, który zawiera główną treść strony --}}
        @include('layouts/dashboard/saldo.pagewraper')
        {{-- Załadowanie pliku, który zawiera skrypt jquery --}}
        @include('layouts/dashboard.footer_jquery')
</body>

</html>