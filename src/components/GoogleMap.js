import React, { useEffect, useRef, useState } from 'react';
import { GoogleMap, LoadScript, Marker, InfoWindow } from '@react-google-maps/api';

const containerStyle = {
  width: '75%',
  height: '700px'
};

const center = {
  lat:   33.7488,
  lng: -84.3877
};

const GoogleMapComponent = () => {
  const mapRef = useRef();
  const [selectedPlace, setSelectedPlace] = useState(null);
  const [markers, setMarkers] = useState([]);
  const [radius, setRadius] = useState(10000); // Default radius in meters

  useEffect(() => {
    if (mapRef.current) {
      const map = mapRef.current.state.map;
      const service = new window.google.maps.places.PlacesService(map);
      const request = {
        location: center,
        radius: radius, // Use the state radius
        type: ['grocery_or_supermarket']
      };

      service.nearbySearch(request, (results, status) => {
        if (status === window.google.maps.places.PlacesServiceStatus.OK) {
          const newMarkers = results.map(place => {
            const marker = new window.google.maps.Marker({
              map: map,
              position: place.geometry.location
            });
            marker.addListener('click', () => {
              service.getDetails({ placeId: place.place_id }, (placeDetails, status) => {
                if (status === window.google.maps.places.PlacesServiceStatus.OK) {
                  setSelectedPlace(placeDetails);
                }
              });
            });
            return marker;
          });
          setMarkers(newMarkers);
          fitBounds(map, newMarkers);
        }
      });
    }
  }, [radius]); // Add radius to the dependency array

  const fitBounds = (map, markers) => {
    const bounds = new window.google.maps.LatLngBounds();
    markers.forEach(marker => {
      bounds.extend(marker.getPosition());
    });
    map.fitBounds(bounds);
  };

  const handleRadiusChange = (event) => {
    setRadius(event.target.value);
  };

  return (
    <LoadScript googleMapsApiKey="AIzaSyBbg-t-ZyEKuAqZhmAl9_oZpunoYINhElY" libraries={['places']}>
      <div style={{ display: 'flex', justifyContent: 'center', alignItems: 'center', height: '100vh', margin: '0 auto' }}>
        <div style={{ marginBottom: '1em' }}>
          <label htmlFor="radius">Radius (in meters):</label>
          <input
            type="range"
            id="radius"
            name="radius"
            min="1000"
            max="50000"
            value={radius}
            onChange={handleRadiusChange}
          />
        </div>
        <GoogleMap
          mapContainerStyle={containerStyle}
          center={center}
          zoom={14}
          ref={mapRef}
        >
          {selectedPlace && (
            <InfoWindow
              position={{ lat: selectedPlace.geometry.location.lat(), lng: selectedPlace.geometry.location.lng() }}
              onCloseClick={() => {
                setSelectedPlace(null);
              }}
            >
              <div>
                <h2>{selectedPlace.name}</h2>
                <p>{selectedPlace.vicinity}</p>
                {selectedPlace.website && (
                  <p><a href={selectedPlace.website} target="_blank" rel="noopener noreferrer">Website</a></p>
                )}
                {selectedPlace.formatted_phone_number && (
                  <p>{selectedPlace.formatted_phone_number}</p>
                )}
              </div>
            </InfoWindow>
          )}
        </GoogleMap>
      </div>
    </LoadScript>
  );
};

export default GoogleMapComponent;
