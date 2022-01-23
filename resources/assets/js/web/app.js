import AOS from 'aos';
import { DesktopMenu } from './componentes/desktop_menu';
import { configurarValidacion } from './componentes/forms';
import { MobileMenu } from './componentes/mobile_menu';

const mobileMenuSelector = $('.navbar-mobile');
const desktopMenuSelector = $('.navbar-desktop');

//  Activar animaciones
AOS.init();

//  Inicializar configuracion de validacion
configurarValidacion();

//  Inicializar menúes
const objMobileMenu = new MobileMenu(mobileMenuSelector);
new DesktopMenu(desktopMenuSelector);

$('#btn-menu').on('click', () => {
  objMobileMenu.toggle();
});

$(window).on('resize', ev => {
  const windowWidth = $(ev.target).width();
  if (windowWidth >= 992) {
    objMobileMenu.close();
  }
});


$(window).on('scroll', ev => {
  if ($(window).scrollTop() > 0) {
    $('header').addClass('sticky-top')
  } else {
    $('header').removeClass('sticky-top')
  }
});