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
{{-- @include('layouts/dashboard.pagewraper') --}}
<!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Suma zadłużenia</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="/panel" class="text-muted">Panel</a></li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">Suma zadłużenia</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-5 align-self-center">
                    <div class="customize-input float-right">
                        <div class="custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                            {{ $today = date("F j") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- basic table -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div>Suma zadłużenia: {{ $sumaZadluzenia }}</div>
                            <div>Data wzięcia: {{ $dataWziecia }}</div>
                            <div>Data spłaty: {{ $dataSplaty }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center text-muted">
            All Rights Reserved by Adminmart. Designed and Developed by <a
                href="https://wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
{{-- Załadowanie pliku, który zawiera skrypt jquery --}}
@include('layouts/dashboard.footer_jquery')
</body>

</html>
