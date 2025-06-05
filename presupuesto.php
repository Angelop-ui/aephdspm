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
    <div class="menu" id="mobile">
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
    <section id="home">
      <h1 class="que">Elige una opción</h1>
      <form id="selectorForm" onsubmit="return false;">
        <label class="radio-container">Presupuesto
  <input type="radio" name="opcion" value="presupuesto" checked>
  <span class="custom-radio"></span>
</label>

<label class="radio-container">Juego de preguntas
  <input type="radio" name="opcion" value="juego">
  <span class="custom-radio"></span>
</label>

        <button type="button" onclick="mostrarOpcion()">Continuar</button>
      </form>

      <div id="presupuestoSection" style="margin-top: 20px; display: none;">
        <h2>Presupuesto para tu propio sistema</h2>
        <form id="formPresupuesto" onsubmit="return false;">
          <table border="1" cellpadding="5" cellspacing="0">
            <tr>
              <th>¿Usar?</th>
              <th>Material</th>
              <th>Precio unitario</th>
              <th>Cantidad</th>
            </tr>
            <tbody id="tablaMateriales"></tbody>
            <tr>
              <td colspan="4" style="text-align: center;">
                <button type="button" onclick="calcularTotal()" class="button">Calcular</button>
                <button type="button" onclick="borrarTodo()" class="button">Borrar</button>
              </td>
            </tr>
          </table>
        </form>
        <div id="resultado" style="text-align: center; margin-top: 20px;"></div>
      </div>
    </section>
  </main>

  <script>
    const precios = {
      "codo": 50,
      "tubo": 350,
      "bidon": 5000,
      "canaleta": 900,
      "soporte": 50,
      "remaches": 2,
      "tornillos": 1,
      "sellador": 100
    };

    const materiales = {
      "codo": "Codo de 90º",
      "tubo": "Tubo de PVC 1/2",
      "bidon": "Bidón(1100 litros)",
      "canaleta": "Canaleta (calibre 20)",
      "soporte": "Soporte para canaleta",
      "remaches": "Remaches (3,2 pulgadas)",
      "tornillos": "Tornillos (1 pulgada)",
      "sellador": "Sellador"
    };

    const tabla = document.getElementById("tablaMateriales");

    for (const key in materiales) {
      const fila = document.createElement("tr");
      fila.innerHTML = `
        <td><input type="checkbox" class="usar" data-key="${key}"></td>
        <td>${materiales[key]}</td>
        <td>$${precios[key]}</td>
        <td><input type="number" class="cantidad" data-key="${key}" step="1" min="0"></td>
      `;
      tabla.appendChild(fila);
    }

    function calcularTotal() {
      const checkboxes = document.querySelectorAll(".usar");
      let total = 0;

      checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
          const key = checkbox.dataset.key;
          const cantidad = parseFloat(document.querySelector(`.cantidad[data-key="${key}"]`).value) || 0;
          total += precios[key] * cantidad;
        }
      });

      document.getElementById("resultado").innerHTML = `
        <p><strong>Total: $${total.toFixed(2)}</strong></p>
        <img src="fi.jpg" alt="Imagen" style="max-width: 300px;">
      `;
    }

    function borrarTodo() {
      document.querySelectorAll(".usar").forEach(c => c.checked = false);
      document.querySelectorAll(".cantidad").forEach(c => c.value = "");
      document.getElementById("resultado").innerHTML = "";
    }

    function mostrarOpcion() {
      const opcion = document.querySelector('input[name="opcion"]:checked');
      const presupuestoDiv = document.getElementById("presupuestoSection");

      if (!opcion) return;

      if (opcion.value === "presupuesto") {
        presupuestoDiv.style.display = "block";
      } else if (opcion.value === "juego") {
        window.location.href = "preguntas.html";
      }
    }
  </script>

  <script>
    const menumobile = document.getElementById("mobile");
    const navbar = document.getElementById("navbar");
    menumobile.addEventListener('click', () => {
      navbar.classList.toggle('active');
    });
  </script>
</body>
</html>
