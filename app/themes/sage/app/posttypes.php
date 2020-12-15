<?php

namespace App;

use Roots\Sage\Container;

add_action('init', function() {
    register_post_type('specials', [
        'label'               	=> 'Specials',
        'public'              	=> true,
        'publicly_queryable'  	=> true,
        'show_ui'             	=> true,
        'show_in_menu'        	=> true,
        'query_var'           	=> true,
        'rewrite'             	=> [ 'slug' => 'specials', 'with_front' => false ],
        'capability_type'     	=> 'post',
        'has_archive'         	=> false,
        'hierarchical'        	=> true,
        'menu_position'       	=> null,
        'menu_icon'           	=> 'data:image/svg+xml;base64,' . base64_encode( '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#a0a5aa" d="M568 32h-16a8 8 0 00-8 8v19.33L32 179.8V168a8 8 0 00-8-8H8a8 8 0 00-8 8v176a8 8 0 008 8h16a8 8 0 008-8v-11.8l130.58 30.72a93.84 93.84 0 00-2.58 21.07 96 96 0 0096 96c45.13 0 82.45-31.3 92.64-73.29L544 452.67V472a8 8 0 008 8h16a8 8 0 008-8V40a8 8 0 00-8-8zM256 448c-35.29 0-64-28.71-64-64 0-4.75.72-9.31 1.76-13.74l124.13 29.21C310.92 427.27 285.93 448 256 448zM32 299.33v-86.66L544 92.2v327.6L32 299.33z"/></svg>'),
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
