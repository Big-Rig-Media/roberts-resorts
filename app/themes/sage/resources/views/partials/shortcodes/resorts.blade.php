@if( $resorts )
  <div class="md:grid md:grid-cols-4 md:gap-15 mb-10">
    @foreach( $resorts as $resort )
      <div class="relative mb-4 md:mb-0">
        <div class="shadow-md">
          @if( App::featuredImage($resort, 'w732x400') )
            <div>
              <a href="{{ get_permalink($resort->ID) }}">
                <img src="{{ App::featuredImage($resort, 'w732x400') }}" alt="{{ $resort->post_title }}" loading="lazy" />
              </a>
            </div>
          @endif
          <div class="relative p-8">
            @if( App::resortAge($resort) )
              <span class="inline-block absolute z-50 px-8 py-2 font-semibold text-white uppercase bg-primary-3" style="top:-20px;left:32px">{{ App::resortAge($resort) }}</span>
            @endif
            <h4 class="mb-1">{{ $resort->post_title }}</h4>
            @if( App::resortCity($resort) && App::resortState($resort) && App::resortZipcode($resort) )
              <span class="text-sm uppercase">{{ App::resortCity($resort) }}, {{ App::resortState($resort) }} {{ App::resortZipcode($resort) }}</span>
            @endif
            <div class="mt-4">
              <a class="btn btn--primary" href="{{ get_permalink($resort->ID) }}">View Resort</a>
              @if( App::resortCampspotSlug($resort) )
                <a class="btn btn--secondary" href="https://www.campspot.com/book/{{ App::resortCampspotSlug($resort) }}">Book Now</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <div class="text-center">
    <a class="font-semibold text-primary-1 uppercase no-underline" href="{{ get_permalink(109) }}">View All <span class="text-primary-2">&rsaquo;</span></a>
  </div>
@endif
