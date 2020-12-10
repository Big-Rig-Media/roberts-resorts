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
        <div class="js-videos-carousel">
          @while( have_rows('section_builder_videos') ) @php the_row() @endphp
            @php
              $id = get_sub_field('section_builder_video_id');
            @endphp
            <div>

            </div>
          @endwhile
        </div>
        <div class="js-videos-carousel-nav">
          @while( have_rows('section_builder_videos') ) @php the_row() @endphp
            <div>
              Test
            </div>
          @endwhile
        </div>
      @endif
    </div>
  @endif
</section>
