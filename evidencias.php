<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Proyecto integrador</title>
  <link rel="stylesheet" href="index.css" />
</head>
<body>
  <header>
    <div class="logo">AGUA PLUVIAL</div>
    <nav>
      <ul>
        <li><a href="index.html">Inicio</a></li>
        <li><a href="ventajas.html">Ventajas</a></li>
        <li><a href="desventajas.html">Desventajas</a></li>
        <li><a href="ahorro.php">Calculadora de ahorro</a></li>
        <li><a href="presupuesto.php">Materiales</a></li>
        <li><a href="mitos.html">Mitos y realidades</a></li>
        <li><a href="testimonio.php">Testimonios</a></li>
        <li><a href="evidencias.php">Evidencias</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div>
      <section id="home">
        <form method="GET" action="evidencias.php">
          <label for="opciones" class="definicion">Selecciona:</label>
          <select id="opciones" name="tipo">
            <option value="">Selecciona</option>
            <option value="fotos">Fotos</option>
            <option value="video">Video</option>
          </select>
          <button type="submit">Enviar</button>
        </form>

<?php
$directorio = '.'; // Carpeta actual
$mostrar = isset($_GET['tipo']) ? $_GET['tipo'] : '';
$filtroNombre = ['i1', 'i2', 'video']; // Palabras clave que deben aparecer en el nombre del archivo

$fotos = [];
$videos = [];

$archivos = scandir($directorio);

foreach ($archivos as $archivo) {
    if ($archivo != "." && $archivo != "..") {
        $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
        $nombreArchivo = strtolower($archivo); // Para comparación sin importar mayúsculas

        // ✅ Verificar si el nombre contiene al menos una palabra del filtro
        $coincide = false;
        foreach ($filtroNombre as $palabra) {
            if (strpos($nombreArchivo, $palabra) !== false) {
                $coincide = true;
                break;
            }
        }

        if ($coincide) {
            if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                $fotos[] = $archivo;
            } elseif (in_array($extension, ['mp4', 'webm', 'ogg', 'mov', 'avi'])) {
                $videos[] = $archivo;
            }
        }
    }
}

// Mostrar resultados según selección del usuario
if ($mostrar === 'fotos') {
    foreach ($fotos as $foto) {
        echo "<img src='$foto' alt='foto' style='max-width:300px; margin:10px;' />";
    }
} elseif ($mostrar === 'video') {
    foreach ($videos as $video) {
        echo "
        <video controls width='500' style='margin:10px;'>
          <source src='$video' type='video/mp4'>
          Tu navegador no soporta video.
        </video>";
    }
}
?>


      </section>
    </div>
  </main>
</body>
</html>
