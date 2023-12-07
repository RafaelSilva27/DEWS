<?php
session_start();
function obtenerCartaAleatoria() {
    $palos = array("c", "d", "p", "t");
    $paloSeleccionado = array_rand($palos);
    $palo = $palos[$paloSeleccionado];

    $numero = rand(1, 10);

    return $palo . $numero;
}

$_SESSION['jugadorA'] = obtenerCartaAleatoria();
$_SESSION['jugadorB'] = obtenerCartaAleatoria();

header("Location: index.php");
exit();
?>
