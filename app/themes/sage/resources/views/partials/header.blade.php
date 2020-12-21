@php $ancestors = get_ancestors(get_queried_object_id(), 'listings'); @endphp
<header class="border-b border-gray">
  <div class="md:py-4 bg-primary-1">
    <div class="w-full max-w-custom mx-auto px-base">
      <div class="flex flex-row flex-no-wrap justify-center md:justify-end text-white">
        <a class="py-3 px-4 md:py-0 md:px-0 font-semibold md:font-normal text-current text-shadow uppercase no-underline bg-primary-2 md:bg-transparent" href="{{ get_permalink(109) }}">Find a Resort</a>
        <a class="md:hidden ml-5 py-3 px-4 md:py-0 md:px-0 font-semibold md:font-normal text-current text-shadow uppercase no-underline bg-primary-2 md:bg-transparent" href="{{ get_permalink(109) }}">Homepage</a>
        <a class="hidden md:inline-block md:ml-10 text-current text-shadow uppercase no-underline" href="{{ get_permalink(107) }}">The Roberts Difference</a>
        @if( get_field('covid_information', 'option') )
        <a class="hidden md:inline-block md:ml-10 text-current text-shadow uppercase no-underline" href="{{ get_field('covid_information', 'option') }}">COVID-19 Information</a>
        @endif
        <span class="hidden md:inline-block ml-5 pr-5">&#124;</span>
        <a class="hidden md:inline-block font-bold text-white uppercase no-underline" href="/">Homepage</a>
      </div>
    </div>
  </div>
  <div class="bg-white js-sticky">
    <div class="flex flex-row flex-wrap md:flex-no-wrap md:items-stretch justify-center md:justify-between relative w-full max-w-custom mx-auto px-base">
      <a class="inline-block w-full max-w-brand-mobile lg:max-w-brand py-6 brand" href="{{ App::brandURL() }}" title="Go Home">
        @if(get_option('branding'))
          <img src="{{ get_option('branding') }}" alt="{{ get_bloginfo('name', 'display') }}">
        @else
          <svg xmlns="http://www.w3.org/2000/svg" width="281" height="36"><path d="M15.173 1.111c2.669 0 5.437 0 7.76 1.504 2.719 1.754 4.152 4.261 4.152 7.519 0 3.91-2.57 6.517-6.128 7.419v.1c4.201.853 7.068 4.11 7.068 8.572 0 3.008-1.78 5.664-4.152 7.419-2.471 1.854-5.783 1.854-8.699 1.854H0V1.111h15.173zM7.908 14.746h5.387c1.384 0 3.015.101 4.201-.802.939-.702 1.433-1.955 1.433-3.108 0-1.253-.593-2.456-1.68-3.108-1.137-.651-3.213-.501-4.547-.501H7.908v7.519zm0 14.386h5.486c1.434 0 3.262.101 4.498-.752 1.137-.752 1.779-2.155 1.779-3.559 0-1.304-.791-2.657-1.928-3.309-1.137-.652-2.718-.652-4.003-.652H7.908v8.272zM39.542 35.499h-7.908V1.111h7.908v34.388zM56.841 23.518v-6.417h13.938v18.397h-3.608l-1.137-3.96C63.513 34.647 60.746 36 56.792 36c-9.935 0-14.037-8.371-14.037-17.394C42.755 9.282 47.252.61 57.484.61c7.315 0 12.258 4.512 13.295 11.78l-7.513 1.053c-.346-3.459-2.175-6.366-5.98-6.366-5.585 0-6.425 7.369-6.425 11.629 0 4.462 1.236 10.777 6.771 10.777 3.459 0 5.832-2.456 5.634-5.965h-6.425zM83.038 35.499H75.13V1.111h14.284c3.015 0 6.079.05 8.699 1.754 2.768 1.854 4.3 5.213 4.3 8.572 0 3.91-2.225 7.519-5.882 8.873l6.277 15.188H94.01l-5.19-13.584h-5.783v13.585zm0-19.5h4.35c1.631 0 3.41.15 4.844-.702 1.285-.802 1.977-2.406 1.977-3.911 0-1.353-.791-2.807-1.928-3.509-1.334-.852-3.608-.651-5.091-.651h-4.152v8.773zM114.672 35.499h-7.908V1.111h7.908v34.388zM131.971 23.518v-6.417h13.938v18.397H142.3l-1.136-3.96c-2.521 3.108-5.288 4.461-9.243 4.461-9.935 0-14.037-8.371-14.037-17.394 0-9.324 4.498-17.996 14.729-17.996 7.315 0 12.257 4.512 13.295 11.78l-7.512 1.053c-.346-3.459-2.174-6.366-5.98-6.366-5.585 0-6.425 7.369-6.425 11.629 0 4.462 1.235 10.777 6.771 10.777 3.46 0 5.832-2.456 5.634-5.965h-6.425z" fill="#fff"/><path d="M153.571 35.499h-3.559V1.111h6.326l10.231 27.521 9.983-27.521h6.228v34.388h-4.25V5.472h-.198l-10.725 30.027h-2.867L153.769 5.472h-.197v30.027zM209.771 35.499h-21.945V1.111h21.451V4.82h-17.2v10.928h13.641v3.459h-13.641v12.581h17.694v3.711zM213.528 1.111h10.726c4.844 0 8.452 1.002 11.665 4.862 2.915 3.459 4.102 7.77 4.102 12.231 0 4.211-1.087 8.371-3.51 11.83-2.718 3.86-6.227 5.464-10.873 5.464h-12.109V1.111zm10.479 30.728c3.904 0 7.019-.902 9.242-4.36 1.681-2.607 2.472-6.166 2.472-9.274 0-3.509-.89-7.168-3.114-9.976-2.322-2.958-5.041-3.509-8.6-3.509h-6.228v27.12h6.228zM244.223 35.499V1.111h4.25v34.388h-4.25zM273.928 35.499l-3.41-10.025h-12.554l-3.016 10.025h-3.559l10.973-34.388h4.894l11.021 34.388h-4.349zm-9.539-29.776l-5.239 16.492h10.43l-5.191-16.492z" fill="#fff"/><path d="M272.786 4.027c0-2.214 1.845-4.027 4.118-4.027C279.167 0 281 1.813 281 4.027c0 2.26-1.833 4.073-4.096 4.073-2.273 0-4.118-1.812-4.118-4.073zm.781 0c0 1.847 1.481 3.281 3.337 3.281 1.833 0 3.314-1.434 3.314-3.281 0-1.79-1.481-3.236-3.314-3.236-1.855.001-3.337 1.446-3.337 3.236zm5.385 2.284h-.781l-1.312-2.088h-.804v2.088h-.679V1.778h2.003c.384 0 .77.023 1.12.218.339.195.509.596.509.975 0 .895-.633 1.228-1.447 1.25l1.391 2.09zm-2.149-2.651c.645 0 1.527.115 1.527-.7 0-.585-.509-.666-1.086-.666h-1.188V3.66h.747z" fill="#fff"/></svg>
        @endif
      </a>
      @include('partials.nav-global')
      @include('partials.nav-resort')
      <button class="nav-toggle js-toggle-nav" aria-label="Toggle Navigation">
        <span class="nav-toggle__line"></span>
      </button>
    </div>
  </div>
</header>
