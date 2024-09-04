<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MäDI Studio & Spa | Sistema citas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="{{url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
 
  <!-- jQuery -->
  <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>

  <!-- Sweetalert 2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Iconos de bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Datatable -->
  <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <!-- Full Calendar-->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

  <link href="{{url('fullcalendar/es.global.js')}}">

  <!-- CKEditor-->
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css" />

</head>

<body class="hold-transition sidebar-mini"> <!-- //side collapse para que se oculte el sidebar -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{url('/admin')}}" class="nav-link">Agenda de citas MäDI Studio & Spa</a>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <!-- <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a> -->

        </li>
        <li class="nav-item">
          <!-- <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a> -->
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4"
      style="position: fixed;  height: 100vh; overflow-y: auto;"">
      <!-- Brand Logo -->
      <a href=" {{url('/admin')}}" class="brand-link">
      <img src="{{url('dist/img/mady-bca-cafe.jpg')}}" alt="Mady Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">MäDI Studio & Spa </span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header">PRINCIPAL</li>
            <li class="nav-item">
              <a href="{{url('admin')}}" class="nav-link">
                <i class="nav-icon fas bi bi-speedometer"></i>
                <p>
                  Panel principal
                </p>
              </a>
            </li>
            @can('admin.usuarios.index')
            <li class="nav-item">
              <a href="{{url('admin/configuraciones')}}" class="nav-link">
                <i class="nav-icon fas bi bi-gear"></i>
                <p>
                  Configuraciones
                </p>
              </a>
            </li>
            @endcan
            @can('admin.empleados.index')
            <li class="nav-header">USUARIOS</li>
            @endcan
            @can('admin.usuarios.index')
            <li class="nav-item">
              <a href="{{url('admin/usuarios')}}" class="nav-link">
                <i class="nav-icon fas bi bi-people-fill"></i>
                <p>
                  Usuarios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/usuarios/create')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Crear usuario</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/usuarios')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de usuarios</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan
            @can('admin.secretarias.index')
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas bi bi-person-workspace"></i>
                <p>
                  Secretarias
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/secretarias/create')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Creación de secretarias</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/secretarias')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de secretarias</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan
            @can('admin.empleados.index')
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas bi bi-person-vcard"></i>
                <p>
                  Empleados
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/empleados/create')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Creación de empleados</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/empleados')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de empleados</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/empleados/reportes')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Reportes</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan
            @can('admin.clientes.index')
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas bi bi-person-fill-check"></i>
                <p>
                  Clientes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/clientes/create')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Creación de clientes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/clientes')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de clientes</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan
            @can('admin.servicios.index')
            <li class="nav-header">COMPAÑIA</li>
            <li class="nav-item">
              <a href="{{url('admin/servicios')}}" class="nav-link">
                <i class="nav-icon fas bi bi-tags-fill"></i>
                <p>
                  Servicios
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/categorias')}}" class="nav-link">
                <i class="nav-icon fas bi bi-list-ul"></i>
                <p>
                  Categorías
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas bi bi-clock-history"></i>
                <p>
                  Horarios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/horarios/create')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Creación de horarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/horarios')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de horarios</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan
            @can('admin.usuarios.index')
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas bi bi-calendar-check"></i>
                <p>
                  Reservas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/reservas/reportes')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Reportes</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan

            @if (Auth::check() && Auth::user()->empleado)
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas bi bi-clipboard-data"></i>
                  <p>
                    Historial
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('admin/historial')}}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listado de historial</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endif
            
            <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link" style="background-color: #a9200e" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="nav-icon fas bi bi-door-closed"></i>
                <p>
                  Cerrar sesión
                </p>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>



    @if (($message = Session::get('mensaje')) && ($icono = Session::get('icono')))
    <script>
      Swal.fire({
        position: "top-end",
        icon: "{{$icono}}",
        title: "{{$message}}",
        showConfirmButton: false,
        timer: 4500
      });
    </script>
    @endif

    <div class="content-wrapper">
      <br>
      <div class="container">
        @yield('content')
      </div>
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Num. Tel
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2024 <a href="#">Sistema MäDI Studio & Spa </a>.</strong> Todos los derechos reservados.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- Bootstrap 4 -->
  <script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Datatable -->
  <script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{url('plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{url('plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{url('plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{url('dist/js/adminlte.min.js')}}"></script>

  <!-- Full calendar-->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

</body>

</html>