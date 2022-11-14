//* ===============================================
//* Animate menu
//* ===============================================

$(document).ready(function () {

  $('.menu').click(function () {
    $('.movil__categorias').slideToggle(900);
  });

});

//* ===============================================
//* Change Dark /  Light
//* ===============================================

const btnDark = document.querySelector('.modo');
const btnDarkDesk = document.querySelector('.modoDesk');

btnDark.addEventListener('click', (e) =>{
  btnDark.classList.toggle('fa-moon');
  btnDark.classList.toggle('fa-sun');
  document.body.classList.toggle('dark');



  //Guardamos el modo en localstorage
  if(document.body.classList.contains('dark')){
    localStorage.setItem('dark-mode','true');
  }else{
    localStorage.setItem('dark-mode','false');
  }

});

//Obtenemos el modo actual
if(localStorage.getItem('dark-mode') === 'true'){
  document.body.classList.add('dark');
  btnDark.classList.add('fa-sun');
  btnDark.classList.remove('fa-moon');
}else{
  document.body.classList.remove('dark');
  btnDark.classList.add('fa-moon');
  btnDark.classList.remove('fa-sun');
}

//Escritorio

btnDarkDesk.addEventListener('click', (e) =>{
  btnDarkDesk.classList.toggle('fa-moon');
  btnDarkDesk.classList.toggle('fa-sun');
  document.body.classList.toggle('dark');

  //Guardamos el modo en localstorage
  if(document.body.classList.contains('dark')){
    localStorage.setItem('dark-mode','true');
  }else{
    localStorage.setItem('dark-mode','false');
  }

});

//Obtenemos el modo actual
if(localStorage.getItem('dark-mode') === 'true'){
  document.body.classList.add('dark');
  btnDarkDesk.classList.add('fa-sun');
  btnDarkDesk.classList.remove('fa-moon');
}else{
  document.body.classList.remove('dark');
  btnDarkDesk.classList.add('fa-moon');
  btnDarkDesk.classList.remove('fa-sun');
}