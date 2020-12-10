@if( App::resorts() )
  @php
    $json = [];

    foreach ( App::resorts() as $resort ) {
      if ( get_geocode_lat($resort->ID) && get_geocode_lng($resort->ID) ) {
        $json[] = [
          'position'        => [
            'lat' => (int) trim(get_geocode_lat($resort->ID)),
            'lng' => (int) trim(get_geocode_lng($resort->ID))
          ],
          'city'          => App::resortCity($resort),
          'state'         => App::resortState($resort),
          'zipcode'       => App::resortZipcode($resort),
          'title'         => $resort->post_title,
          'image'         => App::featuredImage($resort, 'w331x152'),
          'slug'          => $resort->post_name,
          'campspotSlug'  => App::resortCampspotSlug($resort) ?: '#',
          'icon'          => '/app/uploads/2020/12/marker.png'
        ];
      }
    }
  @endphp
  <div id="map" class="h-70 md:h-80"></div>
  <script>
    let map, marker, bounds, LatLng, infoWindow

    const resorts = @json($json)

    /**
     * Initialize the Google Map
     */
    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: {lat: 36.7783, lng: -119.4179},
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        fullscreenControl: false,
        mapTypeControl: false,
        zoomControlOptions: {
          position: google.maps.ControlPosition.LEFT_TOP
        },
        streetViewControl: false,
        draggable: false,
        scaleControl: false,
        disableDefaultUI: true,
      })

      createMarkers()
    }

    /**
     * createMarkers
     *
     * Create the map markers
     */
    const createMarkers = () => {
      bounds = new google.maps.LatLngBounds()

      resorts.forEach(resort => {
        const { position, icon } = resort

        marker = new google.maps.Marker({
          position,
          map,
          icon
        })

        LatLng = new google.maps.LatLng(position)

        bounds.extend(LatLng)
        map.fitBounds(bounds)

        markerEvent(marker, resort)
      })
    }

    /**
     * markerEvent
     *
     * Create a map marker infoWindow event
     *
     * @param {object} marker - The map marker
     * @param {object} content - The map markers content
     */
    const markerEvent = (marker, content) => {
      infoWindow = new google.maps.InfoWindow

      marker.addListener('click', () => {
        infoWindow.setContent(`
          <div class="font-metropolis">
            <a href="/resorts/${content.slug}">
              <img src="${content.image}" alt="${content.title}" />
            </a>
            <h4 class="mb-1">${content.title}</h4>
            <span class="text-sm">${content.city}, ${content.state} ${content.zipcode}</span>
            <div class="mt-4">
              <a class="inline-block py-3 px-4 text-sm font-semibold text-white text-shadow uppercase no-underline bg-primary-1" href="/resorts/${content.slug}">View Resort</a>
              <a class="inline-block py-3 px-4 text-sm font-semibold text-white text-shadow uppercase no-underline bg-primary-2" href="https://www.campspot.com/book/${content.campspotSlug}">Book Now</a>
            </div>
          </div>
        `)
        infoWindow.open(map, marker)
      })
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key={{ GOOGLE_MAPS }}&callback=initMap" async defer></script>
@endif
