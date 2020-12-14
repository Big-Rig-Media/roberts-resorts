@php
  $parent = get_post($post->post_parent);
@endphp

@switch( $parent->post_name )
  @case('homes-for-sale')
  @break
  @default
    @include('partials.resort-intro')
  @break
@endswitch

@switch( $post->post_name )
  @case('guest-specials')
  @break
  @case('homes-for-sale')
    @include('partials.resort-homes-for-sale')
  @break
  @case('rv-sites')
  @break
  @case('vacation-rentals')
  @break
  @default
  @break
@endswitch

@switch( $parent->post_name )
  @case('homes-for-sale')
    @include('partials.resort-home')
  @break
  @default
    @include('partials.sections')
  @break
@endswitch
