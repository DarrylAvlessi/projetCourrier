    <!doctype html>
    <html lang="fr">

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>ENEAM - Gestion de courriers</title>
      <link rel="shortcut icon" type="image/png" href="/images/logos/eneam.png" />
      {{-- <link rel="stylesheet" href="../css/styles.min.css" /> --}}
    </head>
    @stack('style')
    @vite([
        'resources/css/styles.min.css',
        'resources/css/timeline-1.css',
        'resources/css/simple-bar.css',
        'resources/css/icons/tabler-icons/tabler-icons.css',
        'resources/libs/jquery/dist/jquery.min.js',
        'resources/libs/bootstrap/dist/js/bootstrap.bundle.min.js',
        'resources/js/sidebarmenu.js',
        'resources/js/app.min.js',
        'resources/libs/simplebar/dist/simplebar.js',
        'resources/js/dashboard.js',
        'resources/vendor/fontawesome-free/css/all.min.css',
        'resources/vendor/datatables/dataTables.bootstrap4.min.css',
        'resources/vendor/datatables/jquery.dataTables.min.js',
        'resources/vendor/datatables/dataTables.bootstrap4.min.js',
        'resources/js/demo/datatables-demo.js',
        'resources/css/app.css',
        'resources/js/app.js'
        ])
    <body>
      <!--  Body Wrapper -->
      <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar" style="">
          <!-- Sidebar scroll-->
          <div style="position: relative;">
            <div class="brand-logo d-flex align-items-center justify-content-center">
              <a href="./index.html" class="text-nowrap logo-img">
                <img src="{{asset('images/logos/eneam.png')}}" width="50" height="50" alt=""/>
              </a>
              <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
              </div>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
              <ul id="sidebarnav">
                <li class="sidebar-item">
                  <a class="sidebar-link" href="/dashboard" aria-expanded="false">
                      <i class="fas fa-home"></i>
                    <span class="hide-menu">Tableau de bord</span>
                  </a>
                </li>

               @can('Enregister un courrier')
                  <li class="sidebar-item">
                    <div class="dropdown">
                          <a class="sidebar-link" href="./ui-buttons.html" aria-expanded="false" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="ti ti-download"></i>
                              Enregistrer un courrier
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <li><a class="dropdown-item sidebar-link" href="{{route('enregistrementCourrier', ['type'=>'arrivee'])}}">Courrier arrivée</a></li>
                              <li><a class="dropdown-item sidebar-link" href="{{route('enregistrementCourrier', ['type'=>'depart'])}}">Courrier départ</a></li>
                          </ul>
                    </div>
                  </li>
                @endcan

                  @can('voir tous les courriers departs')
                  <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('courrier_depart')}}" aria-expanded="false">
                      <span>
                        <i class="fas fa-envelope"></i>
                      </span>
                      <span class="hide-menu">Courriers départ</span>
                    </a>
                  </li>
                  @endcan

                  @can('voir tous les courriers arrivees')
                  <li class="sidebar-item">
                      <a class="sidebar-link" href="{{route('courrier_arrivee')}}" aria-expanded="false">
                        <span>
                          <i class="fas fa-envelope-open"></i>
                        </span>
                        <span class="hide-menu">Courriers arrivée</span>
                      </a>
                  </li>
                  @endcan
                {{-- @if(auth()->user()->getRoleNames()->first() != 'admin' and auth()->user()->getRoleNames()->first() != 'agent') --}}
                @can('afficher les affectations')
                <li class="sidebar-item">
                  <a class="sidebar-link" href="{{route('afficheaffectation')}}" aria-expanded="false">
                    <span>
                      <i class="fas fa-paper-plane"></i>
                    </span>
                    <span class="hide-menu">Mes affectations</span>
                  </a>
                </li>
                @endcan


                @can('afficher les traitements')
                  <li class="sidebar-item">
                      <a class="sidebar-link" href="{{route('affichetraitement')}}" aria-expanded="false">
                        <span>
                          <i class="fas fa-recycle"></i>
                        </span>
                        <span class="hide-menu">Mes Traitements</span>
                      </a>
                  </li>
                @endcan



                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('suivre_courrier') }}" aria-expanded="false">
                      <span>
                        <i class="fas fa-swatchbook"></i>
                      </span>
                      <span class="hide-menu">Suivre un courrier</span>
                    </a>
                </li>
                @can('voir les archives')
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('show_archives')}}" aria-expanded="false">
                        <span>
                            <i class="fas fa-archive"></i>
                        </span>
                        <span class="hide-menu">Voir les archives</span>
                    </a>
                </li>
                @endcan

                @can('gerer les utilisateurs')
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('users')}}" aria-expanded="false">
                        <span>
                            <i class="fas fa-users"></i>
                        </span>
                        <span class="hide-menu">Gérer les utilisateurs</span>
                    </a>
                </li>
                @endcan

                @can('gerer les services')
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('services')}}" aria-expanded="false">
                      <span>
                        <i class="fas fa-users"></i>
                      </span>
                      <span class="hide-menu">Gerer les services</span>
                    </a>
                </li>
                @endcan
                {{-- <li class="sidebar-item"  style="margin-top: 20px;" >
                  <a class="sidebar-link" href="" aria-expanded="false">
                    <span>
                      <i class="fas fa-power"></i>
                    </span>
                    <form action="/logout" method="post">
                        @csrf
                        <input class="btn btn-primary" type="submit" value="Me déconnecter">
                      </form>

                  </a>
                </li> --}}
              <div class="fixed-profile p-3 mb-2 bg-secondary-subtle rounded mt-3">
                <div class="hstack gap-3">
                  {{-- <div class="john-img">
                    <i class="ti ti-user fs-6"></i>
                  </div> --}}
                  <div class="john-title">
                    <h6 class="mb-0 fs-4 fw-semibold">{{Auth::user()->prenom}} {{Auth::user()->nom}}</h6>
                    <span class="fs-2">{{Auth::user()->getRoleNames()->first() ?? 'Invité'}}</span>
                  </div>
                  <a href="/logout" class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout" title="Se déconnecter">
                    <i class="ti ti-power fs-6"></i>
                  </a>
                </div>
              </div>



              </ul>

            </nav>
            <!-- End Sidebar navigation -->
          </div>
          <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
          <!--  Header Start -->
          <header class="app-header shadow-sm">
            <nav class="navbar navbar-expand-lg navbar-light">
              <ul class="navbar-nav">
                <li class="nav-item d-block d-xl-none">
                  <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                  </a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                    <i class="ti ti-bell-ringing"></i>
                    <div class="notification bg-primary rounded-circle"></div>
                  </a>
                </li> --}}
              </ul>
              <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                  <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" title="{{ Auth::user()->prenom }}"
                      aria-expanded="false">
                      {{-- <span>{{ Auth::user()->nom }} {{ Auth::user()->prenom }}, {{ Auth::user()->getRoleNames()->first()}}</span> --}}

                      <i class="ti ti-user"></i>
                    </a>
                    <form action="/logout" method="post" id="logout-form">
                        @csrf
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2" data-bs-popper="static">
                            <div class="message-body">

                                <div class="d-flex align-items-center py-1 px-7 border-bottom">
                                    <img src="../images/profile/user-1.jpg" class="rounded-circle" width="0" height="0" alt="modernize-img">
                                    <div class="mx-auto">
                                        <h6 class="mb-1 fs-3 fw-bold">{{Auth::user()->prenom}} {{Auth::user()->nom}}</h6>
                                        <span class="mb-1 text-center d-block">{{Auth::user()->getRoleNames()->first() ?? 'Invité'}}</span>
                                    </div>
                                  </div>
                                {{-- <div class="d-flex align-items-center py-1 text-center justify-content-center border-bottom">

                                    <div>
                                      <h5 class="mb-1 fs-3">{{Auth::user()->nom}}</h5>
                                      <span class="mb-1 d-block">{{Auth::user()->getRoleNames()->first()}}</span>
                                    </div>
                                </div> --}}
                                <a href="{{route('profile.edit')}}" class="d-flex align-items-center dropdown-item gap-2">
                                    <i class="ti ti-user fs-6"></i>
                                    <p class="mb-0 fs-3">Mon profil</p>
                                </a>
                                <a onclick="document.getElementById('logout-form').submit()" class="dropdown-item gap-2 d-flex">
                                    <i class="ti ti-power fs-6"></i>
                                    <p class="mb-0 fs-3">Déconnexion</p>
                                </a>
                            </div>
                        </div>
                    </form>
                    {{-- <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                      <div class="" style="display:flex;flex-direction:column; align-items:center;">
                        <a href="{{route('profile.edit')}}" class="d-flex align-items-center gap-2 dropdown-item" >
                          <i class="ti ti-user fs-6"></i>
                          <p class="mb-0 fs-3">Mon Profile</p>
                        </a>
                        <form action="/logout" method="post">
                          @csrf
                          <input class="btn btn-primary " type="submit" value="Me déconnecter">
                        </form>
                      </div>
                    </div> --}}
                  </li>
                </ul>
              </div>
            </nav>
        </header>
        <!--  Header End -->


        @yield('content')
        <div class="p-6 text-center">
        <p class="mb-0 fs-4">© Copyright 2024 | ENEAM - Gestion des courriers | Tous droits réservés. </p>
        </div>
        </div>
      </div>
      @stack('script')

    </body>

    </html>

