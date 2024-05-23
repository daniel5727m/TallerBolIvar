<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="index3.html" class="brand-link">
        <img src='{{url("/img/1.jpg")}}' alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Taller Bolivar</span>
    </a>



    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               @foreach($menu as $id=>$menu)
          <li class="nav-item">

            @if($menu->menu_id==0)
              <p>
                {{$menu->nombre}}

              </p>
            </a>
          </li>

          @else

          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">

              <p>
                <b><i class="{{$menu->icono}}"></i>{{$menu->nombre}} </b>
                <span class="right badge badge-danger">{{$menu->orden}}</span>
              </p>
            </a>
          </li>
          @endif
          @endforeach



        </ul>
      </nav>
      <br>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

