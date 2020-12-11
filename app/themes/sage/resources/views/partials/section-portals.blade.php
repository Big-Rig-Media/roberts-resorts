@php
  // Define background images
  $portals = get_sub_field('section_builder_portals');
@endphp

@if( $portals )
  @if( !is_singular('listings') )
    @if( App::portals($portals) )
      @include('partials.shortcodes.portals', ['portals' => App::portals($portals)])
    @endif
  @else
    @if( SingleListings::portals($portals) )
      @include('partials.shortcodes.portals', ['portals' => SingleListings::portals($portals)])
    @endif
  @endif
@endif
