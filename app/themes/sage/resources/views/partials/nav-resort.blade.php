@if( is_singular('listings') )
  <nav class="nav nav--header mb-4 md:mb-0">
    <ul class="nav__list">
      <li class="menu-item menu-item-stay-with-us menu-item-has-children" data-state="closed">
        <a href="javascript:void(0)">Stay With Us</a>
      </li>
      <li class="menu-item menu-item-experience">
        <a href="javascript:void(0)">Experience</a>
      </li>
      <li class="menu-item menu-item-gallery">
        <a href="javascript:void(0)">Gallery</a>
      </li>
      <li class="menu-item menu-item-guest-info">
        <a href="javascript:void(0)">Guest Info</a>
      </li>
      <li class="menu-item menu-item-contact">
        <a href="javascript:void(0)">Contact</a>
      </li>
      <li class="menu-item menu-item-book-now px-6 text-white bg-primary-2" data-state="closed">
        @switch( count(get_ancestors(get_queried_object_id(), 'listings')) )
          @case(0)
            <a class="md:grid-center md:h-full" href="https://www.campspot.com/book/{{ App::resortCampspotSlug($post) }}">Book Now</a>
          @break
          @case(1)
            <a class="md:grid-center md:h-full" href="https://www.campspot.com/book/{{ App::resortCampspotSlug($post->post_parent) }}">Book Now</a>
          @break
          @case(2)
            <a class="md:grid-center md:h-full" href="https://www.campspot.com/book/{{ App::resortCampspotSlug(get_ancestors(get_queried_object_id(), 'listings')[1]) }}">Book Now</a>
          @break
        @endswitch
      </li>
    </ul>
  </nav>
@endif
