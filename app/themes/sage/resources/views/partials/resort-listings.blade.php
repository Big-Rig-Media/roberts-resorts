@if( SingleListings::listings($post->ID) )
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
        @foreach( SingleListings::listings($post->ID) as $listing )
          @php
            switch ( SingleListings::status($listing) ) {
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
              @if( App::featuredImage($listing, 'w732x400') )
                <div class="relative overflow-hidden">
                  @if( SingleListings::status($listing) )
                    <span class="absolute z-50 py-3 font-semibold text-white text-center uppercase text-shadow {{ $bg }}" style="top:20px;left:-80px;width:300px;transform:rotate(-30deg);">{{ SingleListings::status($listing) }}</span>
                  @endif
                  <a href="{{ get_permalink($listing->ID) }}">
                    <img src="{{ App::featuredImage($listing, 'w732x400') }}" />
                  </a>
                </div>
              @endif
              <div class="p-8">
                <h4 class="mb-1">{{ $listing->post_title }}</h4>
                @if( SingleListings::price($listing) || SingleListings::bedrooms($listing) || SingleListings::bathrooms($listing) )
                  <div class="flex flex-row flex-no-wrap text-sm uppercase">
                    @if( SingleListings::price($listing) )
                      <span>${{ SingleListings::price($listing) }}</span>
                    @endif
                    @if( SingleListings::bedrooms($listing) && SingleListings::bathrooms($listing) )
                      <span class="mx-2">
                        <span class="pr-2">&#124;</span>
                        {{ SingleListings::bedrooms($listing) }} BR / {{ SingleListings::bathrooms($listing) }} BA
                        <span class="pl-2">&#124;</span>
                      </span>
                    @endif
                    @if( SingleListings::lotNumber($listing) )
                      <span>Lot {{ SingleListings::lotNumber($listing) }}</span>
                    @endif
                  </div>
                @endif
                <div class="mt-4">
                  <a class="inline-block py-3 px-4 text-sm font-semibold text-white text-shadow uppercase no-underline bg-primary-2" href="{{ get_permalink($listing->ID) }}">View Listing</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif
