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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Historia Przelewów</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/panel" class="text-muted">Panel</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Historia Przelewów</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <span style="text-align: center"><p>Przelewy Wysłane</p></span>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Kwota</th>
                                                <th>Tytuł przelewu</th>
                                                <th>Numer ID</th>
                                                <th>Kategoria przelewu</th>
                                                <th>Przelew do ID</th>
                                                <th>Data wykonania przelewu</th>
                                                <th>Status przelewu</th>
                                            </tr>
                                        </thead>
                                        @foreach ($wykonujacy as $wykonujacyA)
                                        <tbody>
                                            <tr>
                                                <td>{{$wykonujacyA->wielkosc_przelewu}} zł</span></td>
                                                <td>{{$wykonujacyA->tytul_przelewu}}</td>
                                                <td>{{$wykonujacyA->id}}</td>
                                                <td>{{$wykonujacyA->kategoria_przelewu}}</td>
                                                <td>{{$wykonujacyA->otrzymujacy_przelew_id}}</td>
                                                <td>{{$wykonujacyA->data_wykonania_przelewu}}</td>
                                                <td>Zakończono!</td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <span style="text-align: center"><p>Przelewy Otrzymane</p></span>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Kwota</th>
                                                <th>Tytuł przelewu</th>
                                                <th>Numer ID</th>
                                                <th>Kategoria przelewu</th>
                                                <th>Przelew od ID</th>
                                                <th>Data wykonania przelewu</th>
                                                <th>Status przelewu</th>
                                            </tr>
                                        </thead>
                                        @foreach ($otrzymujacy as $otrzymujacyB)
                                        <tbody>
                                            <tr>
                                                <td>{{$otrzymujacyB->wielkosc_przelewu}} zł</span></td>
                                                <td>{{$otrzymujacyB->tytul_przelewu}}</td>
                                                <td>{{$otrzymujacyB->id}}</td>
                                                <td>{{$otrzymujacyB->kategoria_przelewu}}</td>
                                                <td>{{$otrzymujacyB->wykonujacy_przelew_id}}</td>
                                                <td>{{$otrzymujacyB->data_wykonania_przelewu}}</td>
                                                <td>Zakończono!</td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
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
