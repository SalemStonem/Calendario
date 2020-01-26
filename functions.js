// Form = () => {};

console.log('funciona');


var inicio = document.getElementById('Inicio');
var fin = document.getElementById('Fin');
var select = document.getElementById('Columnas');
var form = document.getElementById('formulario');
var button = document.getElementById("Button");

button.disabled = true;


const validation = () => {

  inicio.addEventListener('change', validation);
  fin.addEventListener('change', validation);
  select.addEventListener('click', validation);
  const inicioValor = inicio.value,
  finValor = fin.value,
  selectValor = select.value;

  let mesInicio = parseInt(inicioValor.substring(0, 2));
  let yearInicio = parseInt(inicioValor.substring(3, 8));
  let mesfin = parseInt(finValor.substring(0, 2));
  let yearFin = parseInt(finValor.substring(3, 8));

  if (mesInicio > 12) {
    alert('el mes ' + mesInicio + ' no existe')
    inicio.value = "";
    inicio.style.borderColor = 'rgb(255, 0, 0)';
    button.disabled = true;
  } else {
    inicio.style.borderColor = 'rgb(0, 255, 191)';
  }

  if (mesfin > 12) {
    alert('El mes ' + mesfin + ' no existe')
    fin.value = "";
    fin.style.borderColor = 'rgb(255, 0, 0)';
    button.disabled = true;
  } else {
    fin.style.borderColor = 'rgb(0, 255, 191)';
  }

  if (yearFin >= yearInicio) {
    inicio.style.borderColor = 'rgb(0, 255, 191)';
    fin.style.borderColor = 'rgb(0, 255, 191)';
    button.disabled = false;
  } else {
    fin.style.borderColor = 'rgb(255, 0, 0)';
    button.disabled = true;
    fin.value = "";
    if (yearFin < yearInicio) {
      alert('El año ' + yearFin + ' es menor que ' + yearInicio);
    }
  }

  var data = new Object({
    inicioValor,
    finValor,
    selectValor
  })
  // console.log(inicioValor);
  // console.log(finValor);
  // console.log(selectValor);
  // console.log(Object.values(data));
  // console.log(data);


  return data;
}

button.addEventListener("click", function(){
  event.preventDefault();
  const info = validation();
  console.log(info);





  var ajax = new XMLHttpRequest()
     ajax.open("POST","validation.php",true)
     ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
     ajax.send(info)
     ajax.onreadystatechange = function(){
         if(ajax.readyState == 4 && ajax.status == 200){
             alert("Formulario enviado correctamente")
             form.reset();
             button.disabled = true;
          }
     }
}, true);
