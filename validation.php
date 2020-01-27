<?php
include "Log.class.php";


if (isset($_POST['inicio']) && isset($_POST['fin']) && isset($_POST['columna'])) {
  $inicial = $_POST['inicio'];
  $final = $_POST['fin'];
  $columnas = $_POST['columna'];

  // var_dump($columnas);

  $fecha_inicial = DateTime::createFromFormat('m-Y', $inicial);
  // echo $fecha_inicial->format('M-Y');

  $fecha_final = DateTime::createFromFormat('m-Y', $final);

  $log = new Log("log", "access_log/");

  $log->insert(false, $inicial, $final, false, false, false);


  // echo $fecha_final->format('M-Y');
  // var_dump($fecha_inicial);
  $month_inicio = $fecha_inicial->format('m');
  $year_inicio = $fecha_inicial->format('Y');
  $month_final = $fecha_final->format('m');
  $year_final = $fecha_final->format('Y');

  switch ($columnas) {
    case '1':
    $columna = "<div class='p-1 fluit'>";
    break;
    case '2':
    $columna = "<div class='p-2 fluit'>";
    break;
    case '3':
    $columna = "<div class='p-3 fluit'>";
    break;
    case '4':
    $columna = "<div class='p-4 fluit'>";
    break;
    case '5':
    $columna = "<div class='p-5 fluit'>";
    break;
    case '6':
    $columna = "<div class='p-6 fluit'>";
    break;
    case '7':
    $columna = "<div class='p-7 fluit'>";
    break;
    case '8':
    $columna = "<div class='p-8 fluit'>";
    break;
    case '9':
    $columna = "<div class='p-9 fluit'>";
    break;
    case '10':
    $columna = "<div class='p-10 fluit'>";
    break;

    default:

      break;
  }



/////////////////////////////////////-----------------------------MES DE INICIO---------------/////////////////////////////////////////

  $semana = array ("Mon","Tue", "Wed", "Thu","Fri","Sat","Sun");
  echo $columna;
  echo "<table class='m-auto'>";
  echo "<thead>";
  echo "<tr>";
  echo "<th colspan='7'>",$fecha_inicial->format('M-Y'),"</th>";
  echo "</tr>";
  echo "<tr>";
  echo "<th>Lu</th><th>Ma</th><th>Mi</th><th>Ju</th><th>Vi</th><th>Sa</th><th>Do</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
//// MARCO EL DÍA 1º DEL MES:  ////////////////////
  echo "<tr>";
  for ($i=0;$i<=6;$i++){
    if (date("D",mktime(0,0,0,$month_inicio,1,$year_inicio))==$semana[$i]){
        echo "<td>", date("d", mktime(0,0,0,$month_inicio,1,$year_inicio)) ,"</td>";
            if ( date("D",mktime(0,0,0,$month_inicio,1,$year_inicio))=="Sun" ){
                echo "</tr>","<tr>";
                break;
            }else{
                break;
            }
        break;
    }else{
        echo  "<td>", "</td>"  ;
    }
  }

/////////marco los días subsiguientes////////////////////
  for ($j=2;$j<=date("t");$j++){
    if ( date("D",mktime(0,0,0,$month_inicio,$j,$year_inicio))=="Sun" )  {
        echo      "<td>",   date("d", mktime(0,0,0,$month_inicio,$j,$year_inicio)), "</td >", "</tr>", "<tr>";
    }else{
        echo      "<td>",   date("d", mktime(0,0,0,$month_inicio,$j,$year_inicio)) ,  "</td>" ;
    }
}
  echo "</tr>";
  echo "</tbody>";
  echo "</table>";
  echo "</div>";

/////////////////////////////////////////////////--------MESES INTERMEDIOS----------////////////////////////////////////////////////////////////////77

  $start_date = $fecha_inicial;
  $end_date = $fecha_final;

  $period = new DatePeriod(
        $start_date,
        new DateInterval('P1M'),
        $end_date,
        DatePeriod::EXCLUDE_START_DATE
      );

      foreach($period as $date) {
        // echo $date->format('m-Y').'<br/>'; // Display the dates in yyyy-mm-dd format

        $semana = array ("Mon","Tue", "Wed", "Thu","Fri","Sat","Sun");
        echo $columna;
        echo "<table class='m-auto'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th colspan='7'>",$date->format('M-Y'),"</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Lu</th><th>Ma</th><th>Mi</th><th>Ju</th><th>Vi</th><th>Sa</th><th>Do</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
      //// MARCO EL DÍA 1º DEL MES:  ////////////////////
        echo "<tr>";
        for ($i=0;$i<=6;$i++){
          if (date("D",mktime(0,0,0,$date->format('m'),1,$date->format('Y')))==$semana[$i]){
              echo "<td>", date("d", mktime(0,0,0,$date->format('m'),1,$date->format('Y'))) ,"</td>";
                  if ( date("D",mktime(0,0,0,$date->format('m'),1,$date->format('Y')))=="Sun" ){
                      echo "</tr>","<tr>";
                      break;
                  }else{
                      break;
                  }
              break;
          }else{
              echo  "<td>", "</td>"  ;
          }
        }

      /////////marco los días subsiguientes////////////////////
        for ($j=2;$j<=date("t");$j++){
          if ( date("D",mktime(0,0,0,$date->format('m'),$j,$date->format('Y')))=="Sun" )  {
              echo      "<td>",   date("d", mktime(0,0,0,$date->format('m'),$j,$date->format('Y'))), "</td >", "</tr>", "<tr>";
          }else{
              echo      "<td>",   date("d", mktime(0,0,0,$date->format('m'),$j,$date->format('Y'))) ,  "</td>" ;
          }
      }
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
      }

/////////////////////////////////////////////////--------MES FINAL----------////////////////////////////////////////////////////////////////77
echo $columna;
echo "<table class='m-auto'>";
echo "<thead>";
echo "<tr>";
echo "<th colspan='7'>",$fecha_final->format('M-Y'),"</th>";
echo "</tr>";
echo "<tr>";
echo "<th>Lu</th><th>Ma</th><th>Mi</th><th>Ju</th><th>Vi</th><th>Sa</th><th>Do</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
//// MARCO EL DÍA 1º DEL MES:  ////////////////////
echo "<tr>";
for ($i=0;$i<=6;$i++){
  if (date("D",mktime(0,0,0,$month_final,1,$year_final))==$semana[$i]){
      echo "<td>", date("d", mktime(0,0,0,$month_final,1,$year_final)) ,"</td>";
          if ( date("D",mktime(0,0,0,$month_final,1,$year_final))=="Sun" ){
              echo "</tr>","<tr>";
              break;
          }else{
              break;
          }
      break;
  }else{
      echo  "<td>", "</td>"  ;
  }
}

/////////marco los días subsiguientes////////////////////
for ($j=2;$j<=date("t");$j++){
  if ( date("D",mktime(0,0,0,$month_final,$j,$year_final))=="Sun" )  {
      echo      "<td>",   date("d", mktime(0,0,0,$month_final,$j,$year_final)), "</td >", "</tr>", "<tr>";
  }else{
      echo      "<td>",   date("d", mktime(0,0,0,$month_final,$j,$year_final)) ,  "</td>" ;
  }
}
echo "</tr>";
echo "</tbody>";
echo "</table>";
echo "</div>";


}else {
  // $valio = 'Faltan campos por enviar';
  // echo $valio;

};


// require 'index.php';
?>
