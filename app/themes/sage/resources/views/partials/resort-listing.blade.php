@php $ancestors = get_ancestors(get_queried_object_id(), 'listings'); @endphp
<section class="py-16">
  <div class="container">
    <div class="mb-10 text-center">
      <h1>{{ $post->post_title }}</h1>
      @if( SingleListings::price($listing) || SingleListings::bedrooms($listing) || SingleListings::bathrooms($listing) )
        <div class="flex flex-row flex-no-wrap justify-center text-sm uppercase">
          @if( SingleListings::price($listing) && (SingleListings::bedrooms($listing) && SingleListings::bathrooms($listing)) && SingleListings::lotNumber($listing) )
            <span>${{ SingleListings::price($listing) }}</span>
              <span class="mx-2">
                <span class="pr-2">&#124;</span>
                {{ SingleListings::bedrooms($listing) }} BR / {{ SingleListings::bathrooms($listing) }} BA
                <span class="pl-2">&#124;</span>
              </span>
              <span>Lot {{ SingleListings::lotNumber($listing) }}</span>
            @endif
            @if( SingleListings::price($listing) && SingleListings::lotNumber($listing) && !SingleListings::bedrooms($listing) && !SingleListings::bathrooms($listing) )
              <span>${{ SingleListings::price($listing) }}</span>
              <span class="ml-2">
                <span class="pr-2">&#124;</span>
                Lot {{ SingleListings::lotNumber($listing) }}
              </span>
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
              <div class="js-carousel-homes">
                @foreach( SingleListings::carousel($post) as $item )
                  <div>
                    <img src="{{ $item['sizes']['w994x670'] }}" alt={{ $item['alt'] }} />
                  </div>
                @endforeach
              </div>
            </div>
            <div class="mt-5 js-carousel-homes-nav -mx-2">
              @foreach( SingleListings::carousel($post) as $item )
                <div class="mx-2">
                  <img src="{{ $item['sizes']['w497x335'] }}" alt={{ $item['alt'] }} />
                </div>
              @endforeach
            </div>
          </div>
        @endif
        <ul class="mb-10 list-reset">
          @if( SingleListings::price($post) )
            <li class="mb-3 pb-3 text-base border-b border-primary-6"><strong>Price:</strong> ${{ SingleListings::price($post) }}</li>
          @endif
          @if( $ancestors[1] )
            <li class="mb-3 pb-3 text-base border-b border-primary-6"><strong>Community:</strong> {{ get_post($ancestors[1])->post_title }}</li>
          @endif
          @if( SingleListings::lotAddress($post) )
            <li class="mb-3 pb-3 text-base border-b border-primary-6"><strong>Address:</strong> {{ SingleListings::lotAddress($post) }}</li>
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
        @if( $ancestors[0] )
          <div class="mt-10">
            <a class="inline-flex items-center text-sm font-semibold text-primary-1 no-underline uppercase" href="{{ get_permalink($ancestors[0]) }}">
              All Listings
              <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M15.613 0h-.323a.387.387 0 00-.387.387v3.569A7.996 7.996 0 007.974 0C3.574.014-.006 3.613 0 8.013a8 8 0 0013.36 5.925.388.388 0 00.016-.562l-.228-.228a.386.386 0 00-.532-.015A6.876 6.876 0 018 14.903 6.902 6.902 0 011.097 8a6.902 6.902 0 0113.041-3.161h-3.686a.387.387 0 00-.387.387v.322c0 .214.173.387.387.387h5.16A.387.387 0 0016 5.548V.388A.387.387 0 0015.613 0z" fill="#FE9F09" fill-rule="nonzero"/></svg>
            </a>
          </div>
        @endif
      </div>
      <aside class="md:sticky md:pin-t md:w-1/3">
        @if( SingleListings::agent($post) || SingleListings::agentEmail($post) )
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
        @endif
        <div class="md:ml-5 mb-5 px-5 py-10 bg-primary-1">
          {!! do_shortcode('[gravityform id="1" title="false" description="false"]') !!}
        </div>
        <div class="relative px-5">
          <h6>Share This</h6>
          <div class="flex flex-row flex-no-wrap items-center">
            @php
              // Create new PDF anytime page is visited
              SingleListings::createPDF($post);

              $uploadsDir = wp_upload_dir()['baseurl'];
            @endphp
            <a class="mr-6" href="{{ $uploadsDir }}/listings/{{ $post->post_name }}.pdf">
              <svg class="w-auto h-8 fill-primary-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M448 192V77.25c0-8.49-3.37-16.62-9.37-22.63L393.37 9.37c-6-6-14.14-9.37-22.63-9.37H96C78.33 0 64 14.33 64 32v160c-35.35 0-64 28.65-64 64v112c0 8.84 7.16 16 16 16h48v96c0 17.67 14.33 32 32 32h320c17.67 0 32-14.33 32-32v-96h48c8.84 0 16-7.16 16-16V256c0-35.35-28.65-64-64-64zm-64 256H128v-96h256v96zm0-224H128V64h192v48c0 8.84 7.16 16 16 16h48v96zm48 72c-13.25 0-24-10.75-24-24 0-13.26 10.75-24 24-24s24 10.74 24 24c0 13.25-10.75 24-24 24z"/>
              </svg>
            </a>
            <a class="mr-6" href="https://www.facebook.com/dialog/feed?app_id={{ FACEBOOK }}&link={{ urlencode(get_permalink($post->ID)) }}&redirect_uri={{ urlencode(get_permalink($post->ID)) }}">
              <svg class="w-auto h-8 fill-primary-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 512"><path d="M76.7 512V283H0v-91h76.7v-71.7C76.7 42.4 124.3 0 193.8 0c33.3 0 61.9 2.5 70.2 3.6V85h-48.2c-37.8 0-45.1 18-45.1 44.3V192H256l-11.7 91h-73.6v229"/></svg>
            </a>
            <a class="mr-6" href="https://twitter.com/intent/tweet?url={{ urlencode(get_permalink($post->ID)) }}">
              <svg class="w-auto h-8 fill-primary-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
            </a>
            <a href="mailto:?subject={{ get_post($ancestors[1])->post_title }} - {{ get_the_title($post->ID) }}&body={{ urlencode(get_permalink($post->ID)) }}">
              <svg class="w-auto h-8 fill-primary-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"/></svg>
            </a>
          </div>
        </div>
      </aside>
    </div>
  </div>
</section>
