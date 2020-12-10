@if( $post->post_content )
  <section class="section section--intro">
    <div class="container">
      @php the_content() @endphp
    </div>
  </section>
@endif
