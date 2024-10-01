<?php
// API key de RapiWha
$apiKey = 'W08Y30Q08O4KMBMQ0YAE';

$numero_destino = $_POST['telefono'];


$estado = $_POST['estado'];
if ($estado === 'aprobado') {
    $mensaje = 'Matriculas Colegio Nuestra Señora De la Paz.
    El estudiante fue aprobado para la matricula,por favor realizar el pago';
} elseif ($estado === 'rechazado') {
    $mensaje = 'Su solicitud ha sido denegada. Por favor, entrar en contacto con el colegio.';
} else {
    die("Estado no válido.");
}

// URL de la API de RapiWha
$url = 'https://panel.rapiwha.com/send_message.php';

// Configurar los datos de la petición
$datos = [
    'apikey' => $apiKey,
    'number' => $numero_destino,
    'text' => $mensaje,
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);


$respuesta = curl_exec($ch);

curl_close($ch);

echo $respuesta;
?>
