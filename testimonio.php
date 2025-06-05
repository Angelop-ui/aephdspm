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
                <h1 class="que">¿Que quieres hacer?</h1>
                <form method="post">
                    <input type="submit" name="ver" value="leer" class="button">
                    <input type="submit" name="escribir" value="escribir" class="button">
                </form>
                 <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["escribir"])) {
                echo '
                <form method="post">
                    <textarea name="comentario" rows="5" cols="50" placeholder="Escribe tu comentario aquí..."></textarea><br>
                    <!-- Botón "Enviar" con animación -->
<button class="boton-flecha">
  <div class="svg-wrapper-1">
    <div class="svg-wrapper">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        width="24"
        height="24"
      >
        <path fill="none" d="M0 0h24v24H0z"></path>
        <path
          fill="currentColor"
          d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"
        ></path>
      </svg>
    </div>
  </div>
  <span>Enviar</span>
</button>
                </form>
                ';
            }

            // Guardar el comentario en un archivo si se envía
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["guardar"])) {
                $comentario = htmlspecialchars($_POST["comentario"]);
                file_put_contents("comentarios.txt", $comentario . "\n\n", FILE_APPEND);
                echo "<p>✅ ¡Comentario guardado!</p>";
            }

            // Leer comentarios si se presionó "ver"
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["ver"])) {
                if (file_exists("comentarios.txt")) {
                    $comentarios = file_get_contents("comentarios.txt");
                    echo "<h3>Comentarios guardados:</h3><pre class='comentarios'>$comentarios</pre>";

                } else {
                    echo "<p>No hay comentarios aún.</p>";
                }
            }
            ?>
            </section>
            <img src="tes.jpg" alt="" width="300" height="200">
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