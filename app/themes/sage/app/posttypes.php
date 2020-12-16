<?php

namespace App;

use Roots\Sage\Container;

add_action('init', function() {
    register_post_type('specials', [
        'label'               	=> 'Specials',
        'public'              	=> true,
        'publicly_queryable'  	=> false,
        'show_ui'             	=> true,
        'show_in_menu'        	=> true,
        'query_var'           	=> true,
        'rewrite'             	=> [ 'slug' => 'specials', 'with_front' => false ],
        'capability_type'     	=> 'post',
        'has_archive'         	=> false,
        'hierarchical'        	=> true,
        'menu_position'       	=> null,
        'menu_icon'           	=> 'data:image/svg+xml;base64,' . base64_encode( '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#a0a5aa" d="M32 176a32 32 0 00-32 32v96a32 32 0 0032 32c11.38 0 20.9-6.28 26.57-15.22l106.99 32.3c-3.35 9.76-5.56 20.04-5.56 30.92 0 52.94 43.06 96 96 96 44.49 0 81.66-30.57 92.5-71.7L480 448V64L58.57 191.22C52.9 182.28 43.38 176 32 176zm179.29 190.88l91.47 27.61C297.95 415.92 278.85 432 256 432c-26.47 0-48-21.53-48-48 0-6.05 1.24-11.79 3.29-17.12zM560 32h-32a16 16 0 00-16 16v416a16 16 0 0016 16h32a16 16 0 0016-16V48a16 16 0 00-16-16z"/></svg>'),
        'supports'            	=> [ 'editor','title','thumbnail' ],
        'show_in_rest'		    => true,
        'show_in_graphql'		=> true,
        'graphql_single_name'	=> 'special',
        'graphql_plural_name'	=> 'specials'
    ]);

    register_taxonomy(
        'resort',
        'specials',
        [
            'label'         => 'Resort',
            'public'        => false,
            'show_ui'       => true,
            'rewrite'       => [ 'slug' => 'resort', 'with_front' => false ],
            'hierarchical'  => true,
            'show_in_rest'	=> true
        ]
    );
});

add_filter('manage_specials_posts_columns', function($columns) {
    $columns = [
        'cb'        => '<input type="checkbox" />',
        'title' 	=> __('Title'),
        'resort'	=> __('Resort'),
        'date'  	=> __('Date')
    ];

    return $columns;
});

add_action('manage_specials_posts_custom_column', function($column_name, $id) {
    $output = [];

    switch ( $column_name ) {
        // Resort
        case 'resort':
            $terms = get_the_terms( $id, 'resort' );

            if ( !empty($terms) )  {
                foreach ( $terms as $term ) {
                    $output[] = $term->name;
                }
            }
        break;
    }

    // Return output
    echo join( ', ', $output );
}, 10, 2);
