let hamburger = document.querySelector('.menu-button');
let menu = document.querySelector('#mobilemenu');

const toggleMenu = () => {
  menu.classList.toggle('show');
}

hamburger.addEventListener('click', e => {
  e.stopPropagation();
  toggleMenu();
});

document.addEventListener('click', e => {
  let target = e.target;
  let its_menu = target == menu || menu.contains(target);
  let its_hamburger = target == hamburger;
  let menu_is_active = menu.classList.contains('show');

  if (!its_menu && !its_hamburger && menu_is_active) {
    toggleMenu();
  }
})
