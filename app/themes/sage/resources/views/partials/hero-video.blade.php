@if( get_field('hero_video_mp4') && get_field('hero_video_webm') )
  <section class="hero hero--video has-video md:flex md:flex-column md:flex-wrap md:items-center py-16 md:py-0">
    @include('partials.hero-content')
    <video class="hero__video" preload="auto" autoplay loop muted playsinline>
      <source src={{ get_field('hero_video_mp4') }} type="video/mp4"/>
      <source src={{ get_field('hero_video_webm') }} type="video/webm"/>
    </video>
  </section>
@endif
