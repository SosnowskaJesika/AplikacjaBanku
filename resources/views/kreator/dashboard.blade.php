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
        <div id="success-modal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background: green; color: white">
                        <h5 class="modal-title">Udało się!</h5>
                    </div>
                    <div class="modal-body">
                        <p>Zapisano z powodzeniem!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="window.location.reload();">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Zmiana danych</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/panel" class="text-muted">Panel</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Zmień dane</li>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Obecne Dane</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-primary text-white">
                                        <tr>
                                            <th>Imię</th>
                                            <th>Nazwisko</th>
                                            <th>Pesel</th>
                                            <th>Data Urodzenia</th>
                                        </tr>
                                        </thead>
                                        @foreach ($konta as $konto)
                                            <tbody>
                                            <tr>
                                                <td>{{$konto->imie}}</td>
                                                <td>{{$konto->nazwisko}}</td>
                                                <td>{{$konto->pesel}}</td>
                                                <td>{{$konto->data_urodzenia}}</td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form id="update-data" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                  @foreach ($konta as $konto)
                                  <p>Cześć, </a> {{ $konto->imie }} {{ $konto->nazwisko }}</p>
                                  @endforeach
                                    <span class="section">Poniżej możesz zaktualizować swoje nowe dane:</span>

                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nowe Imię <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="imie" required="required" class="form-control col-md-7 col-xs-12" value="{{old('imie')}}">
                                      </div>
                                    </div>

                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nowe Nazwisko <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="nazwisko" class="form-control col-md-7 col-xs-12" value="{{old('nazwisko')}}" required="required" type="text">
                                      </div>
                                    </div>

                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Nowy Pesel <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="pesel" required="required" class="form-control col-md-7 col-xs-12" minlength="11" maxlength="11" value="{{old('pesel')}}">
                                      </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Nowa Data Urodzenia <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="date" name="data_urodzenia" required="required" class="form-control col-md-7 col-xs-12" min="1901-01-01" value="{{old('data_urodzenia')}}">
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
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
        {{-- Załadowanie pliku, który zawiera skrypt jquery --}}
        @include('layouts/dashboard.footer_jquery')
</body>

</html>
