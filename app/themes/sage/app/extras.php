<?php

namespace App;

/**
 * Force Gravity Form to scroll to form top position upon submission
 */
add_filter('gform_confirmation_anchor', '__return_true');

/**
 * Custom login url
 *
 * @link    https://codex.wordpress.org/Plugin_API/Filter_Reference/login_headerurl
 */
add_filter('login_headerurl', function() {
    return get_home_url();
});

/**
 * Row
 *
 * @param   array   $atts
 */
add_shortcode('row', function($atts, $content = null) {
    return '<div class="row">'.do_shortcode($content).'</div>';
});

/**
 * Column
 *
 * @param   array   $atts
 */
add_shortcode('column', function($atts, $content = null) {
    extract(shortcode_atts([
        'columns' => 6,
    ], $atts));

    return '<div class="col md:col-'.$columns.'">'.do_shortcode($content).'</div>';
});

/**
 * Amenities
 *
 * @param   array   $atts
 */
add_shortcode('amenities', function($atts, $content = null)  {
    extract(shortcode_atts([
        'columns' => 5,
    ], $atts));

    return '<div class="md:grid md:grid-cols-'.$columns.' md:gap-15">'.do_shortcode($content).'</div>';
});

/**
 * Amenity
 *
 * @param   array   $atts
 */
add_shortcode('amenity', function($atts, $content = null) {
    return '<div class="text-center">'.do_shortcode($content).'</div>';
});

/**
 * Rates
 *
 * @param   array   $atts
 */
add_shortcode('rates', function($atts, $content = null)  {
    extract(shortcode_atts([
        'columns' => 5,
    ], $atts));

    return '<div class="md:grid md:grid-cols-'.$columns.' md:gap-15">'.do_shortcode($content).'</div>';
});

/**
 * Rate
 *
 * @param   array   $atts
 */
add_shortcode('rate', function($atts, $content = null) {
    return '<div class="relative p-8 text-center shadow-md">'.do_shortcode($content).'</div>';
});

/**
 * Custom image sizes
 *
 * @link    https://developer.wordpress.org/reference/functions/add_image_size/
 *
 * e.g. add_image_size('w800x400', 800, 400, true)
 */

$custom_sizes = [
    'w1920x800' => [1920, 800, true],
    'w994x670'  => [994, 670, true],
    'w960x800'  => [960, 800, true],
    'w960x600'  => [960, 600, true],
    'w732x400'  => [732, 400, true],
    'w716x500'  => [716, 500, true],
    'w636x636'  => [636, 636, true],
    'w497x335'  => [497, 335, true],
    'w366x200'  => [366, 200, true],
    'w331x152'  => [331, 152, true],
    'w480x300'  => [480, 300, true]
];

if (!empty($custom_sizes)) {
    foreach ($custom_sizes as $key => $custom_size) {
        add_image_size($key, $custom_size[0], $custom_size[1], $custom_size[2]);
    }
}

/**
 * Add custom image sizes to media library
 *
 * @link    https://codex.wordpress.org/Plugin_API/Filter_Reference/image_size_names_choose
 * @param   array   $sizes
 */
add_filter('image_size_names_choose', function($sizes) {
    $addsizes = [
        'w960x600' => __('Wide Ratio Large'),
        'w480x300' => __('Wide Radio Small')
    ];

    $newsizes = array_merge($sizes, $addsizes);

    return $newsizes;
});

/**
 * Modify Allowed Media Mime Types
 */
add_filter('upload_mimes', function($mimes) {
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
});

/**
 * Numbered Pagination
 *
 * @param   object  $query
 * @return  mixed   The HTML output
 */
function pagination( $query ) {
    $limit = 999999999;

    $pagination = paginate_links([
        'base'    => str_replace($limit, '%#%', esc_url(get_pagenum_link($limit))),
        'format'  => '/page/%#%',
        'current' => max(1, get_query_var('paged')),
        'total'   => $query->max_num_pages,
        'type'    => 'array'
    ]);

    if ( is_array($pagination) ) {
        $output = '<nav class="nav nav--pagination">
                        <ol class="nav__list">';

        foreach ($pagination as $page) {
            $output .= '<li class="menu-item">'.$page.'</li>';
        }

        return $output .= ' </ol>
                           </nav>';
    }

    return;
}

add_filter('nav_menu_meta_box_object', function($obj) {
    $obj->_default_query = [
        'posts_per_page' => -1
    ];

    return $obj;
});
