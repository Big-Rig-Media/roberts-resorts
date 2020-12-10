@php
  // Define background images
  $portals = get_sub_field('section_builder_portals');
@endphp

@if( $portals )
  @if( App::portals($portals) )
    @include('partials.shortcodes.portals', ['portals' => App::portals($portals)])
  @endif
@endif
