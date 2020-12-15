@php
  $parent = get_post($post->post_parent);
@endphp

@switch( $parent->post_name )
  @case('homes-for-sale')
  @case('rv-lots-for-sale')
  @case('vacation-rentals')
  @break
  @default
    @include('partials.resort-intro')
  @break
@endswitch

@switch( $post->post_name )
  @case('homes-for-sale')
  @case('rv-lots-for-sale')
  @case('vacation-rentals')
    @include('partials.resort-listings')
  @break
  @default
  @break
@endswitch

@switch( $parent->post_name )
  @case('homes-for-sale')
  @case('rv-lots-for-sale')
  @case('vacation-rentals')
    @include('partials.resort-listing')
  @break
  @default
    @include('partials.sections')
  @break
@endswitch
