<section class="section section--intro">
  <div class="container">
    @while( have_posts() ) @php the_post() @endphp
      @include('partials.content-page')
    @endwhile
  </div>
</section>
