<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Oasis</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .marker-info {
            box-sizing: border-box;
            padding: 20px;
        }

        .marker-info h3 {
            text-align: center;
            color: #000000;
            font-size: 30px;
        }

        .marker-info p {
            font-size: 16px;
            color: black;
        }

        #details-container {
            position: absolute;
            top: 250px;
            left: 20px;
            width: calc(50% - 400px);
            padding: 20px;
            border: 1px solid #ccc;
            z-index: 1000;
            overflow: hidden;
            word-wrap: break-word;
            height: 400px;
        }

        #about-container {
            position: absolute;
            top: 250px;
            right: 20px;
            width: calc(50% - 400px);
            padding: 20px;
            border: 1px solid #ccc;
            overflow: hidden;
            word-wrap: break-word;
            height: 400px;
        }


        #about-container h3,
        #details-container h3,
        #products-container h3 {
            color: #689D38;
            font-size: 40px;
            text-align: center;
        }

        #about-container p,
        #details-container p,
        #products-container p {
            color: black;
            font-size: 30px;
            text-align: center;
        }

        .products-container {
            position: relative;
            top: 90px;
        }

        .product-container {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            margin-top: 20px;
            text-align: center;
        }

        .product-container p {
            margin: 0 0 10px;
        }

        .product-container img {
            max-width: 100%;
            display: block;
            margin: 0 auto;
        }



        #company-name {
            font-size: 50px;
            text-align: center;
            color: #689D38;
        }
    </style>
</head>

