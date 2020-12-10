@if( SingleListings::homes($post->ID) )
  <section class="pb-16">
    <div class="container">
      <!--
      @if( $statuses )
        <div class="md:flex md:flex-row md:flex-no-wrap md:justify-end mb-10">
          <form class="js-filter-homes" method="post" action="{{ get_permalink($post->ID) }}">
            <div class="flex flex-column flex-wrap">
              <label class="block w-full mb-2 font-semibold uppercase" for="status">Filter by Type</label>
              <select class="w-full h-10 max-h-input px-6" name="status">
                <option selected>Please Select</option>
                @foreach( $statuses as $status )
                  <option value="{{ $status->term_id }}">{{ $status->name }}</option>
                @endforeach
              </select>
            </div>
          </form>
        </div>
      @endif
      -->
      <div class="md:grid md:grid-cols-3 md:gap-15">
        @foreach( SingleListings::homes($post->ID) as $home )
          @php
            switch ( SingleListings::status($home) ) {
              case 'Available':
                $bg = 'bg-available';
              break;
              case 'Pending':
                $bg = 'bg-pending';
              break;
              case 'Sold':
                $bg = 'bg-sold';
              break;
              default:
                $bg = 'bg-transparent';
              break;
            }
          @endphp
          <div class="relative">
            <div class="shadow-md">
              @if( App::featuredImage($home, 'w732x400') )
                <div class="relative overflow-hidden">
                  @if( SingleListings::status($home) )
                    <span class="absolute z-50 py-3 font-semibold text-white text-center uppercase text-shadow {{ $bg }}" style="top:20px;left:-80px;width:300px;transform:rotate(-30deg);">{{ SingleListings::status($home) }}</span>
                  @endif
                  <a href="{{ get_permalink($home->ID) }}">
                    <img src="{{ App::featuredImage($home, 'w732x400') }}" />
                  </a>
                </div>
              @endif
              <div class="p-8">
                <h4 class="mb-1">{{ $home->post_title }}</h4>
                @if( SingleListings::price($home) || SingleListings::bedrooms($home) || SingleListings::bathrooms($home) )
                  <div class="flex flex-row flex-no-wrap text-sm uppercase">
                    @if( SingleListings::price($home) )
                      <span>${{ SingleListings::price($home) }}</span>
                    @endif
                    @if( SingleListings::bedrooms($home) && SingleListings::bathrooms($home) )
                      <span class="mx-2">
                        <span class="pr-2">&#124;</span>
                        {{ SingleListings::bedrooms($home) }} BR / {{ SingleListings::bathrooms($home) }} BA
                        <span class="pl-2">&#124;</span>
                      </span>
                    @endif
                    @if( SingleListings::lotNumber($home) )
                      <span>Lot {{ SingleListings::lotNumber($home) }}</span>
                    @endif
                  </div>
                @endif
                <div class="mt-4">
                  <a class="inline-block py-3 px-4 text-sm font-semibold text-white text-shadow uppercase no-underline bg-primary-2" href="{{ get_permalink($home->ID) }}">View Listing</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif
