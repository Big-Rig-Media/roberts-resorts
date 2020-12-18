@if( ( is_front_page() || is_page() || is_home() || is_single() || is_category() ) && !is_singular('listings') )
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
        <ul class="sub-menu">
          <li class="menu-item">
            <a href="{{ get_permalink(60) }}">Home Listings</a>
          </li>
          <li class="menu-item">
            <a href="{{ get_permalink(1843) }}">Lot Listings</a>
          </li>
        </ul>
      </li>
      <li class="menu-item menu-item-specials">
        <a href="{{ get_permalink(203) }}">Specials</a>
      </li>
      <li class="hidden md:grid-center menu-item menu-item-book-now menu-item-has-children px-6 text-white bg-primary-2" data-state="closed">
        @if( !is_singular('listings') )
          <a class="md:grid-center md:h-full" href="javascript:void(0)">Book Now</a>
          <div class="sub-menu sub-menu--form bg-primary-8">
            <form class="w-full max-w-xl mx-auto js-book-resorts" method="post">
              <div class="md:flex md:flex-row md:flex-no-wrap md:items-end md:justify-between">
                @if( App::resorts() )
                  <div class="flex flex-column flex-wrap w-full md:max-w-xs mb-3 md:mb-0">
                    <label class="block w-full mb-2 font-semibold text-white text-shadow uppercase" for="resort">Choose Location</label>
                    <select class="w-full h-10 max-h-input px-6 bg-white" name="resort">
                      <option selected>Please Select</option>
                      @foreach( App::resorts() as $resort )
                        <option value="{{ App::resortCampspotSlug($resort) }}" data-slug="{{ $resort->post_name }}">{{ $resort->post_title }}</option>
                      @endforeach
                    </select>
                  </div>
                @endif
                <div class="flex flex-column flex-wrap w-full md:max-w-xxs md:mx-3 mb-3 md:mb-0">
                  <label class="block w-full mb-2 font-semibold text-white text-shadow uppercase" for="check-in">Check-In</label>
                  <input class="w-full h-10 max-h-input px-6 bg-white" type="date" name="check-in" />
                </div>
                <div class="flex flex-column flex-wrap w-full md:max-w-xxs md:mr-3 mb-3 md:mb-0">
                  <label class="block w-full mb-2 font-semibold text-white text-shadow uppercase" for="check-out">Check-Out</label>
                  <input class="w-full h-10 max-h-input px-6 bg-white" type="date" name="check-out" />
                </div>
                <input class="hidden" type="input" name="adults" value="2" />
                <input class="inline-block w-full md:w-auto mb-3 md:mb-0 py-3 px-4 text-sm font-semibold text-white text-shadow uppercase no-underline bg-primary-3 cursor-pointer" type="submit" name="reserve" value="Check Availability" />
                <input class="inline-block w-full md:w-auto md:ml-2 py-3 px-4 text-sm font-semibold text-white text-shadow uppercase no-underline bg-primary-3 cursor-pointer" type="submit" name="explore" value="View Resort" />
              </div>
            </form>
          </div>
        @endif
      </li>
    </ul>
  </nav>
@endif
