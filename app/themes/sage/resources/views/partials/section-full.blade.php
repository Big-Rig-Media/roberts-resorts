@php
  // Define background images
  $bg_mobile = get_sub_field('section_builder_background') ? get_sub_field('section_builder_background')['sizes']['w960x800'] : '';
  $bg_desktop = get_sub_field('section_builder_background') ? get_sub_field('section_builder_background')['sizes']['w1920x800'] : '';

  // Background State
  $background_state = !empty(get_sub_field('section_builder_background')) ? 'js-background' : 'no-background';

  // Background Color State
  $background_color_state = get_sub_field('section_builder_background_color');

  // Flex State
  $flex_state = get_sub_field('section_builder_flex') === 'yes' ? 'container--flex' : 'container--normal';

  // Text State
  $text_state = get_sub_field('section_builder_text_center') === 'yes' ? 'text-center' : 'default';

  // Action State
  $action_state = get_sub_field('section_builder_action') === 'yes' ? 'pb-70' : 'default';

  // Content
  $content = get_sub_field('section_builder_content');

  // Video
  $mp4 = get_sub_field('section_builder_video_mp4');
  $webm = get_sub_field('section_builder_video_webm');
@endphp
<section class="section section--{{ $i }} section--{{ $section_state }} {{ $background_state }} bg-{{ $background_color_state }} {{ $action_state }} relative" data-mobile="{{ $bg_mobile }}" data-desktop="{{ $bg_desktop }}">
  @if( $content )
    <div class="container {{ $flex_state }} {{ $text_state }} relative z-50">
      {!! $content !!}
    </div>
    @if( $mp4 && $webm )
    <video class="absolute pin z-40 w-full h-full" preload="auto" style="object-fit:cover" autoplay loop muted playsinline>
      <source src="{{ $mp4 }}" type="video/mp4"/>
      <source src="{{ $webm }}" type="video/webm"/>
    </video>
    @endif
  @endif
</section>
