@if( is_singular('listings') )
  @php $ancestors = get_ancestors(get_queried_object_id(), 'listings'); @endphp
  <nav class="nav nav--header">
    @switch( count($ancestors) )
      @case(0)
        @switch( $post->post_name )
          @case('coachland')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Coachland Navigation', ]) !!}
          @break
          @case('gold-canyon')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Gold Canyon Navigation', ]) !!}
          @break
          @case('lake-osprey')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Lake Osprey Navigation', ]) !!}
          @break
          @case('oak-forest')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Oak Forest Navigation', ]) !!}
          @break
          @case('pueblo-el-mirage')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Pueblo El Mirage Navigation', ]) !!}
          @break
          @case('rayford-crossing')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Rayford Crossing Navigation', ]) !!}
          @break
          @case('sunrise')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Sunrise Navigation', ]) !!}
          @break
          @case('vista-del-sol')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Vista Del Sol Navigation', ]) !!}
          @break
        @endswitch
      @break
      @case(1)
        @php $parent = get_post($post->post_parent); @endphp
        @switch( $parent->post_name )
          @case('coachland')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Coachland Navigation', ]) !!}
          @break
          @case('gold-canyon')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Gold Canyon Navigation', ]) !!}
          @break
          @case('lake-osprey')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Lake Osprey Navigation', ]) !!}
          @break
          @case('oak-forest')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Oak Forest Navigation', ]) !!}
          @break
          @case('pueblo-el-mirage')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Pueblo El Mirage Navigation', ]) !!}
          @break
          @case('rayford-crossing')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Rayford Crossing Navigation', ]) !!}
          @break
          @case('sunrise')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Sunrise Navigation', ]) !!}
          @break
          @case('vista-del-sol')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Vista Del Sol Navigation', ]) !!}
          @break
        @endswitch
      @break
      @case(2)
        @php $parent = get_post($ancestors[1]); @endphp
        @switch( $parent->post_name )
          @case('coachland')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Coachland Navigation', ]) !!}
          @break
          @case('gold-canyon')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Gold Canyon Navigation', ]) !!}
          @break
          @case('lake-osprey')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Lake Osprey Navigation', ]) !!}
          @break
          @case('oak-forest')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Oak Forest Navigation', ]) !!}
          @break
          @case('pueblo-el-mirage')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Pueblo El Mirage Navigation', ]) !!}
          @break
          @case('rayford-crossing')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Rayford Crossing Navigation', ]) !!}
          @break
          @case('sunrise')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Sunrise Navigation', ]) !!}
          @break
          @case('vista-del-sol')
            {!! wp_nav_menu(['menu_class' => 'nav__list', 'container' => '', 'menu' => 'Vista Del Sol Navigation', ]) !!}
          @break
        @endswitch
      @break
    @endswitch
  </nav>
  <nav class="nav nav--header mt-8 md:mt-0 mb-4 md:mb-0">
    <ul class="nav__list">
      <li class="menu-item menu-item-book-now px-6 text-white bg-primary-2" data-state="closed">
        @switch( count($ancestors) )
          @case(0)
            <a class="md:grid-center md:h-full" href="https://www.campspot.com/book/{{ App::resortCampspotSlug($post) }}">Book Now</a>
          @break
          @case(1)
            <a class="md:grid-center md:h-full" href="https://www.campspot.com/book/{{ App::resortCampspotSlug($post->post_parent) }}">Book Now</a>
          @break
          @case(2)
            <a class="md:grid-center md:h-full" href="https://www.campspot.com/book/{{ App::resortCampspotSlug(get_post($ancestors[1])) }}">Book Now</a>
          @break
        @endswitch
      </li>
    </ul>
  </nav>
@endif
