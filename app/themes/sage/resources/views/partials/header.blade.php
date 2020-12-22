@php $ancestors = get_ancestors(get_queried_object_id(), 'listings'); @endphp
<header class="border-b border-gray">
  <div class="md:py-4 bg-primary-1">
    <div class="w-full max-w-custom mx-auto px-base">
      <div class="flex flex-row flex-no-wrap justify-center md:justify-end text-white">
        <a class="hidden md:inline-block text-white uppercase no-underline" href="/">Home</a>
        <a class="md:ml-5 py-3 px-4 md:py-0 md:px-0 font-semibold md:font-normal text-current text-shadow uppercase no-underline bg-primary-2 md:bg-transparent" href="{{ get_permalink(109) }}">Find a Resort</a>
        <a class="md:hidden ml-5 py-3 px-4 md:py-0 md:px-0 font-semibold md:font-normal text-current text-shadow uppercase no-underline bg-primary-2 md:bg-transparent" href="{{ get_permalink(109) }}">Home</a>
        <a class="hidden md:inline-block md:ml-5 text-current text-shadow uppercase no-underline" href="{{ get_permalink(107) }}">The Roberts Difference</a>
        @if( get_field('covid_information', 'option') )
        <a class="hidden md:inline-block md:ml-5 text-current text-shadow uppercase no-underline" href="{{ get_field('covid_information', 'option') }}">COVID-19 Information</a>
        @endif
      </div>
    </div>
  </div>
  <div class="bg-white js-sticky">
    <div class="flex flex-row flex-wrap md:flex-no-wrap md:items-stretch justify-center md:justify-between relative w-full max-w-custom mx-auto px-base">
      <a class="inline-block w-full max-w-brand-mobile lg:max-w-brand py-6 brand" href="{{ App::brandURL() }}" title="Go Home">
        <img src="{{ App::brand() }}" alt="{{ App::brandAlt() }}">
      </a>
      @include('partials.nav-global')
      @include('partials.nav-resort')
      <button class="nav-toggle js-toggle-nav" aria-label="Toggle Navigation">
        <span class="nav-toggle__line"></span>
      </button>
    </div>
  </div>
</header>
