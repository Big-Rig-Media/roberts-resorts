@if( $post->post_name !== 'guest-specials' )
  @if( SingleListings::portals($post->ID) )
    <section class="md:grid md:grid-cols-3 md:gap-6 bg-white">
      @foreach( SingleListings::portals($post->ID) as $portal )
        @if( $portal->post_name !== 'guest-specials' && $portal->post_name !== 'the-experience' )
          <div class="flex flex-column flex-wrap items-center justify-center relative mb-2 md:mb-0 py-32 md:py-40 text-white text-center bg-center bg-no-repeat bg-cover js-background" data-mobile="{{ App::featuredImage($portal, 'w636x636') }}" data-desktop="{{ App::featuredImage($portal, 'w636x636') }}">
            <h4 class="w-full mb-2 text-shadow uppercase">{{ $portal->post_title }}</h4>
            <a class="inline-block md:ml-2 py-3 px-4 font-semibold text-white uppercase no-underline bg-primary-2" href="{{ get_permalink($portal->ID) }}">Learn More</a>
            <a class="absolute pin z-50" href="{{ get_permalink($portal->ID) }}" aria-label="{{ $portal->post_title }}"></a>
          </div>
        @endif
      @endforeach
    </section>
  @endif
@endif
