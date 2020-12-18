@php
  $parent = get_post($post->post_parent);
@endphp

@switch( $parent->post_name )
  @case('homes-for-sale')
  @case('rv-lots-for-sale')
  @case('vacation-rentals')
  @case('models-for-sale')
  @case('lots-for-sale')
  @break
  @default
    @include('partials.resort-intro')
  @break
@endswitch

@switch( $post->post_name )
  @case('homes-for-sale')
  @case('rv-lots-for-sale')
  @case('vacation-rentals')
  @case('models-for-sale')
  @case('lots-for-sale')
    @include('partials.resort-listings')
  @break
  @case('specials')
    @include('partials.resort-specials')
  @default
  @break
@endswitch

@switch( $parent->post_name )
  @case('homes-for-sale')
  @case('rv-lots-for-sale')
  @case('vacation-rentals')
  @case('models-for-sale')
  @case('lots-for-sale')
    @include('partials.resort-listing')
  @break
  @default
    @include('partials.sections')
  @break
@endswitch
