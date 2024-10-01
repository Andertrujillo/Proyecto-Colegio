<?php
// Iniciar sesión (opcional)
session_start();

// Habilitar informes de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configura la URL de retorno y cancelación
$returnUrl = "http://tusitio.com/pago-confirmado.html";
$cancelReturnUrl = "http://tusitio.com/pago-cancelado.html";
$amount = 147000; // Monto del pago en COP

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Redirigir a PayPal
    header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=WPED32B3NQ9U4&item_name=Pago de matrícula&amount=$amount&currency_code=COP&return=$returnUrl&cancel_return=$cancelReturnUrl");
    exit; // Termina el script después de redirigir
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<title>Pagos</title>
</head>
<body>

<div class="formulario">
	<a class="volver" href="index.html">Volver</a>

	<h1>Pagos</h1>

	<!-- Formulario que redirige a PayPal -->
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<!-- Configuraciones de PayPal -->
		<input type="hidden" name="cmd" value="_xclick">
		<input type="hidden" name="business" value="WPED32B3NQ9U4"> <!-- Tu ID de PayPal -->
		<input type="hidden" name="item_name" value="Pago de matrícula">
		<input type="hidden" name="currency_code" value="USD">
		<input type="hidden" name="amount" value="10.00"> <!-- Monto del pago -->
		<input type="hidden" name="return" value="http://tusitio.com/pago-completado.html"> <!-- URL de retorno después del pago -->
		<input type="hidden" name="cancel_return" value="http://tusitio.com/pago-cancelado.html"> <!-- URL de retorno si el pago es cancelado -->
		
		<!-- Botón de pago -->
		<input type="submit" value="Realizar pago">
	</form>

</div>

</body>
</html>
