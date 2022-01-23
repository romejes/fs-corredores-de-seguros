import loadGoogleMapsApi from 'load-google-maps-api';

/**
 * Contruye todo el mapa y sus agregados
 * @param {string} idContenedorMapa ID del elemento que será el contenedor del maoa
 * @param {number} latitud Coordenada de latitud
 * @param {number} longitud Coordenada de longitud
 */
export function inicializarMapa(idContenedorMapa, latitud, longitud) {
  loadGoogleMapsApi({
    key: process.env.MIX_GOOGLE_MAP_API_KEY,
  })
    .then(objGoogleMaps => {
      const mapa = construirMapa(
        idContenedorMapa,
        latitud,
        longitud,
        objGoogleMaps,
      );
      const marcador = construirMarcador(objGoogleMaps, mapa);
      const ventana = construirVentanaInformacion(objGoogleMaps);

      
      ventana.open(mapa, marcador);

      //  Asignar evento
      objGoogleMaps.event.addListener(marcador, 'click', () =>
        ventana.open(mapa, marcador),
      );
    })
    .catch(error => {
      console.log(error);
    });
}

/**
 * Devuelve un objeto Map de GoogleMaps, el cual representa un mapa
 * @param {string} idContenedorMapa ID del elemento que será el contenedor del maoa
 * @param {number} latitud Coordenada de latitud
 * @param {number} longitud Coordenada de longitud
 * @param {GoogleMaps} objGoogleMaps Instancia de GoogleMaps
 */
function construirMapa(idContenedorMapa, latitud, longitud, objGoogleMaps) {
  const coordenadas = {
    lat: latitud,
    lng: longitud,
  };

  const ajustesMapa = {
    zoom: 18,
    center: coordenadas,
    mapTypeId: 'roadmap',
    mapTypeControl: false,
    disableDefaultUI: true,
    gestureHandling: 'none',
  };

  return new objGoogleMaps.Map(
    document.getElementById(idContenedorMapa),
    ajustesMapa,
  );
}

/**
 * Construye un marcador para señalar una ubicación en particular
 * @param {GoogleMaps} objGoogleMaps Instancia de Google Maps
 * @param {Map} objMapa Mapa de Google Maps
 */
function construirMarcador(objGoogleMaps, objMapa) {
  return new objGoogleMaps.Marker({
    position: objMapa.getCenter(),
    map: objMapa,
  });
}

/**
 * Construye una ventana de información que se mostrará encima del marcador
 * @param {GoogleMaps} objGoogleMaps Instancia de Google Maps
 */
function construirVentanaInformacion(objGoogleMaps) {
  return new objGoogleMaps.InfoWindow({
    content:
      '<b>FS Corredores de Seguros</b><br/>Agrup. Rosa Ara A-12<br/> Tacna - Perú',
  });
}
