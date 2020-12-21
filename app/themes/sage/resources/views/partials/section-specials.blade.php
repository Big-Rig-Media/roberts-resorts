@php
  // Background Color State
  $background_color_state = get_sub_field('section_builder_background_color');

  // Content
  $content = get_sub_field('section_builder_content');
@endphp
<section class="section section--{{ $i }} bg-{{ $background_color_state }} overflow-hidden">
  <div class="container">
    @if( $content )
      {!! $content !!}
    @endif
    @if( !SingleListings::specials($post->post_name) )
      <p class="text-center"><strong>No specials at this time. Please check back soon.</strong></p>
    @endif
  </div>
  @if( SingleListings::specials($post->post_name) )
    <div class="-mx-1 js-carousel-specials">
      @foreach( SingleListings::specials($post->post_name) as $special )
        <div class="mx-1 py-32 px-6 md:px-0 md:py-40 bg-center bg-no-repeat bg-cover js-background" data-mobile="{{ App::featuredImage($special, 'w636x636') }}" data-desktop="{{ App::featuredImage($special, 'w636x636') }}">
          <div class="grid-center text-center">
            <h4 class="mb-2 text-white text-shadow uppercase">{{ $special->post_title }}</h4>
            <a class="inline-block w-auto mb-3 md:mb-0 py-3 px-4 text-sm font-semibold text-white text-shadow uppercase no-underline bg-primary-2" href="/resorts/{{ $post->post_name }}/specials#{{ $special->post_name }}">View Special</a>
          </div>
        </div>
      @endforeach
    </div>
  @endif
</section>
