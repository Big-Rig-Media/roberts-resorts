{{--
  Template Name: Specials Template
--}}

@extends('layouts.app')

@section('content')

<section class="py-8 md:py-16">
  <div class="container">
    @if( $post->post_content )
      @php the_content() @endphp
    @endif
    <!--
    @if( TemplateSpecials::resorts() )
      <form class="js-filter-specials" method="post">
        <div>
          <label class="block" for="resort">Filter by Resort</label>
          <select class="w-full" name="resort">
            <option selected>Select Resort</option>
            @foreach( TemplateSpecials::resorts() as $resort )
              <option value="{{ $resort->term_id }}">{{ $resort->name }}</option>
            @endforeach
          </select>
        </div>
      </form>
    @endif
    -->
    @if( TemplateSpecials::specials() )
      <div class="mt-10 js-specials">
        @foreach( TemplateSpecials::specials() as $special )
          <div class="md:flex md:flex-row md:flex-no-wrap md:items-stretch md:justify-between mb-10 shadow-md">
            @if( App::featuredImage($special, 'w636x636') )
            <div class="md:w-1/3">
              <img class="block w-full h-full" src="{{ App::featuredImage($special, 'w636x636') }}" alt="{{ $special->post_title }}" />
            </div>
            @endif
            <div class="md:w-2/3 p-10">
              @if( TemplateSpecials::resort($special) )
                <h6 class="mb-2">{{ TemplateSpecials::resort($special) }}</h6>
              @endif
              <h3>{{ $special->post_title }}</h3>
              @if( $special->post_content )
                {!! apply_filters('the_content', $special->post_content) !!}
              @endif
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>

@endsection
