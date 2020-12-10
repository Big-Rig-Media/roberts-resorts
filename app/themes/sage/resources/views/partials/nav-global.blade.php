@if( is_front_page() && !is_singular('listings') )
  <nav class="nav nav--header mb-4 md:mb-0">
    <ul class="nav__list">
      @if( App::resorts() )
        <li class="menu-item menu-item-rv-resorts menu-item-has-children" data-state="closed">
          <a href="javascript:void(0)">RV Resorts</a>
          <div class="sub-menu sub-menu--mega pl-0 md:p-5 md:border-l md:border-r md:border-b md:border-primary-7">
            <div class="md:grid md:grid-cols-4 md:gap-15 md:w-full">
              @foreach( App::resorts() as $resort )
                <div class="menu-item menu-item-{{ $resort->post_name }} mb-3 md:mb-0">
                  @if( App::featuredImage($resort, 'w732x400') )
                    <div class="mb-2">
                      <a href="{{ get_permalink($resort->ID) }}">
                        <img src="{{ App::featuredImage($resort, 'w732x400') }}" />
                      </a>
                    </div>
                  @endif
                  @if( App::resortCity($resort) && App::resortState($resort) && App::resortZipcode($resort) )
                    <span class="block mb-1 text-sm uppercase">{{ App::resortCity($resort) }}, {{ App::resortState($resort) }} {{ App::resortZipcode($resort) }}</span>
                  @endif
                  <a class="mt-1 text-sm font-semibold text-primary-3" href="{{ get_permalink($resort->ID) }}">{{ $resort->post_title }}</a>
                </div>
              @endforeach
            </div>
            <div class="w-full mt-10 text-center">
              <a class="font-semibold text-primary-1 uppercase no-underline" href="{{ get_permalink(109) }}">View All <span class="text-primary-2">&rsaquo;</span></a>
            </div>
          </div>
        </li>
      @endif
      <li class="menu-item menu-item-homes-lots-for-sale menu-item-has-children" data-state="closed">
        <a href="javascript:void(0)">Homes & Lots for Sale</a>
      </li>
      <li class="menu-item menu-item-specials">
        <a href="#">Specials</a>
      </li>
      <li class="menu-item menu-item-book-now px-6 text-white bg-primary-2" data-state="closed">
        @if( !is_singular('listings') )
          <a class="md:grid-center md:h-full" href="javascript:void(0)">Book Now</a>
        @endif
      </li>
    </ul>
  </nav>
@endif
