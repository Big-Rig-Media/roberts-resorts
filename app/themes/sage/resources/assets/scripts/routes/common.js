import { isExternal, isEmpty, observeBackgrounds, dropdownState } from '../util/helpers'
import * as Cookies from 'js-cookie'

export default {
  init() {
    // JavaScript to be fired on all pages
    const body = document.querySelector('body')
    const navToggle = document.querySelector('.js-toggle-nav')
    const anchors = document.querySelectorAll('a')
    const paragraphs = document.querySelectorAll('p')
    const dropdowns = document.querySelectorAll('.menu-item-has-children')
    const jsHero = document.querySelector('.js-hero')
    const jsBackgrounds = document.querySelectorAll('.js-background')
    const jsPopup = document.querySelector('.js-popup')
    const galleryThumbs = document.querySelectorAll('.gallery-icon')
    const forms = document.querySelectorAll('.js-book-resorts')
    const jsSticky = document.querySelector('.js-sticky')

    // Handle external urls
    anchors.forEach(anchor => {
      if (isExternal(anchor)) {
        // Define attributes to set
        const attributes = {
          target: '__blank',
          rel: 'noopener',
        }

        // Set attributes
        Object.keys(attributes).forEach(attribute => {
          anchor.setAttribute(attribute, attributes[attribute])
        })
      }
    })

    // Handle empty p tags
    paragraphs.forEach(isEmpty)

    // Handle toggling mobile navigation
    if (window.matchMedia('(max-width: 1023px)').matches) {
      if (navToggle) {
        navToggle.addEventListener('click', () => {
          body.classList.toggle('nav-is-open')
        })
      }
    }

    // Handle dropdowns visibility state
    if (dropdowns) {
      dropdowns.forEach(dropdown => {
        dropdown.setAttribute('data-state', 'closed')

        dropdown.addEventListener('click', dropdownState)
      })
    }

    // Handle hero background
    if (jsHero) {
      const mobileHero = jsHero.dataset.mobile
      const desktopHero = jsHero.dataset.desktop

      if (mobileHero && desktopHero) {
        jsHero.classList.add('has-bg')

        if (window.matchMedia('(min-width: 1024px)').matches) {
          jsHero.style.backgroundImage = `url(${desktopHero})`
        } else {
          jsHero.style.backgroundImage = `url(${mobileHero})`
        }
      }
    }

    // Handle js backgrounds
    if (jsBackgrounds) {
      if (('IntersectionObserver' in window)) {
        let observer = new IntersectionObserver(observeBackgrounds);

        jsBackgrounds.forEach(jsBackground => {
          observer.observe(jsBackground)
        })
      }
    }

    // Handle gallery lightbox
    if (galleryThumbs) {
      galleryThumbs.forEach(galleryThumb => {
        const galleryAnchor = galleryThumb.children[0]

        galleryAnchor.setAttribute('data-fancybox', 'gallery')
      })

      $('[data-fancybox]').fancybox()
    }

    // Handle js popup
    if (jsPopup && !Cookies.get('popup')) {
      setTimeout(() => {
        $.fancybox.open({
          autoFocus: false,
          src: '.js-popup',
          type: 'inline',
        })

        Cookies.set('popup', 'true', { expires: 7 })
      }, 5000)
    }

    // Handle hero carousel
    if ($('.js-carousel-hero').length) {
      $('.js-carousel-hero').slick({
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
      });
    }

    //  Handle videos carousel
    if ($('.js-carousel-videos').length) {
      if (window.matchMedia('(max-width: 1023px)').matches) {
        $('.js-carousel-videos').slick({
          accessibility: true,
          adaptiveHeight: false,
          autoplay: true,
          autoplaySpeed: 15000,
          arrows: false,
          pauseOnFocus: false,
          pauseOnHover: false,
          speed: 1000,
          slidesToShow: 2,
          slidesToScroll: 2,
        });
      }
    }

    // Handle form submission
    if (forms) {
      forms.forEach(form => {
        form.addEventListener('submit', (e) => {
          e.preventDefault()

          if ( e.submitter.name !== 'explore' ) {
            const resort = e.target['resort'].value
            const checkIn = e.target['check-in'].value
            const checkOut = e.target['check-out'].value
            const adults = e.target['adults'].value

            if (resort === 'Please Select' && checkIn === '' && checkOut === '' && adults === 'Please Select') {
              alert('Please select a resort, check-in date, check-out date and number of adults')
            }

            if (resort !== 'Please Select' && checkIn === '' && checkOut === '' && adults === 'Please Select') {
              window.open(`https://www.campspot.com/book/${resort}`)
            }

            if (resort !== 'Please Select' && checkIn !== '' && checkOut !== '' && adults !== 'Please Select') {
              window.open(`https://www.campspot.com/book/${resort}/search/${checkIn}/${checkOut}/guests${adults},0,0`)
            }

            if (resort !== 'Please Select' && checkIn === '' && checkOut === '' && adults !== 'Please Select') {
              window.open(`https://www.campspot.com/book/${resort}/search/guests${adults},0,0`)
            }

            if (resort !== 'Please Select' && checkIn !== '' && checkOut !== '' && adults === 'Please Select') {
              window.open(`https://www.campspot.com/book/${resort}/search/${checkIn}/${checkOut}`)
            }
          } else {
            const resort = e.target['resort'].options[e.target['resort'].selectedIndex].dataset.slug

            if (resort !== undefined) {
              window.location.replace(`/resorts/${resort}`)
            } else {
              alert('Please select a resort')
            }
          }
        })
      })
    }

    // Handle sticky menu
    if (jsSticky) {
      if (window.matchMedia('(min-width:1024px)').matches) {
        const stickyTop = jsSticky.getBoundingClientRect().top

        window.addEventListener('scroll', () => {
          let currentY = window.scrollY

          if (currentY >= stickyTop) {
            jsSticky.classList.add('is-sticky')
          } else {
            jsSticky.classList.remove('is-sticky')
          }
        })
      }
    }

    // Find all YouTube videos
    // Expand that selector for Vimeo and whatever else
    var $allVideos = $('iframe[src^="https://www.youtube.com"]'),

    // The element that is fluid width
    $fluidEl = $('.js-video');

    // Figure out and save aspect ratio for each video
    $allVideos.each(function() {

    $(this)
      .data('aspectRatio', this.height / this.width)

      // and remove the hard coded width/height
      .removeAttr('height')
      .removeAttr('width');

    });

    // When the window is resized
    $(window).resize(function() {

    var newWidth = $fluidEl.width();

    // Resize all videos according to their own aspect ratio
    $allVideos.each(function() {

      var $el = $(this);
      $el
        .width(newWidth)
        .height(newWidth * $el.data('aspectRatio'));

    });

    // Kick off one resize to fix all videos on page load
    }).resize();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
