<?php

namespace App\Controllers;

use Sober\Controller\Controller;

/**
 * TemplateSpecials
 *
 * Methods available only on the specials template page
 */
class TemplateSpecials extends Controller
{
    /**
     * Get all specials
     */
    public static function specials()
    {
        $query = new \WP_Query([
            'post_type'         => 'specials',
            'posts_per_page'    => -1,
        ]);

        if ( $query->have_posts() ) {
            return $query->posts;
        }

        return;
    }

    /**
     * Create special's resort
     */
    public static function resort($special)
    {
        if ( $special ) {
            $terms = get_the_terms($special, 'resort');

            if ( $terms ) {
                return $terms[0]->name;
            }

            return;
        }

        return;
    }

    /**
     * Get all resorts
     */
    public static function resorts()
    {
        $terms = get_terms([
            'taxonomy'      => 'resort',
            'hide_empty'    => false
        ]);

        if ( $terms ) {
            return $terms;
        }

        return;
    }
}
