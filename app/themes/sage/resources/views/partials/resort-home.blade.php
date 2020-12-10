<section class="py-16">
  <div class="container">
    <div class="mb-10 text-center">
      <h1>{{ $post->post_title }}</h1>
      @if( SingleListings::price($post) || SingleListings::bedrooms($post) || SingleListings::bathrooms($post) )
        <div class="flex flex-row flex-no-wrap justify-center text-sm uppercase">
          @if( SingleListings::price($post) )
            <span>${{ SingleListings::price($post) }}</span>
          @endif
          @if( SingleListings::bedrooms($post) && SingleListings::bathrooms($post) )
            <span class="mx-2">
              <span class="pr-2">&#124;</span>
              {{ SingleListings::bedrooms($post) }} BR / {{ SingleListings::bathrooms($post) }} BA
              <span class="pl-2">&#124;</span>
            </span>
          @endif
          @if( SingleListings::lotNumber($post) )
            <span>Lot {{ SingleListings::lotNumber($post) }}</span>
          @endif
        </div>
      @endif
    </div>
    <div class="md:flex md:flex-row md:flex-no-wrap md:items-start md:justify-between">
      <div class="md:w-2/3">
        @if( SingleListings::carousel($post) )
          <div class="mb-10">
            <div class="relative overflow-hidden">
              @php
                switch ( SingleListings::status($post) ) {
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
              @if( SingleListings::status($post) )
                <span class="absolute z-50 py-3 font-semibold text-white text-center uppercase text-shadow {{ $bg }}" style="top:20px;left:-80px;width:300px;transform:rotate(-30deg);">{{ SingleListings::status($post) }}</span>
              @endif
              <div class="js-homes-carousel">
                @foreach( SingleListings::carousel($post) as $item )
                  <div>
                    <img src="{{ $item['sizes']['w994x670'] }}" />
                  </div>
                @endforeach
              </div>
            </div>
            <div class="mt-5 js-homes-carousel-nav">
              @foreach( SingleListings::carousel($post) as $item )
                <div>
                  <img src="{{ $item['sizes']['w497x335'] }}" />
                </div>
              @endforeach
            </div>
          </div>
        @endif
        <ul class="mb-10 list-reset">
          @if( SingleListings::price($post) )
            <li class="mb-3 pb-3 text-base border-b border-primary-6"><strong>Price:</strong> ${{ SingleListings::price($post) }}</li>
          @endif
          @if( SingleListings::address($post) )
            <li class="mb-3 pb-3 text-base border-b border-primary-6"><strong>Address:</strong> {{ SingleListings::address($post) }}</li>
          @endif
          @if( SingleListings::agent($post) )
            <li class="mb-3 pb-3 text-base border-b border-primary-6"><strong>Agent:</strong> {{ SingleListings::agent($post) }}</li>
          @endif
          @if( SingleListings::status($post) )
            <li class="mb-3 pb-3 text-base border-b border-primary-6"><strong>Status:</strong> {{ SingleListings::status($post) }}</li>
          @endif
          @if( SingleListings::bedrooms($post) && SingleListings::bathrooms($post) )
            <li class="mb-3 pb-3 text-base border-b border-primary-6"><strong>Bd/Ba:</strong> {{ SingleListings::bedrooms($post) }} / {{ SingleListings::bathrooms($post) }}</li>
          @endif
          @if( SingleListings::sqft($post) )
            <li class="mb-3 pb-3 text-base border-b border-primary-6"><strong>Sq. Ft:</strong> {{ SingleListings::sqft($post) }} Square Feet</li>
          @endif
        </ul>
        @if( $post->post_content )
          @php the_content() @endphp
        @endif
      </div>
      <aside class="md:sticky md:pin-t md:w-1/3">
        <div class="md:ml-5 mb-5 px-5 py-10 text-white bg-primary-3">
          @if( SingleListings::agent($post) )
            <h4>Agent: {{ SingleListings::agent($post) }}</h4>
          @endif
          @if( SingleListings::agentPhone($post) )
            <span class="flex flex-row flex-no-wrap items-center my-8 text-base">
              <svg class="w-6 h-6 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 21"><path d="M20.239 1.048L15.98.065a.989.989 0 00-1.125.57L12.89 5.219a.98.98 0 00.282 1.146l2.48 2.03A15.171 15.171 0 018.4 15.65l-2.03-2.481a.981.981 0 00-1.147-.282L.64 14.85a.994.994 0 00-.574 1.13l.983 4.258a.982.982 0 00.958.761C12.489 21 21 12.506 21 2.006a.981.981 0 00-.761-.958z" fill="#FFF" fill-rule="nonzero"/></svg>
              <a class="text-white no-underline" href="tel:{{ preg_replace('/[^0-9]/', '', SingleListings::agentPhone($post)) }}">{{ SingleListings::agentPhone($post) }}</a>
            </span>
          @endif
          @if( SingleListings::agentEmail($post) )
            <span class="flex flex-row flex-no-wrap items-center text-base">
              <svg class="w-6 h-6 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 17"><path d="M22.564 5.614c.175-.138.436-.01.436.208v9.053C23 16.048 22.034 17 20.844 17H2.156C.966 17 0 16.048 0 14.875V5.826c0-.221.256-.345.436-.208 1.006.77 2.34 1.749 6.922 5.03.948.68 2.547 2.115 4.142 2.106 1.604.014 3.234-1.452 4.146-2.107 4.582-3.28 5.912-4.263 6.918-5.033zM11.5 11.334c1.042.017 2.543-1.293 3.297-1.833 5.961-4.264 6.415-4.636 7.79-5.698.26-.2.413-.51.413-.837v-.841C23 .952 22.034 0 20.844 0H2.156C.966 0 0 .952 0 2.125v.841c0 .328.153.633.413.837C1.788 4.86 2.242 5.237 8.203 9.5c.754.54 2.255 1.85 3.297 1.832z" fill="#FFF" fill-rule="nonzero"/></svg>
              <a class="text-white no-underline" href="mailto:{{ SingleListings::agentEmail($post) }}">{{ SingleListings::agentEmail($post) }}</a>
            </span>
          @endif
        </div>
        <div class="md:ml-5 px-5 py-10 bg-primary-1">
          {!! do_shortcode('[gravityform id="1" title="false" description="false"]') !!}
        </div>
      </aside>
    </div>
  </div>
</section>
