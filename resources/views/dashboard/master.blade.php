<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Jet - Админ-панель
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="/assets/dashboard/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/assets/dashboard/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/assets/dashboard/demo/demo.css" rel="stylesheet" />
  <!-- Datatables -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="/dashboard" class="simple-text logo-mini">
          JET
        </a>
        <a href="/dashboard" class="simple-text logo-normal">
          Админ-панель
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ 'dashboard' == request()->path() ? 'active' : ''}}">
            <a href="/dashboard/reservations">
              <i class="now-ui-icons design_app"></i>
              <p>Главная</p>
            </a>
          </li>
          
          <li class="{{ 'dashboard/reservations' == request()->path() ? 'active' : ''}}">
            <a href="/dashboard/reservations">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Заявки на бронь</p>
            </a>
          </li>
          <li class="{{ 'dashboard/requests' == request()->path() ? 'active' : ''}}">
            <a href="/dashboard/requests">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Управление заявками</p>
            </a>
          </li>
          <li class="{{ 'dashboard/users' == request()->path() ? 'active' : ''}}">
            <a href="/dashboard/users">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Пользователи</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Панель управление</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="navbar-nav">
             
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>            
              </li>
              <li class="nav-item">
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    

                                    
                                    </form>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
    @yield('content')
    <footer class="footer">
        <div class=" container-fluid ">
          
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, All right reserved.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="/assets/dashboard/js/core/jquery.min.js"></script>
  <script src="/assets/dashboard/js/core/popper.min.js"></script>
  <script src="/assets/dashboard/js/core/bootstrap.min.js"></script>
  <script src="/assets/dashboard/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Datatables-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

  <!-- Chart JS -->
  <script src="/assets/dashboard/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="/assets/dashboard/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/dashboard/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>

  <script type="text/javascript">
  $(function () {
      
    var table = $('#reservations').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "/dashboard/reservations",
          data: function (d) {
                d.status = $('#reserve-status').val(),
                d.search = $('input[type="search"]').val()
            }
        },
        columns: [
            {data: 'id', name: 'id',
            "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
            $(nTd).html("<a href='/dashboard/reservation/"+oData.id+"'>"+oData.id+"</a>");}
            },
            {data: 'name', name: 'name'}, 
            {data: 'phone', name: 'phone'},
            {data: 'count_place', name: 'place'},
            {data: 'comment', name: 'comment'},
            {data: 'flight_id', name: 'flight',
          "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
            $(nTd).html("<a href='/dashboard/reservation/"+oData.id+"'>"+oData.flight_id+"</a>");}
            },
            {data: 'departure_city', name: 'departure'},
            {data: 'arrival_city', name: 'arrival'},
            {data: 'departure_date', name: 'date'},  
            {data: 'flight_duration', name: 'duration'},
            {data: 'plane', name: 'plane'},
            {data: 'status', name: 'status'},
        ]
    });
  
    $('#reserve-status').change(function(){
        table.draw();
    });
      
  });

 $(function () {
  var requestsTable = $('#requests-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "/dashboard/requests",
          data: function (d) {
                d.status = $('#request-status').val(),
                d.search = $('input[type="search"]').val()
            }
        },
        columns: [
            {data: 'id', name: 'id',
            "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
            $(nTd).html("<a href='/dashboard/requests/"+oData.id+"'>"+oData.id+"</a>");}
            },
            {data: 'name', name: 'name'}, 
            {data: 'phone', name: 'phone'},
            {data: 'email', name: 'email'},
            {data: 'departure_city', name: 'departure'},
            {data: 'arrival_city', name: 'arrival'},
            {data: 'departure_date', name: 'departure_date'},
            {data: 'arrival_date', name: 'arrival_date'},  
            {data: 'count_place', name: 'place'},
            {data: 'result_comment', name: 'comment'},
            {data: 'status', name: 'status'},
        ]
    });
  
    $('#request-status').change(function(){
        requestsTable.draw();
    });

      });
</script>
</body>

</html>