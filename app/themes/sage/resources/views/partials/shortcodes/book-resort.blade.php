<div class="absolute pin-b pin-l pin-r w-full py-6 text-left bg-primary-1-transparent">
  <div class="container">
    <form class="w-full max-w-2xl mx-auto js-book-resort" method="post">
      <div class="md:flex md:flex-row md:flex-no-wrap md:items-end md:justify-between">
        <h6 class="mb-0 text-center md:text-left text-white">Book Your Site:</h6>
        <div class="flex flex-column flex-wrap w-full md:max-w-xxs md:mx-3 mb-3 md:mb-0">
          <label class="block w-full mb-2 font-semibold text-white text-shadow uppercase" for="check-in">Check-In</label>
          <input class="w-full h-10 max-h-input px-6 bg-white" type="date" name="check-in" />
        </div>
        <div class="flex flex-column flex-wrap w-full md:max-w-xxs md:mr-3 mb-3 md:mb-0">
          <label class="block w-full mb-2 font-semibold text-white text-shadow uppercase" for="check-out">Check-Out</label>
          <input class="w-full h-10 max-h-input px-6 bg-white" type="date" name="check-out" />
        </div>
        <div class="flex flex-column flex-wrap w-full md:max-w-xs md:mr-3 mb-3 md:mb-0">
          <label class="block w-full mb-2 font-semibold text-white text-shadow uppercase" for="adults">Adults</label>
          <select class="w-full h-10 max-h-input px-6 bg-white" name="adults">
            <option selected>Please Select</option>
            <option value="2">2</option>
            <option value="4">4</option>
            <option value="6">6</option>
            <option value="8">8</option>
          </select>
        </div>
        <input type="hidden" name="resort" value="{{ App::resortCampspotSlug($post) }}" />
        <input class="inline-block w-full md:w-auto md:ml-2 px-4 h-10 text-sm font-semibold text-white text-shadow uppercase no-underline bg-primary-2 cursor-pointer" type="submit" name="reserve" value="Reserve Now" />
      </div>
    </form>
  </div>
</div>
