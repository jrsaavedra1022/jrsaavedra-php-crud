<nav id="nav-bar-app" class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="?controller=gestor&action=view">PQR_APP</a>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="?controller=gestor&action=view">Lista de usuario</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?controller=gestor&action=view_register">Nuevo Usuario</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?controller=gestor&action=view_solicitudes">ver Solicitudes</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['usuario']->sur_name ." ". $_SESSION['usuario']->name  ?></a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Ver Perfil</a>
        <div role="separator" class="dropdown-divider"></div>
        <a class="dropdown-item" href="?controller=close_session&action=cerrar_session">Cerrar sesion</a>
      </div>
    </li>
  </ul>
</nav>
