let map, centerMarker
const DEFAULT_ZOOM = 8

const DEFAULT_CENTER = {
    lat: 1.2921,
    lng: 36.8219
}

function initMap() {

    map = new google.maps.Map(document.getElementById("map"), {
        center: DEFAULT_CENTER,
        zoom: DEFAULT_ZOOM
    });

    centerMarker = new google.maps.Marker({
        position: DEFAULT_CENTER,
        map: map
    })

    //Call the function after the map has loaded
    getDeviceLocation()

    registerMapClickListener()

    registerAutocompleteListener()

}

/**
 * Updates the current location of the map
 * @param {google.maps.LatLng} position 
 */
function updateMapCenter(position) {
    //Log the position
    console.log(position)

    //Change the center of the map
    map.setCenter(position)

    //Update the maps center marker
    centerMarker.setPosition(position)

}

/**
 * Get the current location of the device
 */
function getDeviceLocation() {

    navigator.geolocation.getCurrentPosition(

        position => {

            let currentLocationCoords = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            }

            //Update the center of the map based on returned coordinates
            updateMapCenter(currentLocationCoords)

        }, error => {

            console.log(error.message)

        }, {
            maximumAge: 600000
        }
    )

}

function registerAutocompleteListener() {

    const locationInput = document.getElementById('location')

    const options = {
        types: ['geocode'],
        componentRestrictions: {
            country: 'ke'
        }
    }

    const autocomplete = new google.maps.places.Autocomplete(locationInput, options)

    google.maps.event.addListener(autocomplete, 'place_changed', function () {

        const nearLocation = autocomplete.getPlace()

        let lat = nearLocation.geometry.location.lat()
        let lng = nearLocation.geometry.location.lng()

        position = new google.maps.LatLng({lat, lng})
        
        updateMapCenter(position)

        document.getElementById('lat').value = lat
        document.getElementById('lng').value = lng

    })

}

function registerMapClickListener(){

    map.addListener('click', function (event) {

        let lat = event.latLng.lat();
        let lng = event.latLng.lng();

        position = new google.maps.LatLng({lat, lng});

        centerMarker.setPosition(position);

        document.getElementById('lat').value = lat
        document.getElementById('lng').value = lng
    });

}