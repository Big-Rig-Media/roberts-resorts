@if( get_field('hero_image') )
  @php
    // Set hero background
    $hero_mobile = get_field('hero_image')['sizes']['w960x800'];
    $hero_desktop = get_field('hero_image')['sizes']['w1920x800'];

    //$padding = is_singular('listings') && $post->post_parent === 0 ? 'pt-16 pb-74 md:py-0' : 'py-16 md:py-0';

    $ancestors = get_ancestors(get_queried_object_id(), 'listings');

    if ( is_singular('listings') ) {
      switch ( count($ancestors) ) {
        case 0:
          $padding = 'pt-16 pb-74 md:py-0';
        break;
        case 1:
          $padding = 'py-16 md:py-0';
        break;
      }
    } else {
      $padding = 'py-16 md:py-0';
    }
  @endphp
  <section class="hero hero--static md:flex md:flex-column md:flex-wrap md:items-center {{ $padding }} js-hero" data-mobile="{{ $hero_mobile }}" data-desktop="{{ $hero_desktop }}">
    @include('partials.hero-content')
    @if( is_singular('listings') )
      <div class="container text-white text-center">
        @if( $post->post_parent === 0 )
          <h1 class="mb-1">{{ $post->post_title }}</h1>
          @if( SingleListings::frontDeskPhone($post) || SingleListings::homeSalesPhone($post) || SingleListings::homeRentalsPhone($post) )
            <div class="flex flex-colum md:flex-row flex-wrap md:flex-no-wrap md:items-center justify-center md:text-2sm lg:text-base">
              @if( SingleListings::frontDeskPhone($post) )
                <span class="mb-2 md:mb-0 uppercase">
                  <a class="font-bold text-white no-underline" href="tel:{{ preg_replace('/[^0-9]/', '', SingleListings::frontDeskPhone($post)) }}">{{ SingleListings::frontDeskPhone($post) }}</a> Front Desk
                </span>
              @endif
              @if( SingleListings::homeSalesPhone($post) )
                <span class="mb-2 md:mb-0 mx-2 uppercase">
                  <span class="hidden md:inline-block pr-2 font-bold">&#124;</span>
                  <a class="font-bold text-white no-underline" href="tel:{{ preg_replace('/[^0-9]/', '', SingleListings::homeSalesPhone($post)) }}">{{ SingleListings::homeSalesPhone($post) }}</a> Home Sales
                </span>
              @endif
              @if( SingleListings::homeRentalsPhone($post) )
                <span class="uppercase">
                  <span class="hidden md:inline-block pr-2 font-bold">&#124;</span>
                  <a class="font-bold text-white no-underline" href="tel:{{ preg_replace('/[^0-9]/', '', SingleListings::homeRentalsPhone($post)) }}">{{ SingleListings::homeRentalsPhone($post) }}</a> Home Rentals
                </span>
              @endif
            </div>
          @endif
          {!! do_shortcode('[book-resort]') !!}
        @endif
        @if( App\display_hero_meta($post->post_name) )
          <h1 class="mb-1">{{ get_the_title($post->post_parent) }}</h1>
          @if( SingleListings::frontDeskPhone($post->post_parent) || SingleListings::homeSalesPhone($post->post_parent) || SingleListings::homeRentalsPhone($post->post_parent) )
            <div class="flex flex-colum md:flex-row flex-wrap md:flex-no-wrap md:items-center justify-center md:text-2sm lg:text-base">
              @if( SingleListings::frontDeskPhone($post->post_parent) )
                <span class="mb-2 md:mb-0 uppercase">
                  <a class="font-bold text-white no-underline" href="tel:{{ preg_replace('/[^0-9]/', '', SingleListings::frontDeskPhone($post->post_parent)) }}">{{ SingleListings::frontDeskPhone($post->post_parent) }}</a> Front Desk
                </span>
              @endif
              @if( SingleListings::homeSalesPhone($post->post_parent) )
                <span class="mb-2 md:mb-0 mx-2 uppercase">
                  <span class="hidden md:inline-block pr-2 font-bold">&#124;</span>
                  <a class="font-bold text-white no-underline" href="tel:{{ preg_replace('/[^0-9]/', '', SingleListings::homeSalesPhone($post->post_parent)) }}">{{ SingleListings::homeSalesPhone($post->post_parent) }}</a> Home Sales
                </span>
              @endif
              @if( SingleListings::homeRentalsPhone($post->post_parent) )
                <span class="uppercase">
                  <span class="hidden md:inline-block pr-2 font-bold">&#124;</span>
                  <a class="font-bold text-white no-underline" href="tel:{{ preg_replace('/[^0-9]/', '', SingleListings::homeRentalsPhone($post->post_parent)) }}">{{ SingleListings::homeRentalsPhone($post->post_parent) }}</a> Home Rentals
                </span>
              @endif
            </div>
          @endif
          @if( App\display_hero_booking_form($post->post_name) )
            {!! do_shortcode('[book-resort]') !!}
          @endif
        @endif
      </div>
    @endif
  </section>
@endif
