<html lang="en">
<head>
  <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta  name="viewport" content="width=device-width, initial-scale=1.0"&amp;gt;>
  <title>Taller Bolívar</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('lte/lugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('lte/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('lte/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('lte/plugins/summernote/summernote-bs4.min.css')}}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
  <link rel="icon" type="image/png" sizes="16x16" href='{{url("/img/navegador.png")}}'>

  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="preloader flex-column justify-content-center align-items-center">

  </div>

  <div class="wrapper">
    @include('admin.header')
           @include('admin.sidebar')

        <!-- Content Wrapper. Contains page content -->


    <div class="content-wrapper">
      <br><br><br>
      <!-- Content Header (Page header) -->
      <section class="content">

  @yield('content')
          </section>
      </div>
  </div>

<!-- jQuery -->
<script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('lte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script> $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('lte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('lte/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('lte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('lte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('lte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('lte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('lte/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('lte/dist/js/pages/dashboard.js')}}"></script>


<!-- Bootstrap 4 -->

<!-- DataTables  & Plugins -->

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="{{asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('lte/plugins/jszip/jszip.min.js')}}"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

<!-- Page specific script -->
<script>
 $(document).ready(function() {
  var table = $('#example').DataTable({
    responsive: true,
    language: {
      lengthMenu: "Mostrar  _MENU_  registros por página",
      zeroRecords: "No se encontraron Registros de solicitudes",
      info: "Mostrando la página _PAGE_ de _PAGES_",
      infoEmpty: "No records available",
      infoFiltered: "(Filtrado de _MAX_ registros totales)",
      search: " Buscar:",
      paginate: {
        next: "Siguiente",
        previous: "Anterior"
      }
    }
  });

  function actualizarTotal() {
    var filasVisibles = table.rows({ search: 'applied' }).count();
    var filasUnicas = table.rows({ search: 'applied' }).data().toArray().reduce(function(acc, curr) {
      if (!acc.includes(curr[0])) {
        acc.push(curr[0]);
      }
      return acc;
    }, []).length;

    // Mostrar el total solo si hay búsqueda activa o si hay resultados repetidos
    if (table.search() || filasVisibles > filasUnicas) {
      var total = 0;
      table.rows({ search: 'applied' }).every(function() {
        var precio = parseFloat($(this.node()).find('.precio-total').text().replace('$', '').replace(',', ''));
        total += isNaN(precio) ? 0 : precio;
      });
     var totalFormateado = total.toLocaleString(); // Formatear el total con separador de miles
     $('#total-row td:last-child').text('$' + totalFormateado).css({
    'color': 'white', 'font-weight': 'bold', 'text-align': 'right' // Alinear el texto a la derecha
});

    } else {
      $('#total-row td:last-child').text('').css('color', ''); // Limpiar el total si no hay búsqueda activa o si no hay resultados repetidos y restaurar el color por defecto
    }
  }

  actualizarTotal();

  table.on('draw', function() {
    actualizarTotal();
  });

  new $.fn.dataTable.FixedHeader(table);
});

</script>

</body>
</html>
