
<?php
session_start(); 

if(!isset($_SESSION['usuario'])){ //oe teni la sesion iniciada o nao
    header("Location: index.php");
    exit();
}

if(!isset($_SESSION['cantidad de numeros'])) {
    $_SESSION['cantidad de numeros'] = 0;
}
$precio_unitario = 2000;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accion'])) {
        if ($_POST['accion'] === 'sumar') {
            $_SESSION['cantidad_numeros']++;
        } elseif ($_POST['accion'] === 'restar') {
            //evita los numeros negativos
            if ($_SESSION['cantidad_numeros'] < 0) {
                $_SESSION['cantidad_numeros']--;
            }
        }
    }
}

$total_pagar = $_SESSION['cantidad_numeros'] * $precio_unitario;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reserva de Rifa - UPLA</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h2 { color: #333; text-align: center; }
        .info { font-size: 18px; margin: 20px 0; line-height: 1.6; }
        .botones-accion { display: flex; gap: 15px; margin-top: 20px; }
        button { padding: 12px 24px; font-size: 16px; font-weight: bold; border: none; border-radius: 6px; cursor: pointer; color: white; }
        .btn-sumar { background: #2e7d32; }
        .btn-sumar:hover { background: #1b5e20; }
        .btn-restar { background: #c62828; }
        .btn-restar:hover { background: #b71c1c; }
        .volver { display: inline-block; margin-top: 25px; text-decoration: none; color: #1976d2; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reserva de Números de Rifa</h2>
        
        <div class="info">
            <p>Precio por número: <strong>$<?php echo number_format($precio_unitario, 0, ',', '.'); ?></strong></p>
            <p>Cantidad de números reservados: <strong><?php echo $_SESSION['cantidad_numeros']; ?></strong></p>
            <p>Total a pagar: <strong>$<?php echo number_format($total_pagar, 0, ',', '.'); ?></strong></p>
        </div>

        <!--utiliza el método POST para sumar o restar -->
        <form method="POST" action="">
            <div class="botones-accion">
                <button type="submit" name="accion" value="sumar" class="btn-sumar">+ Agregar Número</button>
                <button type="submit" name="accion" value="restar" class="btn-restar">- Quitar Número</button>
            </div>
        </form>

        <br>
        <a href="panel.php" class="volver">← Volver al Menú Principal</a>
    </div>
</body>
</html>
