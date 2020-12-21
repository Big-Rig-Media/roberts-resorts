@if( SingleListings::specials(get_post($post->post_parent)->post_name) )
  <section class="pb-8 md:pb-16">
    <div class="container">
      <div>
        @foreach( SingleListings::specials(get_post($post->post_parent)->post_name) as $special )
          <a id="{{ $special->post_name }}" style="display:block;position:relative;top:-70px;visibility:hidden"></a>
          <div class="md:flex md:flex-row md:flex-no-wrap md:items-stretch md:justify-between mb-10 shadow-md">
            @if( App::featuredImage($special, 'w636x636') )
              <div class="md:w-1/3">
                <img class="block w-full h-full" src="{{ App::featuredImage($special, 'w636x636') }}" alt="{{ $special->post_title }}" />
              </div>
            @endif
            <div class="md:w-2/3 p-10">
              @if( get_post($post->post_parent)->post_title )
                <h6 class="mb-2">{{ get_post($post->post_parent)->post_title }}</h6>
              @endif
              <h3>{{ $special->post_title }}</h3>
              @if( $special->post_content )
                {!! apply_filters('the_content', $special->post_content) !!}
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@else
  <section class="pb-8 md:pb-16">
    <div class="container">
      <p class="text-center"><strong>No specials at this time. Please check back soon.</strong></p>
    </div>
  </section>
@endif
