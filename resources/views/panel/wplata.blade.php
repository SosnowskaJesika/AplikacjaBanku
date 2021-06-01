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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Wpłata gotówki</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/panel" class="text-muted">Panel</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Wpłać Gotówkę</li>
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
                            <h2>Wpłać Gotówkę</h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <form class="form-horizontal form-label-left" novalidate enctype="multipart/form-data" method="post" action="/panel/wplata-wykonana">
                                @foreach ($salda as $saldo)
                                <p>Obecny stan konta: {{ $saldo->stan_konta }} zł</a></p>
                                @endforeach

                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Wprowadź Kwotę do wpłaty<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="number" id="number" name="wplata" required="required" step="0.10" min="0" class="form-control col-md-7 col-xs-12" value="{{old('value')}}">
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
