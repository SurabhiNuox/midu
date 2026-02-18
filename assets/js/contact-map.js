/**
 * Contact map — Google Maps with Snazzy Maps styles.
 * Set your API key via: add_filter( 'midu_google_maps_api_key', function() { return 'YOUR_KEY'; } );
 */
(function () {
	'use strict';

	var SNAZZY_MAP_STYLES = [
		{ featureType: 'all', elementType: 'labels.text.fill', stylers: [ { saturation: 36 }, { color: '#000000' }, { lightness: 40 } ] },
		{ featureType: 'all', elementType: 'labels.text.stroke', stylers: [ { visibility: 'on' }, { color: '#000000' }, { lightness: 16 } ] },
		{ featureType: 'all', elementType: 'labels.icon', stylers: [ { visibility: 'off' } ] },
		{ featureType: 'administrative', elementType: 'geometry.fill', stylers: [ { color: '#000000' }, { lightness: 20 } ] },
		{ featureType: 'administrative', elementType: 'geometry.stroke', stylers: [ { color: '#000000' }, { lightness: 17 }, { weight: 1.2 } ] },
		{ featureType: 'administrative', elementType: 'labels', stylers: [ { visibility: 'off' } ] },
		{ featureType: 'administrative.country', elementType: 'all', stylers: [ { visibility: 'simplified' } ] },
		{ featureType: 'administrative.country', elementType: 'geometry', stylers: [ { visibility: 'simplified' } ] },
		{ featureType: 'administrative.country', elementType: 'labels.text', stylers: [ { visibility: 'simplified' } ] },
		{ featureType: 'administrative.province', elementType: 'all', stylers: [ { visibility: 'off' } ] },
		{ featureType: 'administrative.locality', elementType: 'all', stylers: [ { visibility: 'simplified' }, { saturation: '-100' }, { lightness: '30' } ] },
		{ featureType: 'administrative.neighborhood', elementType: 'all', stylers: [ { visibility: 'off' } ] },
		{ featureType: 'administrative.land_parcel', elementType: 'all', stylers: [ { visibility: 'off' } ] },
		{ featureType: 'landscape', elementType: 'all', stylers: [ { visibility: 'simplified' }, { gamma: '0.00' }, { lightness: '74' } ] },
		{ featureType: 'landscape', elementType: 'geometry', stylers: [ { color: '#34334f' }, { lightness: '-37' } ] },
		{ featureType: 'landscape.man_made', elementType: 'all', stylers: [ { lightness: 3 } ] },
		{ featureType: 'poi', elementType: 'all', stylers: [ { visibility: 'off' } ] },
		{ featureType: 'poi', elementType: 'geometry', stylers: [ { color: '#000000' }, { lightness: 21 } ] },
		{ featureType: 'road', elementType: 'geometry', stylers: [ { visibility: 'simplified' } ] },
		{ featureType: 'road.highway', elementType: 'geometry.fill', stylers: [ { color: '#2d2c45' }, { lightness: '0' } ] },
		{ featureType: 'road.highway', elementType: 'geometry.stroke', stylers: [ { color: '#000000' }, { lightness: 29 }, { weight: 0.2 } ] },
		{ featureType: 'road.highway', elementType: 'labels.text.fill', stylers: [ { color: '#7d7c9b' }, { lightness: '43' } ] },
		{ featureType: 'road.highway', elementType: 'labels.text.stroke', stylers: [ { visibility: 'off' } ] },
		{ featureType: 'road.arterial', elementType: 'geometry', stylers: [ { color: '#2d2c45' }, { lightness: '1' } ] },
		{ featureType: 'road.arterial', elementType: 'labels.text', stylers: [ { visibility: 'on' } ] },
		{ featureType: 'road.arterial', elementType: 'labels.text.fill', stylers: [ { color: '#7d7c9b' } ] },
		{ featureType: 'road.arterial', elementType: 'labels.text.stroke', stylers: [ { visibility: 'off' } ] },
		{ featureType: 'road.local', elementType: 'geometry', stylers: [ { color: '#2d2c45' }, { lightness: '-1' }, { gamma: '1' } ] },
		{ featureType: 'road.local', elementType: 'labels.text', stylers: [ { visibility: 'on' }, { hue: '#ff0000' } ] },
		{ featureType: 'road.local', elementType: 'labels.text.fill', stylers: [ { color: '#7d7c9b' }, { lightness: '-31' } ] },
		{ featureType: 'road.local', elementType: 'labels.text.stroke', stylers: [ { visibility: 'off' } ] },
		{ featureType: 'transit', elementType: 'geometry', stylers: [ { color: '#2d2c45' }, { lightness: '-36' } ] },
		{ featureType: 'water', elementType: 'geometry', stylers: [ { color: '#2d2c45' }, { lightness: '0' }, { gamma: '1' } ] },
		{ featureType: 'water', elementType: 'labels.text.stroke', stylers: [ { visibility: 'off' } ] }
	];

	function initMap() {
		var el = document.getElementById('contact-map-canvas');
		if (!el) return;

		var lat = parseFloat(el.getAttribute('data-lat')) || 24.7136;
		var lng = parseFloat(el.getAttribute('data-lng')) || 46.6753;
		var zoom = parseInt(el.getAttribute('data-zoom'), 10) || 10;
		var label = el.getAttribute('data-label') || 'Riyadh';
		var markerUrl = el.getAttribute('data-marker-url') || '';
		var mapColor = (el.getAttribute('data-map-color') || '#202031').trim();

		var section = el.closest('.contact-map');
		if (section && mapColor) section.style.setProperty('--contact-map-color', mapColor);

		var center = { lat: lat, lng: lng };
		var map = new google.maps.Map(el, {
			center: center,
			zoom: zoom,
			backgroundColor: mapColor,
			disableDefaultUI: false,
			zoomControl: true,
			mapTypeControl: false,
			streetViewControl: false,
			fullscreenControl: true,
			scrollwheel: false,
			styles: SNAZZY_MAP_STYLES,
		});

		var markerOpts = { position: center, map: map, title: label };
		if (markerUrl) {
			markerOpts.icon = {
				url: markerUrl,
				scaledSize: new google.maps.Size(59, 76),
				anchor: new google.maps.Point(29, 76),
			};
		}
		var marker = new google.maps.Marker(markerOpts);

		if (label) {
			var infoWindow = new google.maps.InfoWindow({ content: '<span class="contact-map-tooltip">' + (label.replace(/</g, '&lt;').replace(/>/g, '&gt;')) + '</span>' });
			marker.addListener('click', function () {
				infoWindow.open(map, marker);
			});
		}
	}

	function loadScriptAndInit() {
		var config = typeof miduContactMap !== 'undefined' ? miduContactMap : {};
		var apiKey = config.apiKey || '';
		if (!apiKey) {
			console.warn('midu: Google Maps API key not set. Add: add_filter( "midu_google_maps_api_key", function() { return "YOUR_KEY"; } );');
			return;
		}
		var callbackName = 'miduContactMapInit';
		window[callbackName] = function () {
			initMap();
			window[callbackName] = null;
		};
		var script = document.createElement('script');
		script.src = 'https://maps.googleapis.com/maps/api/js?key=' + encodeURIComponent(apiKey) + '&callback=' + callbackName;
		script.async = true;
		script.defer = true;
		document.head.appendChild(script);
	}

	if (typeof jQuery !== 'undefined') {
		jQuery(document).ready(loadScriptAndInit);
	} else {
		document.addEventListener('DOMContentLoaded', loadScriptAndInit);
	}
})();
