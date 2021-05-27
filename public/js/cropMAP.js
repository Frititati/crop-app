var options = {
	enableHighAccuracy: true,
	timeout: 5000,
	maximumAge: 0
};

var cropIcon = L.icon({
	iconUrl:'/assets/icons/crop-logo.png',
	iconSize: [30, 30],
	popupAnchor: [0, -10],
});


function success(pos) {
	var coords = pos.coords;

	var mymap = L.map('mapid').setView([coords.latitude, coords.longitude], 15);

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(mymap);

	negozi.forEach((value) => {
		var marker = L.marker([value.latitude, value.longitude], {icon: cropIcon}).addTo(mymap);
		var str = "<p><b>"+value.name+"</b><br>"+value.address+"</p>";
		marker.bindPopup(str);
	});
}

function error(err) {
	alert("Attiva i servizi di localizzazione")
	alert(err.code + " " + err.message)

}

if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(success, error, options);
} else {
}


