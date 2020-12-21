@if( $portals )
<section class="md:grid md:grid-cols-3 md:gap-6 bg-white">
  @foreach( $portals as $portal )
    <div class="flex flex-column flex-wrap items-center justify-center relative mb-2 md:mb-0 py-32 md:py-40 text-white text-center bg-center bg-no-repeat bg-cover js-background portal" data-mobile="{{ App::featuredImage($portal, 'w636x636') }}" data-desktop="{{ App::featuredImage($portal, 'w636x636') }}">
      <div class="relative z-40">
        <h4 class="w-full mb-2 text-shadow uppercase">{{ $portal->post_title }}</h4>
        <a class="btn btn--secondary" href="{{ get_permalink($portal->ID) }}">Learn More</a>
      </div>
      <!--
      <a class="absolute pin z-50" href="{{ get_permalink($portal->ID) }}" aria-label="{{ $portal->post_title }}"></a>
      -->
    </div>
  @endforeach
</section>
@endif
