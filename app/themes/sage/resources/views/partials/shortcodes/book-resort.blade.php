<div class="absolute pin-b pin-l pin-r w-full py-6 text-left bg-primary-1-transparent">
  <div class="container">
    <form class="w-full max-w-2xl mx-auto js-book-resort" method="post">
      <div class="md:flex md:flex-row md:flex-no-wrap md:items-end md:justify-between text-left">
        <h6 class="mb-6 md:mb-0 text-center md:text-left text-white">Book Your Site:</h6>
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
        <div class="flex flex-column flex-wrap w-full md:max-w-xxs lg:max-w-xs md:mr-3 mb-3 md:mb-0">
          <label class="block w-full mb-2 font-semibold text-white text-shadow uppercase" for="adults">Adults</label>
          <select class="w-full h-10 max-h-input px-6 bg-white" name="adults">
            <option selected>Please Select</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
        </div>
        <input type="hidden" name="resort" value="{{ $post->post_parent === 0 ? App::resortCampspotSlug($post) : App::resortCampspotSlug($post->post_parent) }}" />
        <input class="btn btn--secondary w-full md:w-auto cursor-pointer" type="submit" name="reserve" value="Reserve Now" />
      </div>
    </form>
  </div>
</div>
