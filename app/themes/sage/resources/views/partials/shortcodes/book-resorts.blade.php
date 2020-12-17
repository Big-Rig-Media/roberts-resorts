<form class="w-full max-w-xl mx-auto js-book-resorts" method="post">
  <div class="md:flex md:flex-row md:flex-no-wrap md:items-end md:justify-between text-left">
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
    <div class="flex flex-row flex-no-wrap -mx-2 md:-mx-0">
      <div class="flex flex-column flex-wrap w-1/2 md:w-full md:max-w-xxs md:mx-3 mb-3 md:mb-0 px-2 md:px-0">
        <label class="block w-full mb-2 font-semibold text-white text-shadow uppercase" for="check-in">Check-In</label>
        <input class="w-full h-10 max-h-input px-6 bg-white" type="date" name="check-in" />
      </div>
      <div class="flex flex-column flex-wrap w-1/2 md:w-full md:max-w-xxs md:mr-3 mb-3 md:mb-0 px-2 md:px-0">
        <label class="block w-full mb-2 font-semibold text-white text-shadow uppercase" for="check-out">Check-Out</label>
        <input class="w-full h-10 max-h-input px-6 bg-white" type="date" name="check-out" />
      </div>
    </div>
    <div class="flex flex-column flex-wrap w-full md:max-w-xs mb-5 md:mb-0">
      <label class="block w-full mb-2 font-semibold text-white text-shadow uppercase" for="adults">Adults</label>
      <select class="w-full h-10 max-h-input px-6 bg-white" name="adults">
        <option selected>Please Select</option>
        <option value="2">2</option>
        <option value="4">4</option>
        <option value="6">6</option>
        <option value="8">8</option>
      </select>
    </div>
  </div>
  <div class="md:flex md:flex-row md:flex-no-wrap md:items-center md:justify-center mt-10">
    <input class="inline-block w-full md:w-auto mb-3 md:mb-0 py-3 px-4 text-sm font-semibold text-white text-shadow uppercase no-underline bg-primary-2 cursor-pointer" type="submit" name="reserve" value="Reserve Now" />
    <input class="inline-block w-full md:w-auto md:ml-2 py-3 px-4 text-sm font-semibold text-white text-shadow uppercase no-underline bg-primary-1 cursor-pointer" type="submit" name="explore" value="Explore Destination" />
  </div>
</form>
