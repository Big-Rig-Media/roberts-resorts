export default {
  init() {
    // JavaScript to be fired on the home page
    const form = document.querySelector('.js-book-resort')

    // Handle form submission
    if (form) {
      form.addEventListener('submit', (e) => {
        e.preventDefault()

        const resort = e.target['resort'].value
        const checkIn = e.target['check-in'].value
        const checkOut = e.target['check-out'].value
        const adults = e.target['adults'].value

        window.open(`https://www.campspot.com/book/${resort}/search/${checkIn}/${checkOut}/guests${adults},0,0`)
      })
    }

    // Handle carousels
    if ($('.js-carousel-homes').length && $('.js-carousel-homes-nav').length) {
      $('.js-carousel-homes').slick({
        accessibility: true,
        adaptiveHeight: false,
        autoplay: true,
        autoplaySpeed: 15000,
        arrows: false,
        fade: true,
        pauseOnFocus: false,
        pauseOnHover: false,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.js-carousel-homes-nav',
      })

      $('.js-carousel-homes-nav').slick({
        arrows: false,
        focusOnSelect: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        asNavFor: '.js-carousel-homes',
      })
    }

    if ($('.js-carousel-specials').length) {
      $('.js-carousel-specials').slick({
        accessibility: true,
        adaptiveHeight: false,
        autoplay: true,
        autoplaySpeed: 15000,
        arrows: true,
        dots: true,
        nextArrow: '<button type="button" class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path fill="#ffffff" d="M17.52 36.47l-7.07 7.07a12 12 0 000 16.97L205.95 256 10.45 451.5a12 12 0 000 16.97l7.08 7.07a12 12 0 0016.97 0l211.05-211.06a12 12 0 000-16.97L34.49 36.47a12 12 0 00-16.96 0z"/></svg></button>',
        prevArrow: '<button type="button" class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path fill="#ffffff" d="M238.47 475.54l7.08-7.07a12 12 0 000-16.98L50.05 256l195.5-195.5a12 12 0 000-16.96l-7.08-7.08a12 12 0 00-16.97 0L10.45 247.52a12 12 0 000 16.98l211.06 211.05a12 12 0 0016.97 0z"/></svg></button>',
        pauseOnFocus: false,
        pauseOnHover: false,
        speed: 1000,
        slidesToShow: 2,
        slidesToScroll: 2,
        responsive: [
          {
            breakpoint: 1023,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      })
    }
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
