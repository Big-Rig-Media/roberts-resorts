@if( get_field('hero_image') )
  @php
    // Set hero background
    $hero_mobile = get_field('hero_image')['sizes']['w960x800'];
    $hero_desktop = get_field('hero_image')['sizes']['w1920x800'];

    $padding = is_singular('listings') && $post->post_parent === 0 ? 'pt-16 pb-74 md:py-0' : 'py-16 md:py-0';
  @endphp
  <section class="hero hero--static md:flex md:flex-column md:flex-wrap md:items-center {{ $padding }} js-hero" data-mobile="{{ $hero_mobile }}" data-desktop="{{ $hero_desktop }}">
    @include('partials.hero-content')
    @if( is_singular('listings') )
      <div class="container text-white text-center">
        @if( $post->post_parent === 0 )
          <h1 class="mb-1">{{ $post->post_title }}</h1>
          @if( SingleListings::frontDeskPhone($post) || SingleListings::homeSalesPhone($post) || SingleListings::homeRentalsPhone($post) )
            <div class="flex flex-colum md:flex-row flex-wrap md:flex-no-wrap md:items-center justify-center text-base">
              @if( SingleListings::frontDeskPhone($post) )
                <span class="mb-2 md:mb-0 uppercase"><strong>{{ SingleListings::frontDeskPhone($post) }}</strong> Front Desk</span>
              @endif
              @if( SingleListings::homeSalesPhone($post) )
                <span class="mb-2 md:mb-0 mx-2 uppercase">
                  <span class="hidden md:inline-block pr-2 font-bold">&#124;</span>
                  <strong>{{ SingleListings::homeSalesPhone($post) }}</strong> Home Sales
                  <span class="hidden md:inline-block pl-2 font-bold">&#124;</span>
                </span>
              @endif
              @if( SingleListings::homeRentalsPhone($post) )
                <span class="uppercase"><strong>{{ SingleListings::homeRentalsPhone($post) }}</strong> Home Rentals</span>
              @endif
            </div>
          @endif
          {!! do_shortcode('[book-resort]') !!}
        @endif
        @if( get_queried_object()->post_name === 'homes-for-sale' )
          <h1 class="mb-1">{{ get_the_title(get_queried_object()->post_parent) }}</h1>
          @if( SingleListings::frontDeskPhone(get_queried_object()->post_parent) || SingleListings::homeSalesPhone(get_queried_object()->post_parent) || SingleListings::homeRentalsPhone(get_queried_object()->post_parent) )
            <div class="flex flex-colum md:flex-row flex-wrap md:flex-no-wrap md:items-center justify-center text-base">
              @if( SingleListings::frontDeskPhone(get_queried_object()->post_parent) )
                <span class="mb-2 md:mb-0 uppercase"><strong>{{ SingleListings::frontDeskPhone(get_queried_object()->post_parent) }}</strong> Front Desk</span>
              @endif
              @if( SingleListings::homeSalesPhone(get_queried_object()->post_parent) )
                <span class="mb-2 md:mb-0 mx-2 uppercase">
                  <span class="hidden md:inline-block pr-2 font-bold">&#124;</span>
                  <strong>{{ SingleListings::homeSalesPhone(get_queried_object()->post_parent) }}</strong> Home Sales
                  <span class="hidden md:inline-block pl-2 font-bold">&#124;</span>
                </span>
              @endif
              @if( SingleListings::homeRentalsPhone(get_queried_object()->post_parent) )
                <span class="uppercase"><strong>{{ SingleListings::homeRentalsPhone(get_queried_object()->post_parent) }}</strong> Home Rentals</span>
              @endif
            </div>
          @endif
        @endif
      </div>
    @endif
  </section>
@endif
