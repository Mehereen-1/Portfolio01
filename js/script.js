// js/script.js
(function(){
  const burger = document.querySelector('.hamburger');
  const nav = document.querySelector('.nav');

  if (burger && nav) {
    burger.addEventListener('click', () => {
      const isOpen = nav.classList.toggle('open');
      burger.setAttribute('aria-expanded', String(isOpen));
      // swap icon
      burger.innerHTML = isOpen ? "<i class='bx bx-x'></i>" : "<i class='bx bx-menu'></i>";
    });

    // close on escape
    document.addEventListener('keydown', (e)=>{
      if(e.key === 'Escape' && nav.classList.contains('open')){
        nav.classList.remove('open');
        burger.setAttribute('aria-expanded', 'false');
        burger.innerHTML = "<i class='bx bx-menu'></i>";
      }
    });

    // close if clicking a link (mobile)
    nav.addEventListener('click', (e)=>{
      if(e.target.matches('.nav a, .nav .nav-link')){
        nav.classList.remove('open');
        burger.setAttribute('aria-expanded', 'false');
        burger.innerHTML = "<i class='bx bx-menu'></i>";
      }
    });
  }
})();
