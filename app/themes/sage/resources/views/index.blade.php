@php global $wp_query @endphp

@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  <div class="md:flex md:flex-row md:flex-no-wrap md:justify-between">
    <div class="md:w-2/3">
      @if (!have_posts())
        <div class="alert alert--error">
          <p class="mb-0">{{ __('Sorry, no results were found.', 'sage') }}</p>
        </div>
      @endif

      <div class="posts">
        @while (have_posts()) @php the_post() @endphp
          @include('partials.content-'.get_post_type())
        @endwhile
      </div>

      @if($wp_query->max_num_pages > 1)
        {!! App\pagination($wp_query) !!}
      @endif
    </div>
    <div class="md:w-1/3">
      <aside class="md:pl-8">
        @include('partials.sidebar')
      </aside>
    </div>
  </div>
@endsection
