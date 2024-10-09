<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario</title>
    <link rel="stylesheet" href="../parcial/css/styles.css">
</head>
<body>
    <header>
        <h1>Concesionario de Vehículos</h1>
    </header>
    <div class="container">
        <div class="menu-box">
            <ul>
                <li><a href="#agregar-vehiculo">Grabar Vehículo</a></li>
                <li><a href="#buscar-vehiculos">Buscar Vehículos</a></li>
                <li><a href="#insertar_vehiculo">agregar vehiculo</a></li>
                <li><a href="#latest-news">Latest News</a></li>
            </ul>
        </div>
        <div class="form-container">
            <h2>Grabar Vehículo</h2>
            <form action="../parcial/php/insertar_vehiculo.php" method="POST">
                <label for="id">ID:</label>
                <input type="number" id="id" name="id" required>
            
                <label for="marca">Marca:</label>
                <input type="text" id="nombre_marca" name="marca" required>
            
                <label for="id_m">Código Marca:</label>
                <input type="number" id="cod_marca" name="id_m" required>
                
                <label for="cilindraje">Cilindraje:</label>
                <input type="text" id="cilindraje" name="cilindraje" required>
            
                <label for="traccion">Tracción:</label>
                <input type="text" id="traccion" name="traccion" required>
            
                <label for="kilometraje">Kilometraje:</label>
                <input type="number" id="kilometraje" name="kilometraje" required>
                
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" step="0.01" required>
            
                <label for="id_col">Código Color:</label>
                <input type="number" id="cod_color" name="id_col" required>
            
                <label for="color">Color:</label>
                <input type="text" id="nombre_color" name="color" required>
                
                <button type="submit">Grabar</button>
            </form>
        </div>
    </div>
</body>
</html>