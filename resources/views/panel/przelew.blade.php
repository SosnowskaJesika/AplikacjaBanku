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
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Przelewy</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/panel" class="text-muted">Panel</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Wykonaj Przelew</li>
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
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Wykonaj Przelew</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form class="form-horizontal form-label-left" novalidate enctype="multipart/form-data" method="post" action="/panel/przelew-wyslany">
                                @foreach ($salda as $saldo)
                                <p>Obecny stan konta: {{ $saldo->stan_konta }} zł</a></p>
                                @endforeach
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Wprowadź ID użytkownika do którego chcesz wysłać przelew<span class="required">*</span></h4>
                                        <div class="form-group">
                                            <input type="text" name="id_otrzymujacego" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Wprowadź kwotę jaką chcesz przelać<span class="required">*</span></h4>
                                            <div class="form-group">
                                                <input type="number" name="kwota" required="required" step="0.10" min="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="item form-group">
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Wprowadź tytuł przelewu</h4>
                                            <div class="form-group">
                                                <textarea class="form-control" name="tytul" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Wybierz kategorie przelewu<span class="required">*</span></h4>
                                            <div class="form-group mb-4">
                                                <select class="custom-select mr-sm-2" name="kategoria" id="inlineFormCustomSelect">
                                                    <option value="Brak Kategorii" selected>Brak Kategorii</option>
                                                    <option value="Wynagrodzenie">Wynagrodzenie</option>
                                                    <option value="Kieszonkowe">Kieszonkowe</option>
                                                    <option value="Faktura">Faktura</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary"><a href="/panel" style="color: #ffffff;">Powrót</a></button>
                                    <button id="send" type="submit" class="btn btn-success">Potwierdź</button>
                                </div>
                              </div>
                              @csrf
                            </form>
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
        {{-- @include('layouts/dashboard.pagewraper') --}}
        {{-- Załadowanie pliku, który zawiera skrypt jquery --}}
        @include('layouts/dashboard.footer_jquery')
</body>

</html>
