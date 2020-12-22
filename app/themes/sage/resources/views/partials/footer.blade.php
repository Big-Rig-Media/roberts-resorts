<footer class="py-8 md:py-16 text-white bg-primary-1">
  <div class="container">
    <div class="md:grid md:grid-footer md:gap-30">
      <a class="inline-block w-full max-w-brand" href="{{ App::brandURL() }}" title="Go Home">
        <img src="/app/uploads/2020/12/roberts-resorts-logo-white.svg" alt="{{ get_bloginfo('name', 'display') }}">
      </a>
      <div class="mt-8 md:mt-0">
        <span class="block mb-4 text-2sm font-bold uppercase">Quick Links</span>
        <nav class="nav nav--footer">
          @if (has_nav_menu('footer_navigation'))
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'theme_location' => 'footer_navigation', ]) !!}
          @endif
        </nav>
      </div>
      <div class="hidden md:block">
        <span class="block mb-4 text-2sm font-bold uppercase">Sign Up for Special Offers, Discounts and More</span>
        {!! do_shortcode('[gravityform id="13" title="false" description="false"]') !!}
      </div>
    </div>
    <hr>
    <div class="flex flex-column md:flex-row flex-wrap md:flex-no-wrap md:items-center md:justify-between">
      @if($copyright)
        {!! $copyright !!}
      @endif
      @if($social)
        <div class="flex flex-row items-center justify-center order-0 md:order-1 w-full md:w-auto mb-4 md:mb-0">
          @foreach($social as $key => $link)
            <a class="flex flex-row flex-no-wrap items-center ml-5" href="{{ $link['url'] }}" title="Check Us Out on {{ ucfirst($key) }}" aria-label="{{ ucfirst($key) }}">
              {!! $link['svg'] !!}
            </a>
          @endforeach
        </div>
      @endif
    </div>
  </div>
</footer>
@if( ( is_front_page() || is_page() ) || ( is_singular('listings') ) )
  <section class="fixed pin-b pin-l pin-r z-50 md:hidden py-3 bg-white shadow-lg">
    <div class="flex flex-row flex-no-wrap items-center justify-center">
      @if( ( is_front_page() || is_page() ) )
        <a class="inline-block py-3 px-4 text-xs font-semibold text-white text-shadow uppercase no-underline bg-primary-2" href="{{ get_permalink(109) }}">Find a Resort</a>
        <a class="inline-block ml-3 py-3 px-4 text-xs font-semibold text-white text-shadow uppercase no-underline bg-primary-2" href="{{ get_permalink(60) }}">Find a Home</a>
      @elseif( is_singular('listings') )
        @switch( count(get_ancestors(get_queried_object_id(), 'listings')) )
          @case(0)
            <a class="inline-block py-3 px-4 text-xs font-semibold text-white text-shadow uppercase no-underline bg-primary-2" href="https://www.campspot.com/book/{{ App::resortCampspotSlug($post) }}">Book Now</a>
          @break
          @case(1)
            <a class="inline-block py-3 px-4 text-xs font-semibold text-white text-shadow uppercase no-underline bg-primary-2" href="https://www.campspot.com/book/{{ App::resortCampspotSlug($post->post_parent) }}">Book Now</a>
          @break
          @case(2)
            <a class="inline-block py-3 px-4 text-xs font-semibold text-white text-shadow uppercase no-underline bg-primary-2" href="https://www.campspot.com/book/{{ App::resortCampspotSlug(get_ancestors(get_queried_object_id(), 'listings')[1]) }}">Book Now</a>
          @break
        @endswitch
      @endif
    </div>
  </section>
@endif
