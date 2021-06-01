<!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/panel"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Podsumowanie</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Przelewy</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/panel/przelew"
                            aria-expanded="false"><i data-feather="message-square" class="feather-icon"></i><span
                                class="hide-menu">Wykonaj przelew</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="/panel/historia-przelewow"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">Historia Przelewów
                                </span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/panel/saldo"
                                aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                                    class="hide-menu">Sprawdź saldo</span></a></li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Kredyty</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/panel/kredyt"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Weź kredyt </span></a>

                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/panel/suma-zadluzenia"
                            aria-expanded="false"><i data-feather="sidebar" class="feather-icon"></i><span
                                class="hide-menu">Suma zadłużenia
                            </span></a>
                    </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/panel/splata-zadluzenia"
                                aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                                    class="hide-menu">Spłać zobowiązania </span></a>
                        </li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Depozyt</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/panel/wplata"
                                aria-expanded="false"><i data-feather="lock" class="feather-icon"></i><span
                                    class="hide-menu">Wpłać gotówkę
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                href="/panel/wyplata" aria-expanded="false"><i data-feather="lock"
                                    class="feather-icon"></i><span class="hide-menu">Wypłać gotówkę
                                </span></a>
                        </li>

                        <li class="list-divider"></li>

                        <li class="nav-small-cap"><span class="hide-menu">Twoje konto</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/panel/kreator"
                            aria-expanded="false"><i data-feather="lock" class="feather-icon"></i><span
                                class="hide-menu">Zmień dane
                            </span></a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                            href="/password/reset" aria-expanded="false"><i data-feather="lock"
                                class="feather-icon"></i><span class="hide-menu">Zmień hasło
                            </span></a>
                    </li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                                    class="hide-menu">{{ __('Wyloguj') }}</span></a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
