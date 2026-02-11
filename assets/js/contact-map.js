/**
 * Contact map — Leaflet dark theme, centered on Riyadh (or data coords), white teardrop marker.
 */
(function () {
	function init() {
		var el = document.getElementById('contact-map-canvas');
		if (!el || typeof L === 'undefined') return;
		var lat = parseFloat(el.getAttribute('data-lat')) || 24.7136;
		var lng = parseFloat(el.getAttribute('data-lng')) || 46.6753;
		var zoom = parseInt(el.getAttribute('data-zoom'), 10) || 10;
		var label = el.getAttribute('data-label') || 'Riyadh';
		var markerUrl = el.getAttribute('data-marker-url') || '';
		var mapColor = (el.getAttribute('data-map-color') || '#273445').trim();

		// Apply map colour via CSS variable (section + overlay in SCSS use --contact-map-color)
		var section = el.closest('.contact-map');
		if (section && mapColor) section.style.setProperty('--contact-map-color', mapColor);

		var map = L.map('contact-map-canvas', {
			center: [lat, lng],
			zoom: zoom,
			zoomControl: true,
		});

		// Dark map tiles (CartoDB Dark Matter)
		L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy; <a href="https://carto.com/attributions">CARTO</a>',
			subdomains: 'abcd',
			maxZoom: 19,
		}).addTo(map);

		// Marker using marker.svg image
		var pinIcon = markerUrl
			? L.icon({
				iconUrl: markerUrl,
				iconSize: [59, 76],
				iconAnchor: [29, 76],
				popupAnchor: [0, -76],
				className: 'contact-map-marker-icon',
			})
			: null;
		L.marker([lat, lng], pinIcon ? { icon: pinIcon } : {}).addTo(map).bindTooltip(label, {
			permanent: false,
			direction: 'top',
			offset: [0, -76],
			className: 'contact-map-tooltip',
		});

		// Recompute size in case container was not yet laid out
		setTimeout(function () { map.invalidateSize(); }, 100);
	}

	if (typeof jQuery !== 'undefined') {
		jQuery(document).ready(init);
	} else {
		document.addEventListener('DOMContentLoaded', init);
	}
})();
