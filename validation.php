<?php

// class AjaxValidacion {
// public $inicioValor;
// public function AjaxValidacion(){
//   $inicioValor = $this -> inicioValor;
//
// }
//
// }


if (isset($_POST) && isset($_POST['inicioValor']) && isset($_POST['finValor']) && isset($_POST['selectValor'])) {
  $inicial = $_POST['inicioValor'];
  $inicial = $_POST['finValor'];
  $inicial = $_POST['selectValor'];

  

  var_dump($inicial);
  echo $inicial;


}else {
  $valioverga = 'Faltan campos por enviar';
  echo $valioverga;

};


// require 'index.php';
?>
