import './componentes/carousel';
import { cargarImagenes, inicializar } from './componentes/carousel';

const carousel = $('.carousel');
const opcionesCarousel = {
  items: 1,
  loop: true,
  autoplay: true,
  dots: false,
  autoplayTimeout: 6000,
  autoplayHoverPause: true,
  onInitialize: () => {
    cargarImagenes()
  },
  onResize: () => {
    cargarImagenes();
  },
};
inicializar(carousel, opcionesCarousel);
