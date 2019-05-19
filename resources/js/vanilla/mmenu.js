const hamburger = document.querySelector('.menu-button');
const menu = document.querySelector('#mobilemenu');

const toggleMenu = () => {
  menu.classList.toggle('show');
}

hamburger.addEventListener('click', e => {
  e.stopPropagation();
  toggleMenu();
});

document.addEventListener('click', e => {
  const target = e.target;
  const its_menu = target == menu || menu.contains(target);
  const its_hamburger = target == hamburger;
  const menu_is_active = menu.classList.contains('show');

  if (!its_menu && !its_hamburger && menu_is_active) {
    toggleMenu();
  }
})
