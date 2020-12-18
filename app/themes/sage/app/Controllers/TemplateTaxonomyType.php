<?php

namespace App\Controllers;

use Sober\Controller\Controller;

/**
 * TemplateTaxonomyType
 *
 * Methods available only on the taxonomy type template page
 */
class TemplateTaxonomyType extends Controller
{
    public static function getListings($term)
    {
        $query = new \WP_Query([
            'post_type'         => 'listings',
            'posts_per_page'    => -1,
            'tax_query'         => [
                [
                    'taxonomy' => 'type',
                    'field'    => 'slug',
                    'terms'    => $term
                ]
            ]
        ]);

        if ( $query->have_posts() ) {
            return $query->posts;
        }

        return;
    }

    /**
     * Get status
     */
    public static function status($listing)
    {
        if ( $listing ) {
            $terms = get_the_terms($listing, 'status');

            if ( $terms ) {
                $slugs = [];

                foreach ( $terms as $term ) {
                    $slugs[] = $term->name;
                }

                return $slugs;

                //return $terms[0]->name;
            }

            return;
        }

        return;
    }

    /**
     * Get price
     */
    public static function price($home)
    {
        if ( $home ) {
            return get_field('price', $home);
        }

        return;
    }

    /**
     * Get bedrooms
     */
    public static function bedrooms($home)
    {
        if ( $home ) {
            return get_field('bedrooms', $home);
        }

        return;
    }

    /**
     * Get bathrooms
     */
    public static function bathrooms($home)
    {
        if ( $home ) {
            return get_field('bathrooms', $home);
        }

        return;
    }

    /**
     * Get lot number
     */
    public static function lotNumber($home)
    {
        if ( $home ) {
            return get_field('lot_number', $home);
        }

        return;
    }

    /**
     * Get statuses
     */
    public function statuses()
    {
        $terms = get_terms([
            'taxonomy'      => 'status',
            'hide_empty'    => false
        ]);

        if ( $terms ) {
            return $terms;
        }

        return;
    }
}
