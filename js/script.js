/* menu icon navbar*/
let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menuIcon.onclick = () => {
  menuIcon.classList.toggle('bx-x');
  navbar.classList.toggle('active');
};

/* active links */
let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');

window.onscroll = () => {
  sections.forEach(sec => {
    let top = window.scrollY;
    let offset = sec.offsetTop -150;
    let height = sec.offsetHeight;
    let id = sec.getAttribute('id');

    if(top >= offset && top < offset + height) {
      navLinks.forEach(links => {
        links.classList.remove('active');
        document.querySelector('header nav a[href*=' + id +']').classList.add('active');
      });
    };
  });


/* styck navbar */
let header = document.querySelector('.header');

header.classList.toggle('sticky', window.scrollY > 100);

/* remover menu */
menuIcon.classList.remove('bx-x');
navbar.classList.remove('active');
};

/*Swiper*/

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 50,
    loop: true,
    grabCursor: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});

/* Modal */

function abrirModal(){
  const modal = document.getElementById('janela-modal')
  modal.classList.add('abrir')

  modal.addEventListener('click', (e) => {
      if(e.target.id == 'fechar' || e.target.id == 'janela-modal'){
          modal.classList.remove('abrir')
      }
  })
};

function abrirModal2(){
  const modal = document.getElementById('janela-modal2')
  modal.classList.add('abrir')

  modal.addEventListener('click', (e) => {
      if(e.target.id == 'fechar' || e.target.id == 'janela-modal2'){
          modal.classList.remove('abrir')
      }
  })
};

function abrirModal3(){
  const modal = document.getElementById('janela-modal3')
  modal.classList.add('abrir')

  modal.addEventListener('click', (e) => {
      if(e.target.id == 'fechar' || e.target.id == 'janela-modal3'){
          modal.classList.remove('abrir')
      }
  })
};


/* Modo Dark & Light */

let darkModeIcon = document.querySelector('#darkMode-icon');

darkModeIcon.onclick = () => {
  darkModeIcon.classList.toggle('bx-sun');
  document.body.classList.toggle('dark-mode');

  if(imgName.src.match("off")){
    imgName.src = "images/logo.png";
  } else {(imgName.src.match("on"))
    imgName.src = "images/logo.png";
  }
};


ScrollReveal({ 
  reset: true,
  distance: '80px',
  duretion: 2000,
  delay: 200
});

ScrollReveal().reveal('.home-content, .heading', { origin: 'top' });
ScrollReveal().reveal('.home-img img, .services-container, .portofolio-box, .testimonial-wrapper, .contact form', { origin: 'bottom' });
ScrollReveal().reveal('.home-content h1, .about-img img', { origin: 'left' });
ScrollReveal().reveal('.home-content h3, .home-content p, .about-content', { origin: 'right' });

// MASCARA CPF
function maskCPF(i) {
  var v = i.value;
  if (isNaN(v[v.length - 1])) { // impede entrar outro caractere que não seja número
    i.value = v.substring(0, v.length - 1);
    return;
  }

  i.setAttribute("maxlength", "14");
  if (v.length == 3 || v.length == 7) i.value += ".";
  if (v.length == 11) i.value += "-";

}

// SENHA FORTE

function validarSenhaForca(){
  var senha = document.getElementById('senhaForca').value;
  var forca = 0;

  //  document.getElementById("impSenha").innerHTML = "Senha " + senha;

   if((senha.length >=4) && (senha.length <=7)){
    forca +=10;
   }else if(senha.length > 7){
    forca += 25;
   }

  if((senha.length >= 5) && (senha.match(/[a-z]+/))){
    forca += 10;
  }  

  if((senha.length >= 6) && (senha.match(/[A-Z]+/))){
    forca += 20;
  }  

  if((senha.length >= 7) && (senha.match(/[@#$%&;*]+/))){
    forca += 25;
  }  

   mostrarForca(forca);
}

function mostrarForca(forca){
    // document.getElementById("impForcaSenha").innerHTML = "Forca " + forca;
  if(forca < 30){
    document.getElementById("erroSenhaFraca").innerHTML = '<div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> <div class="progress-bar bg-danger" style="width: 25%"></div>  </div>';
  }else if((forca >= 30) && (forca < 50)){
      document.getElementById("erroSenhaFraca").innerHTML = '<div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">    <div class="progress-bar bg-warning" style="width: 50%"></div> </div>';
  }else if((forca >= 50) && (forca < 70)){
    document.getElementById("erroSenhaFraca").innerHTML = '<div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"> <div class="progress-bar bg-info" style="width: 75%"></div></div>';
}else if((forca >= 70) && (forca < 100)){
  document.getElementById("erroSenhaFraca").innerHTML = '<div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"> <div class="progress-bar bg-success" style="width: 100%"></div></div>';
}
}

// Login efeitos de transição
const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
const sign_in_btn2 = document.querySelector("#sign-in-btn2");
const sign_up_btn2 = document.querySelector("#sign-up-btn2");
sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});
sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
});
sign_up_btn2.addEventListener("click", () => {
    container.classList.add("sign-up-mode2");
});
sign_in_btn2.addEventListener("click", () => {
    container.classList.remove("sign-up-mode2");
});