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
