// import external dependencies
import 'jquery';
import '@fancyapps/fancybox/dist/jquery.fancybox.min.js';
import 'slick-carousel/slick/slick.min';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import singleListings from './routes/singleListings'

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // Listings page
  singleListings,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
