import axios from 'axios'

export default {
  init() {
    // JavaScript to be fired on the home page
    const form = document.querySelector('.js-book-resort')
    const listingsFilter = document.querySelector('.js-filter-homes')

    const fetchHomes = (status) => {
      if (status) {
        return axios.get(`http://roberts.test/wp-json/wp/v2/listings/?type=19&status=${status}`).then(res => res.data)
      }

      return
    }

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

    if (listingsFilter) {
      listingsFilter.addEventListener('change', (e) => {
        e.preventDefault()

        const { value } = e.target

        const listings = fetchHomes(value).then(data => console.log(data))

        console.log(listings)
      })
    }

    // Handle carousel
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
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