<body>
    <header class="header">
        <a href="#" class="logo">
            <i class="fa-light fa-plate-utensils"></i>
        </a>
        <h1 class="heading" id="heading" style="text-align: center;">Food <span> Oasis </span>
        </h1>
        <nav class="navbar">
            <a href="index.html">Home</a>
            <a href="signup.html">Signup</a>
            <a href="login.html">Login</a>
        </nav>
        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>
    </header>
    <div class="map-container">
        <input id="pac-input" class="controls" type="text" placeholder="Search">
        <div id="google-map" class="google-map"></div>
        <h3 id="company-name"></h3>
        <div class="zoom-range-container">
            <input type="range" min="1" max="20" value="10" class="zoom-range" id="zoomRange">
        </div>

        <div id="details-container">
            <h3>Company Information:</h3>
            <p id="company-hours"></p>
            <p id="company-phone"></p>
            <p id="company-social"><a id="social-link" href="#" target="_blank"></a></p>
        </div>

        <div id="about-container">
            <h3>About Vendor:</h3>
            <p id="company-info"></p>
        </div>
        <div id="products-container">
            <?php include 'vendor_products.php'; ?>
        </div>
    </div>
    <footer>
        <div class="footer-column">
            <h3>Company</h3>
            <ul>
                <li>About us</li>
                <li>Careers</li>
                <li>Privacy Policy</li>
                <li>Terms and Conditions</li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Support</h3>
            <ul>
                <li>Signup Issues</li>
                <li>Login Issues</li>
                <li>Ordering</li>
                <li>FAQ</li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Locations</h3>
            <ul>
                <li>United States</li>
                <li>Canada</li>
                <li>Europe</li>
                <li>Asia</li>
            </ul>
        </div>
    </footer>
    <script>
        function initMap() {
            const map = new google.maps.Map(document.getElementById('google-map'), {
                center: { lat: 33.7629768, lng: -84.4510441 },
                zoom: 10,
                disableDefaultUI: true,
                styles: [
                    {
                        "featureType": "all",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "saturation": 36
                            },
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 40
                            }
                        ]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 17
                            },
                            {
                                "weight": 1.2
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 29
                            },
                            {
                                "weight": 0.2
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 18
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 19
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    }
                ]
            });
            const zoomRangeInput = document.getElementById('zoomRange');

            zoomRangeInput.addEventListener('input', function () {
                const zoomLevel = parseInt(this.value);
                map.setZoom(zoomLevel);
            });

            const infoWindow = new google.maps.InfoWindow({
                minWidth: 200,
                maxWidth: 200
            });

            const input = document.getElementById('pac-input');
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
            });
            let usersArray = [];

            fetch('markers.php')
                .then(response => response.json())
                .then(users => {
                    users.forEach(user => {
                        console.log("User email:", user.email);
                        const newUser = new google.maps.Marker({
                            position: { lat: parseFloat(user.latitude), lng: parseFloat(user.longitude) },
                            map: map,
                            title: user.company_name
                        });
                        newUser.addListener('click', function () {
                            console.log("Marker clicked. Email:", user.email);
                            fetch('vendor_products.php?email=' + encodeURIComponent(user.email))
                                .then(response => response.text())
                                .then(data => {
                                    console.log("Product info:", data);
                                    document.getElementById('products-container').innerHTML = data;
                                })
                                .catch(error => console.error('Error fetching product information:', error));
                            document.getElementById('company-name').innerText = user.company_name;
                            document.getElementById('company-info').innerText = user.information;
                            document.getElementById('company-hours').innerText = user.hours_of_operations;
                            document.getElementById('company-phone').innerText = user.phone_number;


                            const socialLink = document.getElementById('social-link');
                            socialLink.innerText = 'Visit our Social Media';
                            socialLink.href = user.social_media;
                            socialLink.target = '_blank';

                        });

                        const addressContainer = document.createElement('div');
                        addressContainer.classList.add('marker-address-container');
                        addressContainer.innerHTML = `
                            <p>${user.address}</p>
                            <button onclick="getDirections(${user.latitude}, ${user.longitude})">Get Directions</button>
                        `;

                        const markerInfoWindow = new google.maps.InfoWindow({
                            content: addressContainer
                        });

                        newUser.addListener('click', function () {
                            markerInfoWindow.open(map, newUser);
                        });
                        usersArray.push(newUser);
                    });
                })
                .catch(error => console.error('Error fetching markers:', error));

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    const userLatLng = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    const userMarkerIcon = {
                        url: 'http://maps.gstatic.com/mapfiles/ms2/micons/man.png',
                        scaledSize: new google.maps.Size(50, 50)
                    };

                    const userMarker = new google.maps.Marker({
                        position: userLatLng,
                        map: map,
                        title: 'Your Location',
                        icon: userMarkerIcon
                    });
                    usersArray.push(userMarker);
                    userMarker.addListener('click', function () {
                        const contentString = `
                            <div>
                                <h3 style="color:#689D38; text-align:center; font-size:24px">Your Location</h3>
                            </div>
                        `;
                        infoWindow.setContent(contentString);
                        infoWindow.open(map, this);
                    });
                }, function () {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                handleLocationError(false, infoWindow, map.getCenter());
            }

            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                infoWindow.setPosition(pos);
                infoWindow.setContent(browserHasGeolocation ?
                    'Error: The Geolocation service failed.' :
                    'Error: Your browser doesn\'t support geolocation.');
                infoWindow.open(map);
            }

            searchBox.addListener('places_changed', function () {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                usersArray.forEach(function (user) {
                    user.setMap(null);
                });
                usersArray = [];

                const bounds = new google.maps.LatLngBounds();
                places.forEach(function (place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }

                    const marker = new google.maps.Marker({
                        map: map,
                        title: place.name,
                        position: place.geometry.location
                    });

                    marker.addListener('click', function () {
                        const contentString = `
                            <div class="marker-info">
                                <h3 style="font-size:46px;">${place.name}</h3>
                                <p>${place.formatted_address}</p>
                                <br>
                                <button onclick="getDirections(${place.geometry.location.lat()}, ${place.geometry.location.lng()})">Get Directions</button>
                            </div>
                        `;
                        infoWindow.setContent(contentString);
                        infoWindow.open(map, marker);
                    });

                    usersArray.push(marker);

                    if (place.geometry.viewport) {
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });

            window.getDirections = function (latitude, longitude) {
                window.open(`https://www.google.com/maps/dir/?api=1&destination=${latitude},${longitude}`);
            };
        }

    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGLIkUoW92Cqv25JdJ_4333JypQBCryVc&libraries=places&callback=initMap"
        defer></script>
    <script src="script.js" defer></script>
</body>

</html>