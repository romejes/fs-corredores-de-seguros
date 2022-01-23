import 'owl.carousel';

/**
 * Iniciar carousel
 * @param {JQuery<HTMLElement>} contenedorCarousel 
 * @param {OwlCarousel.Options} opciones 
 */
export function inicializar(contenedorCarousel, opciones) {
  contenedorCarousel.owlCarousel(opciones)
}

/**
 * Determinar las imagenes que se mostraran en el carousel
 */
export function cargarImagenes() {
  const slides = $('.carousel-slide');

  slides.each((indice, slide) => {
    let urlImagenFondo;
    const anchoPantalla = $(window).width();

    if (anchoPantalla <= 768) {
      urlImagenFondo = slide.dataset.mdImg;
    } else {
      urlImagenFondo = slide.dataset.img;
    }
    slide.style.backgroundImage = `url(${urlImagenFondo})`;
  });
}
