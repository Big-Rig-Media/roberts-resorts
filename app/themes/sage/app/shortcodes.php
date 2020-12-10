<?php

namespace App;

/**
 * Resorts Grid
 */
add_shortcode('resorts', function($atts, $content = null) {
    $query = new \WP_Query([
        'post_type'         => 'listings',
        'post_parent'       => 0,
        'posts_per_page'    => -1
    ]);

    if ( $query->have_posts() ) {
        return \App\template('partials.shortcodes.resorts', ['resorts' => $query->posts]);
    }

    return;
});

/**
 * Book Resorts Form
 */
add_shortcode('book-resorts', function($atts, $content = null) {
    return \App\template('partials.shortcodes.book-resorts');
});


/**
 * Book Resort Form
 */
add_shortcode('book-resort', function($atts, $content = null) {
    return \App\template('partials.shortcodes.book-resort');
});
