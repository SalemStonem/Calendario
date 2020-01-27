<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv='cache-control' content='no-cache'>
  <meta http-equiv='expires' content='0'>
  <meta http-equiv='pragma' content='no-cache'>
  <link rel="stylesheet" href="css/master.css">
  <title>M22 Ricardo Cáceres</title>
</head>
<body>
<div class="container-fluit text-center">
  <form method="POST" id="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <fieldset class="form-group">
      <label class="label" for="Inicio">Fecha de Inicio</label> <br> <br>
      <input type="text" class="form-control" onchange="validation()" min="0000000" name="inicio" id="Inicio" maxlength="7" required pattern="([0-1][0-9]?)+-([0-9]{4})" value="" placeholder="MM-YYYY">
    </fieldset>
    <fieldset class="form-group">
      <label class="label" for="Fin">Fecha Final</label> <br> <br>
      <input type="text" class="form-control" onchange="validation()" min="0000000" name="fin" id="Fin" maxlength="7" required pattern="([0-1][0-9]?)+-([0-9]{4})" value="" placeholder="MM-YYYY">
    </fieldset>
    <fieldset class="form-group">
      <label class="label" for="Columnas">Columnas:</label> <br> <br>
      <select name="columna" class="" id="Columnas">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
      </select>
    </fieldset>

    <button type="submit" id="Button" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<div class="d-flex">
<?php
require ("validation.php");
?>
</div>

<script src="functions.js?n=0" charset="utf-8"></script>
</body>
</html>
