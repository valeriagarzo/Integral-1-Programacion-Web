<?php
session_start(); 

if(!isset($_SESSION['id'])){ //teni sesion iniciada?
    header("Location: index.php");
}
?>
    
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de administracion - rifa UPLA</title>
<!--weas visuales q le copie al profe, dps lo cambiamos-->
    <style>
  .menu-opciones {
    max-width: 900px;
    margin: 30px auto;
    padding: 24px;
    background: #f5f5f5;
    border-radius: 16px;
    font-family: Arial, sans-serif;
    box-shadow: 0 4px 15px rgba(0,0,0,.10);
  }

  .menu-opciones h2 {
    margin: 0 0 20px;
    color: #222;
    text-align: center;
  }

  .botones {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    justify-content: center;
  }

  .boton-menu {
    display: inline-block;
    padding: 12px 22px;
    border-radius: 8px;
    background: #1976d2;
    color: white;
    text-decoration: none;
    font-weight: bold;
    transition: .2s;
  }

  .boton-menu:hover {
    background: #0d47a1;
    transform: translateY(-2px);
  } 
  .boton-salir {
      background: #d32f2f;
  }
  .boton-salir:hover {
      background: #c62828; 
  }
  </style>
</head>
<body>
<!--aqui ya lo q REALMENTE se ve-->
    <h1 style="text-align: center;">¡Acceso concedido, <?php echo htmlspecialchars($_SESSION['usuario']); ?> </h1>

<div class="menu-opciones">
  <h2>Participantes</h2>

    <!--boton pa ir a la pag de reserva de num de rifa-->

  <div class="botones">
    <a class="boton-menu"
       href="registrar_participantes.php"
       target="_self"
       rel="noopener noreferrer">
      Registrar Participantes
    </a>
    <!--boton pa ir a la pag de busqueda-->
    <a class="boton-menu"
       href="buscar.php"
       target="_self"
       rel="noopener noreferrer">
      Buscar participantes
    </a>
    <!--boton pa ir a la wea de subir archivos-->
    <a class="boton-menu"
       href="actualizar_participantes.php"
       target="_self"
       rel="noopener noreferrer">
      Actualizar Participantes
    </a>

    <!--boton cerrar sesion-->
    <a class="boton-menu"
       href="eliminar_participante.php"
       rel="noopener noreferrer">
      Eliminar Participantes
    </a>

    <a class="boton-menu"
       href="listar_participantes.php"
       target="_self"
       rel="noopener noreferrer">
      Listar Participantes
    </a>
  </div>
</div>

<div class="menu-opciones">
  <h2>Datos de Rifa</h2>

    <!--boton pa ir a la pag de reserva de num de rifa-->

  <div class="botones">
    <a class="boton-menu"
       href="rifa.php"
       target="_self"
       rel="noopener noreferrer">
      Reservar Numero
    </a>
    <!--boton pa ir a la pag de busqueda-->
    <a class="boton-menu"
       href="listar_premios.php"
       target="_self"
       rel="noopener noreferrer">
      Lista de premios
    </a>
    <!--boton pa ir a la wea de subir archivos-->
    <a class="boton-menu"
       href="subir-comprobante.php"
       target="_self"
       rel="noopener noreferrer">
      Subir Comprobante
    </a>

    <!--boton cerrar sesion-->
    <a class="boton-menu"
       href="archivos.php"
       rel="noopener noreferrer">
      Historial Comprobantes
    </a>
  </div>
  
</div>


<div class="botones">
  <!--boton cerrar sesion-->
  <a class="boton-menu"
      href="salir.php"
      rel="noopener noreferrer">
    Cerrar Sesión
  </a>
</div>



</html>
