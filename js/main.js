let list = document.querySelectorAll(".navigation li");

function activeLick() {
    list.forEach((item) => {
        item.classList.remove("hovered");
    });
    this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLick));

//Menu Toggle//
/*
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function() {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
};
*/

/* Modo Dark & Light */
let darkModeIcon = document.querySelector('#darkMode-icon');

darkModeIcon.onclick = () => {
  darkModeIcon.classList.toggle('bx-sun');
  document.body.classList.toggle('dark-mode');

  if(imgName.src.match("off")){
    imgName.src = "images/logo1.png";
  } else {(imgName.src.match("on"))
    imgName.src = "images/logo2.png";
  }
};

/* Modal One FormUser*/

function abrirModal(){
  const modal = document.getElementById('janela-modal')
  modal.classList.add('abrir')

  modal.addEventListener('click', (e) => {
      if(e.target.id == 'fechar' || e.target.id == 'janela-modal'){
          modal.classList.remove('abrir')
      }
  })
};

/* Modal Two FormDenuncias*/

function abrirModal2(){
  const modal = document.getElementById('janela-modal2')
  modal.classList.add('abrir')

  modal.addEventListener('click', (e) => {
      if(e.target.id == 'fechar' || e.target.id == 'janela-modal2'){
          modal.classList.remove('abrir')
      }
  })
};

/* Modal Three FormLivro*/

function abrirModal3(){
  const modal = document.getElementById('janela-modal3')
  modal.classList.add('abrir')

  modal.addEventListener('click', (e) => {
      if(e.target.id == 'fechar' || e.target.id == 'janela-modal3'){
          modal.classList.remove('abrir')
      }
  })
};

/* Modal Four FormBloqueados*/

function abrirModal4(){
  const modal = document.getElementById('janela-modal4')
  modal.classList.add('abrir')

  modal.addEventListener('click', (e) => {
      if(e.target.id == 'fechar' || e.target.id == 'janela-modal4'){
          modal.classList.remove('abrir')
      }
  })
};

/* Modal Five Galeria-Denúncia*/

function abrirModal5(){
  const modal = document.getElementById('janela-modal5')
  modal.classList.add('abrir')

  modal.addEventListener('click', (e) => {
      if(e.target.id == 'fechar' || e.target.id == 'janela-modal5'){
          modal.classList.remove('abrir')
      }
  })
};

/* Modal Six FormDenúncia*/

function abrirModal6(){
  const modal = document.getElementById('janela-modal6')
  modal.classList.add('abrir')

  modal.addEventListener('click', (e) => {
      if(e.target.id == 'fechar' || e.target.id == 'janela-modal6'){
          modal.classList.remove('abrir')
      }
  })
};

/* Modal Seven Galeria-Comentario*/

function abrirModal7(){
  const modal = document.getElementById('janela-modal7')
  modal.classList.add('abrir')

  modal.addEventListener('click', (e) => {
      if(e.target.id == 'fechar' || e.target.id == 'janela-modal7'){
          modal.classList.remove('abrir')
      }
  })
};

/* Modal Eight LoginUser*/

function abrirModal8(){
  const modal = document.getElementById('janela-modal8')
  modal.classList.add('abrir')

  modal.addEventListener('click', (e) => {
      if(e.target.id == 'fechar' || e.target.id == 'janela-modal8'){
          modal.classList.remove('abrir')
      }
  })
};

/* Modal eleven verificarEmail*/

function abrirModal11(){
  const modal = document.getElementById('janela-modal11')
  modal.classList.add('abrir')

  modal.addEventListener('click', (e) => {
      if(e.target.id == 'fechar' || e.target.id == 'janela-modal11'){
          modal.classList.remove('abrir')
      }
  })
};

/* Modal 12 verificarEmail*/

function abrirModal12(){
  const modal = document.getElementById('janela-modal12')
  modal.classList.add('abrir')

  modal.addEventListener('click', (e) => {
      if(e.target.id == 'fechar' || e.target.id == 'janela-modal12'){
          modal.classList.remove('abrir')
      }
  })
};

/* Modal 13 verificarEmail*/

function abrirModal13(){
  const modal = document.getElementById('janela-modal13')
  modal.classList.add('abrir')

  modal.addEventListener('click', (e) => {
      if(e.target.id == 'fechar' || e.target.id == 'janela-modal13'){
          modal.classList.remove('abrir')
      }
  })
};

let ativa= false;
function abrirComment(){
  ativa=!ativa;
  if(ativa){
    document.getElementById('caixa-comentario').style.display='block';
  }else{
    document.getElementById('caixa-comentario').style.display='none';
  }
  
}

