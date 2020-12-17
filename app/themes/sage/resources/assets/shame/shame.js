/* ========================================================================
 * Shame JS
 *
 * Dedicated javascript file to house quick fixes that can be refactored at a
 * later time.
 *
 * Remember to enque the file in the assets function in lib/setup.php
 * ======================================================================== */
(function ($) {
  const filterListings = document.querySelector('.js-filter-listings')

  if ( filterListings ) {
    filterListings.addEventListener('change', (e) => {
      e.preventDefault()

      $('.js-listings').isotope({filter: e.target.value})
    })
  }
})(jQuery);
