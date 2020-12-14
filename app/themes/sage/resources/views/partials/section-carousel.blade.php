@php
  // Background Color State
  $background_color_state = get_sub_field('section_builder_background_color');

  // Content
  $content = get_sub_field('section_builder_content');
@endphp
<section class="section section--{{ $i }} bg-{{ $background_color_state }}">
  @if( $content )
    <div class="container">
      {!! $content !!}
      @if( have_rows('section_builder_videos') )
        <div class="relative">
          @php
            $i = 0;
            $j = 0;
          @endphp
          @while( have_rows('section_builder_videos') ) @php the_row() @endphp
            @php
              $id = get_sub_field('section_builder_video_id');
              $screenshot = get_sub_field('secttion_builder_video_screenshot');
              $label = get_sub_field('section_builder_video_label');
            @endphp
            @if( $i === 0 )
              <div class="js-video">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $id }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            @endif
            @php $i++; @endphp
          @endwhile
        </div>
        <div class="md:grid md:grid-cols-4 md:gap-30 -mx-1 md:mx-0 mt-1 md:mt-5 js-carousel-videos">
          @while( have_rows('section_builder_videos') ) @php the_row() @endphp
            @php
              $id = get_sub_field('section_builder_video_id');
              $screenshot = get_sub_field('secttion_builder_video_screenshot');
              $label = get_sub_field('section_builder_video_label');
            @endphp
            @if( $j !== 0 )
              <div class="relative mx-1 md:mx-0">
                <a href="https://youtu.be/{{ $id }}" data-fancybox>
                  <img src="{{ $screenshot['sizes']['w716x500'] }}" alt="{{ $label }}" />
                </a>
                <p class="mt-1 mb-0">{{ $label }}</p>
              </div>
            @endif
            @php $j++; @endphp
          @endwhile
        </div>
      @endif
    </div>
  @endif
</section>
