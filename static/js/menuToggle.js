const menuBox = document.getElementById('menuBox');
const menu = document.getElementById('menu');

menuBox.addEventListener('click', () => {
  if (menu.classList.contains('show')) {
    menu.classList.remove('show');
    menu.classList.add('hide');

    setTimeout(() => {
      menu.classList.remove('hide');
      menu.style.display = 'none';
    }, 600);
    
} else {
    menu.style.display = 'flex';
    menu.classList.add('show');
  }

  menuBox.classList.toggle('open');
});
