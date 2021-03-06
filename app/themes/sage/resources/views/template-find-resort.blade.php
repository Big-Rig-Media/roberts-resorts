{{--
  Template Name: Find Resort Template
--}}

@extends('layouts.app')

@section('content')

<section class="bg-white">
  <div class="relative md:grid md:grid-find-resort md:min-h-screen">
    <div class="px-base md:px-0">
      <div class="md:hidden py-8">
        <h1 class="text-center">Explore Our Resorts</h1>
        @if( $post->post_content )
          {!! apply_filters('the_content', $post->post_content) !!}
        @endif
        @if( App::resortStates() )
          <form class="js-filter-listings" method="post">
            <label class="block w-full mb-2 font-semibold uppercase" for="state">Filter by State</label>
            <select class="w-full h-10 max-h-input px-6 border border-primary-7" name="state">
              <option selected>Please Select</option>
              @foreach( App::resortStates() as $state )
                <option value=".{{ $state->name }}">{{ $state->name }}</option>
              @endforeach
            </select>
          </form>
        @endif
      </div>
      <div class="js-listings">
        @foreach( App::resorts() as $resort )
          <div class="mb-4 md:mb-0 md:px-10 md:py-12 shadow-md md:shadow-none md:border-b md:border-primary-6 {{ App::resortState($resort) }}">
            <div class="md:flex md:flex-row md:flex-no-wrap md:justify-between">
              @if( App::featuredImage($resort, 'w732x400') )
                <div class="md:w-2/5">
                  <a href="{{ get_permalink($resort->ID) }}">
                    <img src="{{ App::featuredImage($resort, 'w732x400') }}" alt="{{ $resort->post_title }}" loading="lazy" />
                  </a>
                </div>
              @endif
              <div class="md:w-3/5 p-8 md:p-0">
                <div class="md:ml-5">
                  @if( App::resortAge($resort) )
                    <span class="inline-block font-semibold uppercase">{{ App::resortAge($resort) }}</span>
                  @endif
                  <h4 class="mb-1">{{ $resort->post_title }}</h4>
                  @if( App::resortCity($resort) && App::resortState($resort) && App::resortZipcode($resort) )
                    <span class="text-sm uppercase">{{ App::resortCity($resort) }}, {{ App::resortState($resort) }} {{ App::resortZipcode($resort) }}</span>
                  @endif
                  <div class="mt-4">
                    <a class="inline-block py-3 px-4 text-sm font-semibold text-white text-shadow uppercase no-underline bg-primary-1" href="{{ get_permalink($resort->ID) }}">View Resort</a>
                    @if( App::resortCampspotSlug($resort) )
                      <a class="inline-block md:ml-2 py-3 px-4 text-sm font-semibold text-white text-shadow uppercase no-underline bg-primary-2" href="https://www.campspot.com/book/{{ App::resortCampspotSlug($resort) }}">Book Now</a>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <div class="md:sticky md:pin-t md:h-screen">
      <div class="md:absolute md:pin-t md:pin-r md:w-full md:h-full">
        <div id="map" class="w-full h-full"></div>
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
                'campspotSlug'  => App::resortCampspotSlug($resort),
                'icon'          => '/app/uploads/2020/12/marker.png'
              ];
            }
          }
        @endphp
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

            let html

            if (content.campspotSlug) {
              html =  `<div class="font-metropolis">
                        <a href="/resorts/${content.slug}">
                          <img src="${content.image}" alt="${content.title}" loading="lazy" />
                        </a>
                        <h4 class="mb-1">${content.title}</h4>
                        <span class="text-sm">${content.city}, ${content.state} ${content.zipcode}</span>
                        <div class="mt-4">
                          <a class="inline-block py-3 px-4 text-sm font-semibold text-white text-shadow uppercase no-underline bg-primary-1" href="/resorts/${content.slug}">View Resort</a>
                          <a class="inline-block py-3 px-4 text-sm font-semibold text-white text-shadow uppercase no-underline bg-primary-2" href="https://www.campspot.com/book/${content.campspotSlug}">Book Now</a>
                        </div>
                      </div>`
            } else {
              html =  `<div class="font-metropolis">
                        <a href="/resorts/${content.slug}">
                          <img src="${content.image}" alt="${content.title}" loading="lazy" />
                        </a>
                        <h4 class="mb-1">${content.title}</h4>
                        <span class="text-sm">${content.city}, ${content.state} ${content.zipcode}</span>
                        <div class="mt-4">
                          <a class="inline-block py-3 px-4 text-sm font-semibold text-white text-shadow uppercase no-underline bg-primary-1" href="/resorts/${content.slug}">View Resort</a>
                        </div>
                      </div>`
            }

            marker.addListener('click', () => {
              infoWindow.setContent(html)
              infoWindow.open(map, marker)
            })
          }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key={{ GOOGLE_MAPS }}&callback=initMap" async defer></script>
      </div>
    </div>
  </div>
</section>

@endsection
