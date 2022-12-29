<!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name"><?php echo $nombre ?></p>
          <p class="app-sidebar__user-designation"><?php echo $area ?></p>
        </div>
      </div>
      
      <!--MENU USUARIO TIPO 1-->
      <ul class="app-menu">
        
        <li>
          <a class="app-menu__item" href="inicio.php">
            <i class="app-menu__icon fa fa-home"></i>
            <span class="app-menu__label">Inicio</span>
          </a>
        </li>

        <li>
          <a class="app-menu__item" href="ingresar_sdc.php">
            <i class="app-menu__icon fa fa-cart-plus"></i>
            <span class="app-menu__label">Ingresar Solicitud</span>
          </a>
        </li>

        <li>
          <a class="app-menu__item" href="estado_sdc.php">
            <i class="app-menu__icon fa fa-check-square-o"></i>
            <span class="app-menu__label">Estado Solicitud</span>
          </a>
        </li>
      
      </ul>

    </aside>