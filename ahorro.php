<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto integrador</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <div class="logo">AGUA PLUVIAL</div>
    <div class="menu" id="mobile">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    <nav class="navbar" id="navbar">
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
        <sector>
            <section id="home">
                <h1 class="que">Ahorro de agua potable</h1>
                <form method="post">
                  Precipitacion Promedio: <input type="text" name="preci"><br>
                  Area del techo (metros cuadrados): <input type="text" name="area"><br>
                  <input type="submit" value="Calcular" class="button">
                </form>
            </section>
            <?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["preci"]) && !empty($_POST["area"])) {
        $precipitacion = floatval($_POST["preci"]);
        $area = floatval($_POST["area"]);
        $total = $area * $precipitacion * 0.85;
        echo("Recolectarás una cantidad de: $total litros en un año");
    } else {
        echo "Por favor, llena todos los campos.";
    }
}
?><br>
            <img src="hawa.jpg" alt="" width="300" height="200">
        </sector>
    </main>
    
    <script>
        const menumobile = document.getElementById("mobile");
        const navbar = document.getElementById("navbar");
        menumobile.addEventListener('click', () =>{
            navbar.classList.toggle('active');
            menumobile.addEventListener("click", function () {
                menu.classList.toggle("active");
            });
        });
    </script>
</body>
</html>